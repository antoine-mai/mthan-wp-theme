<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Header Settings
CSF::createSection($prefix, array(
    'id' => 'header_settings',
    'title' => 'Header',
    'icon' => 'fas fa-arrow-up',
    'fields' => array(

        // General Header Layout
            array(
            'type' => 'subheading',
            'content' => 'Layout Settings',
        ),
            array(
            'id' => 'header_layout',
            'type' => 'select',
            'title' => 'Header Layout',
            'options' => array(
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
            ),
            'default' => 'style-1',
        ),
            array(
            'id' => 'header_logo',
            'type' => 'media',
            'title' => 'Header Logo',
            'desc' => 'Upload a custom logo for the header.',
        ),
            array(
            'id' => 'header_sticky_logo',
            'type' => 'media',
            'title' => 'Sticky Header Logo',
            'desc' => 'Upload a custom logo for the sticky header.',
        ),
            array(
            'id' => 'header_nav_logo',
            'type' => 'media',
            'title' => 'Mobile/Nav Header Logo',
            'desc' => 'Upload a custom logo for the mobile navigation menu.',
        ),
            array(
            'id' => 'header_topbar',
            'type' => 'switcher',
            'title' => 'Enable Topbar',
            'desc' => 'Show or hide the top bar above the main header.',
            'default' => true,
        ),
            array(
            'id' => 'header_sticky',
            'type' => 'switcher',
            'title' => 'Sticky Header',
            'default' => true,
        ),

        // Style 1 Specific Fields
            array(
            'id' => 'header_1_tip_text',
            'type' => 'text',
            'title' => 'Topbar Tip Text',
            'default' => 'Lawn Maintenance Tips',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'header_1_tip_link',
            'type' => 'text',
            'title' => 'Topbar Tip Link',
            'default' => '#',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'header_1_callback_text',
            'type' => 'text',
            'title' => 'Call Back Text',
            'default' => 'Get Call Back',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'header_1_btn_text',
            'type' => 'text',
            'title' => 'Button Text',
            'default' => 'Free Estimate',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'header_1_btn_url',
            'type' => 'text',
            'title' => 'Button URL',
            'default' => 'contact.html',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),

        // Style 2 Specific Fields
            array(
            'id' => 'header_2_quote_text',
            'type' => 'text',
            'title' => 'Topbar Welcome Text',
            'default' => 'Welcome to Pruners & Co',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_quote_btn_text',
            'type' => 'text',
            'title' => 'Topbar Button Text',
            'default' => 'Get a Quote',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_quote_btn_url',
            'type' => 'text',
            'title' => 'Topbar Button URL',
            'default' => '#',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_help_text',
            'type' => 'text',
            'title' => 'Need Help Text',
            'default' => 'Need Help?',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_iso_title',
            'type' => 'text',
            'title' => 'ISO Title',
            'default' => 'ISO 9001:2015',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_iso_text',
            'type' => 'text',
            'title' => 'ISO Text',
            'default' => 'Certified Landscape Designer',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'header_2_iso_image',
            'type' => 'media',
            'title' => 'ISO Image',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),

    )
));