<?php
// Header Settings
CSF::createSection($prefix, array(
    'id' => 'header_settings',
    'title' => 'Header Settings',
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
            'desc' => 'Select the header style for your site.',
            'options' => array(
                'style-1' => 'Style 1 - Default Header',
                'style-2' => 'Style 2 - Alternative Header',
            ),
            'default' => 'style-1',
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

        // Contact Information (Global for Headers)
            array(
            'type' => 'subheading',
            'content' => 'Contact Information',
        ),
            array(
            'id' => 'contact_phone',
            'type' => 'text',
            'title' => 'Phone Number',
            'default' => '(+5) 678 90 12 345',
        ),
            array(
            'id' => 'contact_email',
            'type' => 'text',
            'title' => 'Email Address',
            'default' => 'service@pruners.com',
        ),
            array(
            'id' => 'contact_address',
            'type' => 'text',
            'title' => 'Address',
            'default' => '53 Garden Street LA, USA',
        ),
            array(
            'id' => 'contact_hours',
            'type' => 'text',
            'title' => 'Working Hours',
            'default' => 'Mon-Fri: 9am to 7pm',
        ),

        // Style 1 Specific Fields
            array(
            'type' => 'subheading',
            'content' => 'Style 1 Specific Options',
            'dependency' => array('header_layout', '==', 'style-1'),
        ),
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
            'type' => 'subheading',
            'content' => 'Style 2 Specific Options',
            'dependency' => array('header_layout', '==', 'style-2'),
        ),
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