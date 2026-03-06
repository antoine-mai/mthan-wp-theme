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

    if (!function_exists('exec') || !function_exists('shell_exec')) {
        wp_send_json_error(['message' => 'Functions shell_exec or exec are disabled on the server.']);
    }

    $theme_dir = get_template_directory();
    
    // Check if git is available
    $git_check = @shell_exec('command -v git');
    if (empty($git_check)) {
        wp_send_json_error(['message' => 'Git is not installed on the server or the shell cannot find it.']);
    }

    // Change directory to theme root and run git pull
    $original_dir = getcwd();
    chdir($theme_dir);
    
    $output = [];
    $return_var = -1;
    @exec('git pull 2>&1', $output, $return_var);
    $log = implode("\n", $output);
    
    chdir($original_dir);

    if ($return_var === 0) {
        wp_send_json_success([
            'message' => 'Theme updated successfully via Git.',
            'log'     => $log
        ]);
    } else {
        wp_send_json_error([
            'message' => 'Git pull failed. (Exit Code: ' . $return_var . ')',
            'log'     => $log
        ]);
    }
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
            $log.slideDown().text('Running git pull...');

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
