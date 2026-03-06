<?php defined('ABSPATH') || exit;

// ──────────────────────────────────────────────────────────────────
// Admin JS: auto-fill section Name field from the select label
// ──────────────────────────────────────────────────────────────────
function mthan_admin_section_autofill_js()
{
?>
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
<?php
}
add_action('admin_footer', 'mthan_admin_section_autofill_js');

// ──────────────────────────────────────────────────────────────────
// Admin AJAX: Run Git Pull for Theme Update
// ──────────────────────────────────────────────────────────────────
add_action('wp_ajax_mthan_git_update', 'mthan_ajax_git_update');
function mthan_ajax_git_update()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    WP_Filesystem();
    global $wp_filesystem;

    $zip_url = 'https://github.com/antoine-mai/mthan-wp-prunner/archive/refs/heads/main.zip';
    $temp_zip = download_url($zip_url, 300);

    if (is_wp_error($temp_zip)) {
        wp_send_json_error(['message' => 'Download failed: ' . $temp_zip->get_error_message()]);
    }

    $extract_to = get_theme_root() . '/mthan_temp_update_dir/';
    $wp_filesystem->delete($extract_to, true);

    $unzip_result = unzip_file($temp_zip, $extract_to);
    unlink($temp_zip);

    if (is_wp_error($unzip_result)) {
        wp_send_json_error(['message' => 'Unzip failed: ' . $unzip_result->get_error_message()]);
    }

    $source_dir = $extract_to . 'mthan-wp-prunner-main/';
    if (!is_dir($source_dir)) {
        $wp_filesystem->delete($extract_to, true);
        wp_send_json_error(['message' => 'Extraction failed to locate the downloaded repository folder.']);
    }

    $copy_result = copy_dir($source_dir, get_template_directory());
    $wp_filesystem->delete($extract_to, true);

    if (is_wp_error($copy_result)) {
        wp_send_json_error(['message' => 'Failed to copy updated files: ' . $copy_result->get_error_message()]);
    }

    wp_send_json_success([
        'message' => 'Theme updated successfully via Remote ZIP Download.',
        'log'     => "1. Downloaded latest ZIP from GitHub main branch.\n2. Extracted files securely into server.\n3. Copied new files to theme directory successfully."
    ]);
}

// Admin JS for Git Update Button
function mthan_admin_git_update_js() {
    ?>
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
    <?php
}
add_action('admin_footer', 'mthan_admin_git_update_js');
