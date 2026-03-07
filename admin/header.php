<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Header Settings Restructured
**/

// 1. Parent Header Section
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'header_settings',
    'title' => 'Header',
    'icon'  => 'fas fa-arrow-up',
]);

// 2. General Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'header_settings',
    'title'  => 'General Settings',
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
            'id'      => 'header_topbar',
            'type'    => 'switcher',
            'title'   => 'Enable Topbar',
            'default' => true,
        ],
    ]
]);

// 3. Header Style 1 Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'header_settings',
    'title'  => 'Header Style 1',
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
        [
            'id'      => 'header_1_tip_link',
            'type'    => 'text',
            'title'   => 'Topbar Tip Link',
            'default' => '#',
        ],
        [
            'id'      => 'header_1_callback_text',
            'type'    => 'text',
            'title'   => 'Call Back Text',
            'default' => 'Get Call Back',
        ],
        [
            'id'      => 'header_1_btn_text',
            'type'    => 'text',
            'title'   => 'Button Text',
            'default' => 'Free Estimate',
        ],
        [
            'id'      => 'header_1_btn_url',
            'type'    => 'text',
            'title'   => 'Button URL',
            'default' => 'contact.html',
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
    ]
]);

// 4. Header Style 2 Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'header_settings',
    'title'  => 'Header Style 2',
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
            'default' => 'Get a Quote',
        ],
        [
            'id'      => 'header_2_quote_btn_url',
            'type'    => 'text',
            'title'   => 'Topbar Button URL',
            'default' => '#',
        ],
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
    ]
]);

// 5. Sticky Header Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'parent' => 'header_settings',
    'title'  => 'Sticky Header',
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
]);