<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 *
**/
function mthan_admin_section_autofill_js() {?>
<script>
    (function ($) {
        function syncSectionName($select) {
            var label = $select.find('option:selected').text().trim();
            var $group = $select.closest('.csf-field-group-item, .csf-group-item');
            var $nameField = $group.find('input[data-section-name]');
            if ($nameField.length && label) {
                $nameField.val(label).trigger('input').trigger('change');
            }
        }
        // On change
        $(document).on('change', 'select', function () {
            var $select = $(this);
            var $group = $select.closest('.csf-field-group-item, .csf-group-item');
            if ($group.length && $group.find('input[data-section-name]').length) {
                syncSectionName($select);
            }
        });
        // On cloning (when new group item is added)
        $(document).on('csf:group-added csf:repeater-added', function (e, $item) {
            $item.find('select').each(function () {
                var $s = $(this);
                var $g = $s.closest('.csf-field-group-item, .csf-group-item');
                if ($g.length && $g.find('input[data-section-name]').length) {
                    syncSectionName($s);
                }
            });
        });
    })(jQuery);
</script>
<?php }
function mthan_ajax_git_update()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }

    $disabled_functions = explode(',', ini_get('disable_functions'));
    $disabled_functions = array_map('trim', $disabled_functions);
    $can_exec = !in_array('exec', $disabled_functions) && function_exists('exec');

    $update_log = "── Starting Update ────────────────\n";

    // Method 1: Try Fast Git Update (git pull)
    if ($can_exec) {
        $update_log .= "Method: Fast Git Update (git pull)\n";
        
        // Check if it is a git repo
        $is_git_repo = false;
        exec('git rev-parse --is-inside-work-tree 2>&1', $output, $return_var);
        if ($return_var === 0 && trim($output[0]) === 'true') {
            $is_git_repo = true;
        }

        if ($is_git_repo) {
            $update_log .= "1. Detected local Git repository.\n";
            $output = null;
            $return_var = null;
            exec('git pull 2>&1', $output, $return_var);

            if ($return_var === 0) {
                $update_log .= "2. Pulling latest commits...\n" . implode("\n", $output) . "\n";
                $update_log .= "3. Done! Theme updated via Git Pull.";
                wp_send_json_success([
                    'message' => 'Theme updated successfully via Git Pull.',
                    'log'     => $update_log
                ]);
            } else {
                $update_log .= "2. [FAILED] Git pull error: " . implode("\n", $output) . "\n";
                $update_log .= "   Switched to Fallback Method...\n\n";
            }
        } else {
            $update_log .= "1. [NOTICE] Not a Git repository, skipping git pull.\n";
            $update_log .= "   Proceeding to Fallback Method...\n\n";
        }
    } else {
        $update_log .= "Method: Fallback (Remote ZIP Download)\n";
        $update_log .= "[INFO] exec/shell_exec disabled on server.\n\n";
    }

    // Method 2: Fallback (ZIP Download & Extract)
    require_once ABSPATH . 'wp-admin/includes/file.php';
    WP_Filesystem();
    global $wp_filesystem;

    $repo_url = 'https://github.com/antoine-mai/mthan-wp-theme';
    $zip_url = $repo_url . '/archive/refs/heads/main.zip';
    $update_log .= "1. Downloading latest ZIP from: " . $zip_url . "\n";
    
    $temp_zip = download_url($zip_url, 300);

    if (is_wp_error($temp_zip)) {
        $update_log .= "[FATAL ERROR] Download failed: " . $temp_zip->get_error_message();
        wp_send_json_error(['message' => 'Update failed.', 'log' => $update_log]);
    }

    $extract_to = get_theme_root() . '/mthan_temp_update_dir/';
    $wp_filesystem->delete($extract_to, true);
    
    $update_log .= "2. Extracting package...\n";
    $unzip_result = unzip_file($temp_zip, $extract_to);
    unlink($temp_zip);

    if (is_wp_error($unzip_result)) {
        $update_log .= "[FATAL ERROR] Unzip failed: " . $unzip_result->get_error_message();
        $wp_filesystem->delete($extract_to, true);
        wp_send_json_error(['message' => 'Update failed.', 'log' => $update_log]);
    }

    $source_dir = $extract_to . 'mthan-wp-theme-main/';
    if (!is_dir($source_dir)) {
        $update_log .= "[FATAL ERROR] Extraction failed to locate source folder.";
        $wp_filesystem->delete($extract_to, true);
        wp_send_json_error(['message' => 'Update failed.', 'log' => $update_log]);
    }

    $update_log .= "3. Copying updated files to theme root...\n";
    $copy_result = copy_dir($source_dir, get_template_directory());
    $wp_filesystem->delete($extract_to, true);

    if (is_wp_error($copy_result)) {
        $update_log .= "[FATAL ERROR] Copy failed: " . $copy_result->get_error_message();
        wp_send_json_error(['message' => 'Update failed.', 'log' => $update_log]);
    }

    $update_log .= "4. Done! Theme updated via Download & Extract.";
    wp_send_json_success([
        'message' => 'Theme updated successfully via Remote ZIP Download.',
        'log'     => $update_log
    ]);
}

function mthan_admin_git_update_js() { ?>
<script>
    jQuery(document).ready(function($) {
        $('#mthan-git-update-btn').on('click', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var $log = $('#mthan-git-update-log');
            
            $btn.prop('disabled', true).text('Updating...');
            $log.slideDown().text('Downloading and installing updates from GitHub...');

            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'mthan_git_update'
                },
                success: function(response) {
                    var data = response.data;
                    var statusText = response.success ? 'SUCCESS:\n' : 'ERROR:\n';
                    var fullLog = statusText + data.message + '\n\n' + data.log;
                    
                    $log.text(fullLog);
                    if (response.success) {
                        $log.css('color', '#4ade80'); // green
                        $btn.text('Update Successful');
                    } else {
                        $log.css('color', '#f87171'); // red
                        $btn.text('Update Failed').prop('disabled', false);
                    }
                },
                error: function(xhr, status, error) {
                    var errorMsg = 'AJAX ERROR: ' + status + ' - ' + error;
                    if (xhr.responseText) {
                        errorMsg += '\n\nServer Response:\n' + xhr.responseText;
                    }
                    $log.css('color', '#f87171').text(errorMsg);
                    $btn.text('Update Failed').prop('disabled', false);
                }
            });
        });
    });
</script>
<?php }
function mthan_prefix_dependency_ids($dependency, $slug)
{
    if (!is_array($dependency)) {
        return $dependency;
    }

    // Check if it's a simple condition array e.g. ['field', '==', 'val']
    if (count($dependency) === 3 && is_string($dependency[0]) && is_string($dependency[1])) {
        $id = $dependency[0];
        if ($id !== 'section_template' && strpos($id, $slug . '_') !== 0) {
            $dependency[0] = $slug . '_' . $id;
        }
        return $dependency;
    }

    // Otherwise recurse through nested dependencies
    foreach ($dependency as $key => $value) {
        if (is_array($value)) {
            $dependency[$key] = mthan_prefix_dependency_ids($value, $slug);
        }
    }

    return $dependency;
}
