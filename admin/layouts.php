<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Layouts Settings
 */

// Parent Section
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'layouts_settings',
    'title' => 'Layouts',
    'icon'  => 'fas fa-columns',
]);

// Sub-section: Page Layout
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'layouts_settings',
    'id'     => 'page_layout_settings',
    'title'  => 'Page Layout',
    'icon'   => 'fas fa-file',
    'fields' => [
        [
            'id'    => 'page_banner_tabs',
            'type'  => 'tabbed',
            'tabs'  => [
                [
                    'title'  => 'Banner Settings',
                    'icon'   => 'fas fa-image',
                    'fields' => [
                        [
                            'id'      => 'global_page_banner_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Global Banner',
                            'default' => true,
                        ],
                        [
                            'id'      => 'global_page_banner_bg',
                            'type'    => 'upload',
                            'title'   => 'Global Banner Background',
                            'default' => get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg',
                            'dependency' => ['global_page_banner_enable', '==', 'true'],
                        ],
                    ],
                ],
            ],
        ],
    ],
]);

// Sub-section: Post Layout
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'layouts_settings',
    'id'     => 'post_layout_settings',
    'title'  => 'Post Layout',
    'icon'   => 'fas fa-edit',
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
            'default' => true
        ],
        [
            'id'      => 'blog_single_sidebar',
            'type'    => 'switcher',
            'title'   => 'Enable Sidebar on Single Post',
            'default' => true
        ]
    ]
]);