<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Header Settings - Horizontal Tabs
**/

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'header_settings',
    'title' => 'Header',
    'icon'  => 'fas fa-arrow-up',
    'fields' => [
        [
            'id'   => 'header_tabs',
            'type' => 'tabbed',
            'tabs' => [
                // 1. General Settings
                [
                    'title'  => 'General',
                    'icon'   => 'fas fa-cog',
                    'fields' => [
                        [
                            'id'      => 'header_layout',
                            'type'    => 'select',
                            'title'   => 'Active Header Layout',
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        ],
                        [
                            'id'      => 'header_logo',
                            'type'    => 'upload',
                            'title'   => 'Primary Header Logo',
                            'desc'    => 'Default: assets/images/logo.png',
                            'preview' => false
                        ],
                        [
                            'id'      => 'header_nav_logo',
                            'type'    => 'upload',
                            'title'   => 'Mobile/Nav Logo',
                            'desc'    => 'Default: assets/images/nav-logo.png',
                            'preview' => false
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Navigation Menu Items',
                        ],
                        [
                            'id'              => 'menu_items',
                            'type'            => 'group',
                            'button_title'    => 'Add New Item',
                            'accordion_title_auto' => true,
                            'accordion_title_prefix' => 'Item: ',
                            'fields'          => [
                                [
                                    'id'    => 'title',
                                    'type'  => 'text',
                                    'title' => 'Title',
                                ],
                                mthan_page_select_field('url', 'Select Page / Post', [
                                    'default' => '#',
                                    'desc'    => 'Choose a page/post or enter a custom link below',
                                ]),
                                [
                                    'id'    => 'target',
                                    'type'  => 'select',
                                    'title' => 'Target',
                                    'options' => [
                                        '_self'  => 'Same Window',
                                        '_blank' => 'New Window',
                                    ],
                                    'default' => '_self',
                                ],
                                [
                                    'id'    => 'mega_menu',
                                    'type'  => 'switcher',
                                    'title' => 'Mega Menu',
                                    'default' => false,
                                ],
                                [
                                    'id'    => 'submenu',
                                    'type'  => 'group',
                                    'title' => 'Submenu Items',
                                    'button_title' => 'Add Submenu Item',
                                    'accordion_title_auto' => true,
                                    'fields' => [
                                        [
                                            'id'    => 'title',
                                            'type'  => 'text',
                                            'title' => 'Title',
                                        ],
                                        mthan_page_select_field('url', 'Select Page / Post', [
                                            'default' => '#',
                                        ]),
                                        [
                                            'id'    => 'target',
                                            'type'  => 'select',
                                            'title' => 'Target',
                                            'options' => [
                                                '_self'  => 'Same Window',
                                                '_blank' => 'New Window',
                                            ],
                                            'default' => '_self',
                                        ],
                                    ]
                                ]
                            ]
                        ],
                    ]
                ],
                // 2. Style 1
                [
                    'title'  => 'Style 1',
                    'icon'   => 'fas fa-paint-brush',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Settings',
                        ],
                        [
                            'id'      => 'header_1_tip_text',
                            'type'    => 'text',
                            'title'   => 'Topbar Tip Text',
                            'default' => 'Lawn Maintenance Tips',
                        ],
                        mthan_page_select_field('header_1_tip_link', 'Topbar Tip Link', [
                            'default' => '/contact',
                        ]),
                        [
                            'id'      => 'header_1_callback_text',
                            'type'    => 'text',
                            'title'   => 'Call Back Text',
                            'default' => 'Get Call Back',
                        ],
                        mthan_page_select_field('header_1_callback_url', 'Call Back URL', [
                            'default' => '/contact',
                        ]),
                        [
                            'id'      => 'header_1_btn_text',
                            'type'    => 'text',
                            'title'   => 'Button Text',
                            'default' => 'Contact Us',
                        ],
                        mthan_page_select_field('header_1_btn_url', 'Button URL', [
                            'default' => '/contact',
                        ]),
                        [
                            'id'      => 'header_1_btn_icon',
                            'type'    => 'icon',
                            'title'   => 'Button Icon',
                            'default' => 'fas fa-phone-alt',
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Color Settings',
                        ],
                        [
                            'id'          => 'header_1_bg_color',
                            'type'        => 'color',
                            'title'       => 'Header Lower Background',
                            'default'     => '#132728',
                            'output'      => '.main-header .header-lower',
                            'output_mode' => 'background-color',
                        ],
                        [
                            'id'          => 'header_1_menu_color',
                            'type'        => 'color',
                            'title'       => 'Menu Text Color',
                            'default'     => '#ffffff',
                            'output'      => '.main-header .main-menu .navigation > li > a',
                            'output_mode' => 'color',
                        ],
                        [
                            'id'          => 'header_1_menu_hover_color',
                            'type'        => 'color',
                            'title'       => 'Menu Hover/Active Color',
                            'default'     => '#24a77e',
                            'output'      => [
                                '.main-header .main-menu .navigation > li:hover > a',
                                '.main-header .main-menu .navigation > li.current > a'
                            ],
                            'output_mode' => 'color',
                        ],
                        [
                            'id'          => 'header_1_btn_bg',
                            'type'        => 'color',
                            'title'       => 'Button Background',
                            'default'     => '#24a77e',
                            'output'      => '.main-header .header-lower .more-links .estimate-btn a',
                            'output_mode' => 'background-color',
                        ],
                        [
                            'id'          => 'header_1_btn_color',
                            'type'        => 'color',
                            'title'       => 'Button Text & Icon Color',
                            'default'     => '#ffffff',
                            'output'      => '.main-header .header-lower .more-links .estimate-btn a',
                            'output_mode' => 'color',
                        ],
                        [
                            'id'          => 'header_1_callback_color',
                            'type'        => 'color',
                            'title'       => 'Call Back Text Color',
                            'default'     => '#161616',
                            'output'      => '.main-header .header-upper .upper-right .info-box .call a',
                            'output_mode' => 'color',
                        ],
                    ]
                ],
                // 3. Style 2
                [
                    'title'  => 'Style 2',
                    'icon'   => 'fas fa-paint-brush',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Settings',
                        ],
                        [
                            'id'      => 'header_2_quote_text',
                            'type'    => 'text',
                            'title'   => 'Topbar Welcome Text',
                            'default' => 'Welcome to Pruners & Co',
                        ],
                        [
                            'id'      => 'header_2_quote_btn_text',
                            'type'    => 'text',
                            'title'   => 'Topbar Button Text',
                            'default' => 'Contact Us',
                        ],
                        mthan_page_select_field('header_2_quote_btn_url', 'Topbar Button URL', [
                            'default' => '/contact',
                        ]),
                        [
                            'id'      => 'header_2_help_text',
                            'type'    => 'text',
                            'title'   => 'Need Help Text',
                            'default' => 'Need Help?',
                        ],
                        [
                            'id'      => 'header_2_iso_title',
                            'type'    => 'text',
                            'title'   => 'ISO Title',
                            'default' => 'ISO 9001:2015',
                        ],
                        [
                            'id'      => 'header_2_iso_text',
                            'type'    => 'text',
                            'title'   => 'ISO Text',
                            'default' => 'Certified Landscape Designer',
                        ],
                        [
                            'id'      => 'header_2_iso_image',
                            'type'    => 'upload',
                            'title'   => 'ISO Image',
                            'preview' => false,
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Color Settings',
                        ],
                        [
                            'id'          => 'header_2_topbar_bg',
                            'type'        => 'color',
                            'title'       => 'Topbar Background',
                            'default'     => '#132728',
                            'output'      => '.main-header.header-style-two .header-top-two',
                            'output_mode' => 'background-color',
                        ],
                        [
                            'id'          => 'header_2_topbar_color',
                            'type'        => 'color',
                            'title'       => 'Topbar Text Color',
                            'default'     => '#ffffff',
                            'output'      => [
                                '.main-header.header-style-two .header-top-two .inner .top-left .quote-link',
                                '.main-header.header-style-two .header-top-two .inner .top-right .top-links li'
                            ],
                            'output_mode' => 'color',
                        ],
                        [
                            'id'          => 'header_2_upper_bg',
                            'type'        => 'color',
                            'title'       => 'Header Upper Background',
                            'default'     => '#ffffff',
                            'output'      => '.main-header.header-style-two .header-upper-two',
                            'output_mode' => 'background-color',
                        ],
                        [
                            'id'          => 'header_2_menu_bg',
                            'type'        => 'color',
                            'title'       => 'Menu Bar Background',
                            'default'     => 'transparent',
                            'output'      => '.main-header.header-style-two .header-lower',
                            'output_mode' => 'background-color',
                        ],
                        [
                            'id'          => 'header_2_menu_color',
                            'type'        => 'color',
                            'title'       => 'Menu Text Color',
                            'default'     => '#24a77e',
                            'output'      => '.main-header.header-style-two .main-menu .navigation > li > a',
                            'output_mode' => 'color',
                        ],
                        [
                            'id'          => 'header_2_menu_hover_color',
                            'type'        => 'color',
                            'title'       => 'Menu Hover/Active Color',
                            'default'     => '#132728',
                            'output'      => [
                                '.main-header.header-style-two .main-menu .navigation > li:hover > a',
                                '.main-header.header-style-two .main-menu .navigation > li.current > a'
                            ],
                            'output_mode' => 'color',
                        ],
                    ]
                ],
                // 4. Sticky Header
                [
                    'title'  => 'Sticky',
                    'icon'   => 'fas fa-thumbtack',
                    'fields' => [
                        [
                            'id'      => 'header_sticky',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sticky Header',
                            'default' => true,
                        ],
                        [
                            'id'      => 'header_sticky_logo',
                            'type'    => 'upload',
                            'title'   => 'Sticky Logo',
                            'desc'    => 'Default: assets/images/sticky-logo.png',
                            'preview' => false,
                            'dependency' => ['header_sticky', '==', 'true'],
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Sticky Colors',
                            'dependency' => ['header_sticky', '==', 'true'],
                        ],
                        [
                            'id'          => 'sticky_bg_color',
                            'type'        => 'color',
                            'title'       => 'Sticky Background',
                            'default'     => '#ffffff',
                            'output'      => '.sticky-header',
                            'output_mode' => 'background-color',
                            'dependency'  => ['header_sticky', '==', 'true'],
                        ],
                        [
                            'id'          => 'sticky_menu_color',
                            'type'        => 'color',
                            'title'       => 'Sticky Menu Text',
                            'default'     => '#132728',
                            'output'      => '.sticky-header .main-menu .navigation > li > a',
                            'output_mode' => 'color',
                            'dependency'  => ['header_sticky', '==', 'true'],
                        ],
                        [
                            'id'          => 'sticky_menu_hover_color',
                            'type'        => 'color',
                            'title'       => 'Sticky Menu Hover',
                            'default'     => '#24a77e',
                            'output'      => [
                                '.sticky-header .main-menu .navigation > li:hover > a',
                                '.sticky-header .main-menu .navigation > li.current > a'
                            ],
                            'output_mode' => 'color',
                            'dependency'  => ['header_sticky', '==', 'true'],
                        ],
                    ]
                ],
            ]
        ]
    ]
]);