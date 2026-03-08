<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'footer_settings',
    'title' => 'Footer',
    'icon'  => 'fas fa-arrow-down',
    'fields' => [
        [
            'id'    => 'footer_tabs',
            'type'  => 'tabbed',
            'tabs'  => [
                // 1. General
                [
                    'title'  => 'General',
                    'icon'   => 'fas fa-cog',
                    'fields' => [
                        [
                            'id'      => 'footer_layout',
                            'type'    => 'select',
                            'title'   => 'Footer Layout',
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        ],
                        [
                            'id'      => 'footer_logo',
                            'type'    => 'upload',
                            'title'   => 'Footer Logo',
                            'preview' => false
                        ],
                        [
                            'id'      => 'footer_about_text',
                            'type'    => 'textarea',
                            'title'   => 'About Text',
                            'default' => 'Pruners is established in the year of 2001 by Lee Rother, With operations throughout North America ...',
                        ],
                        [
                            'id'      => 'footer_about_btn_text',
                            'type'    => 'text',
                            'title'   => 'About Button Text',
                            'default' => 'More About Us',
                        ],
                        mthan_page_select_field('footer_about_btn_url', 'About Button URL', [
                            'default' => '#',
                        ]),
                        [
                            'id'      => 'footer_newsletter_title',
                            'type'    => 'text',
                            'title'   => 'Newsletter Title',
                            'default' => 'Subscribe Us',
                        ],
                        [
                            'id'      => 'footer_copyright_text',
                            'type'    => 'wp_editor',
                            'title'   => 'Copyright Text',
                            'default' => 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.',
                        ],
                    ]
                ],
                // 2. Style 1
                [
                    'title'  => 'Style 1',
                    'icon'   => 'fas fa-paint-brush',
                    'fields' => [
                        [
                            'id' => 'footer_1_bg_left',
                            'type' => 'upload',
                            'title' => 'Background Image Left',
                            'preview' => false,
                        ],
                        [
                            'id' => 'footer_1_bg_right',
                            'type' => 'upload',
                            'title' => 'Background Image Right',
                            'preview' => false,
                        ],
                        [
                            'id' => 'footer_1_services_title',
                            'type' => 'text',
                            'title' => 'Services Widget Title',
                            'default' => 'Main Services',
                        ],
                        [
                            'id' => 'footer_1_services',
                            'type' => 'group',
                            'title' => 'Services Widget Items',
                            'button_title' => 'Add Service',
                            'accordion_title_auto' => true,
                            'fields' => [
                                [
                                    'id' => 'title',
                                    'type' => 'text',
                                    'title' => 'Service Title',
                                ],
                                [
                                    'id' => 'icon',
                                    'type' => 'upload',
                                    'preview' => false,
                                    'title' => 'Icon Upload',
                                ],
                                [
                                    'id' => 'link_text',
                                    'type' => 'text',
                                    'title' => 'Link Text',
                                    'default' => 'Details',
                                ],
                                mthan_page_select_field('url', 'Service URL', [
                                    'default' => '#',
                                ]),
                            ],
                            'default' => [
                                ['title' => 'Spring Cleanup', 'link_text' => 'Details', 'url' => '#'],
                                ['title' => 'Plants Planting', 'link_text' => 'Details', 'url' => '#'],
                                ['title' => 'Water Fountain', 'link_text' => 'Details', 'url' => '#'],
                            ],
                        ],
                    ]
                ],
                // 3. Style 2
                [
                    'title'  => 'Style 2',
                    'icon'   => 'fas fa-paint-brush',
                    'fields' => [
                        [
                            'id' => 'footer_2_newsletter_text',
                            'type' => 'textarea',
                            'title' => 'Newsletter Description',
                            'default' => 'Subscribe to our Newsletter & Event right now to be updated.',
                        ]
                    ]
                ]
            ]
        ]
    ]
]);
