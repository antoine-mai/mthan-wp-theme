<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id' => 'header_settings',
    'title' => 'Header',
    'icon' => 'fas fa-arrow-up',
    'fields' => [
        [
            'type' => 'subheading',
            'content' => 'Layout Settings',
        ],
        [
            'id' => 'header_layout',
            'type' => 'select',
            'title' => 'Header Layout',
            'options' => [
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
            ],
            'default' => 'style-1',
        ],
        [
            'id' => 'header_menu',
            'type' => 'select',
            'title' => 'Select Header Menu',
            'options' => 'menus',
            'placeholder' => '— Default —',
        ],
        [
            'id' => 'header_logo',
            'type' => 'upload',
            'title' => 'Header Logo',
            'desc' => 'Upload a custom logo for the header.',
            'preview' => false
        ],
        [
            'id' => 'header_sticky_logo',
            'type' => 'upload',
            'title' => 'Sticky Header Logo',
            'desc' => 'Upload a custom logo for the sticky header.',
            'preview' => false
        ],
        [
            'id' => 'header_nav_logo',
            'type' => 'upload',
            'title' => 'Mobile/Nav Header Logo',
            'desc' => 'Upload a custom logo for the mobile navigation menu.',
            'preview' => false
        ],
        [
            'id' => 'header_topbar',
            'type' => 'switcher',
            'title' => 'Enable Topbar',
            'desc' => 'Show or hide the top bar above the main header.',
            'default' => true,
        ],
        [
            'id' => 'header_sticky',
            'type' => 'switcher',
            'title' => 'Sticky Header',
            'default' => true,
        ],
        [
            'id' => 'header_1_tip_text',
            'type' => 'text',
            'title' => 'Topbar Tip Text',
            'default' => 'Lawn Maintenance Tips',
            'dependency' => ['header_layout', '==', 'style-1'],
        ],
        [
            'id' => 'header_1_tip_link',
            'type' => 'text',
            'title' => 'Topbar Tip Link',
            'default' => '#',
            'dependency' => ['header_layout', '==', 'style-1'],
        ],
        [
            'id' => 'header_1_callback_text',
            'type' => 'text',
            'title' => 'Call Back Text',
            'default' => 'Get Call Back',
            'dependency' => ['header_layout', '==', 'style-1'],
        ],
        [
            'id' => 'header_1_btn_text',
            'type' => 'text',
            'title' => 'Button Text',
            'default' => 'Free Estimate',
            'dependency' => ['header_layout', '==', 'style-1'],
        ],
        [
            'id' => 'header_1_btn_url',
            'type' => 'text',
            'title' => 'Button URL',
            'default' => 'contact.html',
            'dependency' => ['header_layout', '==', 'style-1'],
        ],
        [
            'id' => 'header_2_quote_text',
            'type' => 'text',
            'title' => 'Topbar Welcome Text',
            'default' => 'Welcome to Pruners & Co',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_quote_btn_text',
            'type' => 'text',
            'title' => 'Topbar Button Text',
            'default' => 'Get a Quote',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_quote_btn_url',
            'type' => 'text',
            'title' => 'Topbar Button URL',
            'default' => '#',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_help_text',
            'type' => 'text',
            'title' => 'Need Help Text',
            'default' => 'Need Help?',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_iso_title',
            'type' => 'text',
            'title' => 'ISO Title',
            'default' => 'ISO 9001:2015',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_iso_text',
            'type' => 'text',
            'title' => 'ISO Text',
            'default' => 'Certified Landscape Designer',
            'dependency' => ['header_layout', '==', 'style-2'],
        ],
        [
            'id' => 'header_2_iso_image',
            'type' => 'upload',
            'title' => 'ISO Image',
            'preview' => false,
            'dependency' => ['header_layout', '==', 'style-2'],
        ],

    ]
]);