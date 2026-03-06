<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'service_settings',
    'title'  => 'Services',
    'icon'   => 'fas fa-concierge-bell',
    'fields' => [
        [
            'id'      => 'service_layout',
            'type'    => 'select',
            'title'   => 'Service Layout',
            'options' => [
                'grid' => 'Grid Layout',
                'list' => 'List Layout',
            ],
            'default' => 'grid',
        ],
        [
            'id'      => 'service_sidebar',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Service List',
            'default' => false,
        ],
        [
            'id'      => 'service_single_sidebar',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Single Service',
            'default' => false,
        ],
    ],
]);
