<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$disabled_functions = explode(',', ini_get('disable_functions'));
$disabled_functions = array_map('trim', $disabled_functions);
$is_exec_disabled   = in_array('exec', $disabled_functions) || !function_exists('exec');
$is_shell_exec_disabled = in_array('shell_exec', $disabled_functions) || !function_exists('shell_exec');

$warning_html = '';
$method_title = 'Manual Git Update';
$method_desc  = 'Click the button below to pull the latest changes directly from the repository. This action requires Git to be installed on your server.';

if ($is_exec_disabled || $is_shell_exec_disabled) {
    $warning_html = '<div style="margin-bottom: 15px; padding: 15px; background: #fff8e5; color: #856404; border-left: 4px solid #f5c6cb;"><strong>Notice:</strong> The <code>exec</code> or <code>shell_exec</code> functions are disabled on your server. Fast Git Update is not possible. The system will automatically use the <strong>Download & Extract</strong> method from Github to update the theme.</div>';
    $method_title = 'Download Update';
    $method_desc  = 'Click the button below to download the latest theme zip from the repository and extract it directly to your theme folder.';
}

$update_content_html = '<div style="margin-top:20px; padding:20px; border:1px solid #ccc; background:#f9f9f9;">
    ' . $warning_html . '
    <h3 style="margin-top:0;">' . $method_title . '</h3>
    <p>' . $method_desc . '</p>
    <button type="button" class="button button-primary" id="mthan-git-update-btn"><i class="fas fa-sync-alt"></i> Pull Latest Update</button>
    <pre id="mthan-git-update-log" style="margin-top: 15px; padding: 15px; background: #222; color: #4ade80; border-radius: 4px; display: none; white-space: pre-wrap; font-size: 13px;"></pre>
</div>';

global $mthan_options_id;
CSF::createSection($mthan_options_id, [
    'id'     => 'update_settings',
    'title'  => 'Update',
    'icon'   => 'fas fa-sync-alt',
    'fields' => [
        [
            'type'    => 'content',
            'content' => $update_content_html,
        ],
    ],
]);
