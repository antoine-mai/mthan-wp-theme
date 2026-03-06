<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Update Settings

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'update_settings',
    'title'  => 'Update',
    'icon'   => 'fas fa-sync-alt',
    'fields' => [
        [
            'type'    => 'notice',
            'style'   => 'info',
            'content' => 'Please enter your purchase code to verify your license and enable automatic theme updates.',
        ],
        [
            'id'      => 'purchase_code',
            'type'    => 'text',
            'title'   => 'Purchase Code',
            'desc'    => 'Enter your item purchase code here.',
        ],
    ],
]);
