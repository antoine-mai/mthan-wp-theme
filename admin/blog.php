<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Blog Settings
 */
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id' => 'blog_settings',
    'title' => 'Blog',
    'icon' => 'fas fa-edit',
    'fields' => [
        [
            'id' => 'blog_layout',
            'type' => 'select',
            'title' => 'Blog Layout',
            'options' => [
                'list' => 'List Layout',
                'grid' => 'Grid Layout',
            ],
            'default' => 'list'
        ],
        [
            'id'      => 'blog_sidebar',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Blog List',
            'default' => true,
        ],
        [
            'id'      => 'blog_single_sidebar',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Single Post',
            'default' => true,
        ],
    ]
]);