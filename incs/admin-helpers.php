<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * admin-helpers.php — Theme update and utilities.
 */

/**
 * AJAX - Handle theme pull from GitHub.
 */
function mthan_ajax_git_update()
{
    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }

    $update_log = "── Starting Update ────────────────\n";
    $disabled_functions = array_map('trim', explode(',', ini_get('disable_functions')));
    $can_exec = !in_array('exec', $disabled_functions) && function_exists('exec');

    if ($can_exec) {
        $update_log .= "Method: Fast Git Update (git pull)\n";
        exec('git rev-parse --is-inside-work-tree 2>&1', $output, $return_var);
        
        if ($return_var === 0 && trim($output[0]) === 'true') {
            $output = null;
            exec('git pull 2>&1', $output, $return_var);
            if ($return_var === 0) {
                $update_log .= "[SUCCESS] Pulled latest changes.\n" . implode("\n", $output);
                wp_send_json_success(['message' => 'Updated via Git Pull.', 'log' => $update_log]);
            }
        }
    }

    // Fallback Code (Zip download etc) - simplified for brevity
    require_once ABSPATH . 'wp-admin/includes/file.php';
    WP_Filesystem();
    global $wp_filesystem;

    $zip_url = 'https://github.com/antoine-mai/mthan-wp-theme/archive/refs/heads/main.zip';
    $temp_zip = download_url($zip_url, 300);
    if (is_wp_error($temp_zip)) {
        wp_send_json_error(['message' => 'Download failed', 'log' => $temp_zip->get_error_message()]);
    }

    $extract_to = get_theme_root() . '/mthan_temp_update_dir/';
    $wp_filesystem->delete($extract_to, true);
    if (unzip_file($temp_zip, $extract_to)) {
        unlink($temp_zip);
        $source_dir = $extract_to . 'mthan-wp-theme-main/';
        if (is_dir($source_dir)) {
            copy_dir($source_dir, get_template_directory());
            $wp_filesystem->delete($extract_to, true);
            wp_send_json_success(['message' => 'Updated via ZIP Download.', 'log' => $update_log . "Done."]);
        }
    }
    wp_send_json_error(['message' => 'Update failed.', 'log' => 'Check permissions.']);
}

/**
 * Admin JS for Git update.
 */
function mthan_admin_git_update_js() { ?>
<script>
    jQuery(document).ready(function($) {
        $('#mthan-git-update-btn').on('click', function(e) {
            e.preventDefault();
            var $btn = $(this);
            var $log = $('#mthan-git-update-log');
            $btn.prop('disabled', true).text('Updating...');
            $log.slideDown().text('Connecting to GitHub...');

            $.post(ajaxurl, { action: 'mthan_git_update' }, function(response) {
                var data = response.data;
                $log.text((response.success ? 'SUCCESS:\n' : 'ERROR:\n') + data.message + '\n\n' + (data.log || ''));
                $btn.text(response.success ? 'Update Successful' : 'Update Failed').prop('disabled', false);
            });
        });
    });
</script>
<?php }
