<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Layouts Settings
 */

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'page_layout_settings',
    'title'  => 'Page Layout',
    'icon'   => 'fas fa-columns',
    'fields' => [
        [
            'id'    => 'layouts_tabs',
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
                [
                    'title'  => 'Other Layouts',
                    'icon'   => 'fas fa-cog',
                    'fields' => [
                        [
                            'type'    => 'content',
                            'content' => 'Layout logic has been reset. Please start from zero.',
                        ],
                    ],
                ],
            ],
        ],
    ],
]);