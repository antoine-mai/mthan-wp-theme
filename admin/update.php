<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'update_settings',
    'title'  => 'Update',
    'icon'   => 'fas fa-sync-alt',
    'fields' => [

        [
            'type'    => 'content',
            'content' => '<div style="margin-top:20px; padding:20px; border:1px solid #ccc; background:#f9f9f9;">
                <h3 style="margin-top:0;">Manual Git Update</h3>
                <p>Click the button below to pull the latest changes directly from the repository. This action requires Git to be installed on your server.</p>
                <button type="button" class="button button-primary" id="mthan-git-update-btn"><i class="fas fa-sync-alt"></i> Pull Latest Update</button>
                <pre id="mthan-git-update-log" style="margin-top: 15px; padding: 15px; background: #222; color: #4ade80; border-radius: 4px; display: none; white-space: pre-wrap; font-size: 13px;"></pre>
            </div>',
        ],
    ],
]);
