<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Footer Settings
CSF::createSection($prefix, array(
    'id' => 'footer_settings',
    'title' => 'Footer Settings',
    'icon' => 'fas fa-arrow-down',
    'fields' => array(
        // Style 1 specifics
            array(
            'type' => 'heading',
            'content' => 'Style 1 Settings',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'footer_1_logo',
            'type' => 'media',
            'title' => 'Footer Logo',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'footer_1_about_text',
            'type' => 'textarea',
            'title' => 'About Text',
            'default' => 'Pruners is established in the year of 2001 by Lee Rother, With operations throughout North America ...',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'footer_1_about_btn_text',
            'type' => 'text',
            'title' => 'About Button Text',
            'default' => 'More About Us',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
            array(
            'id' => 'footer_1_about_btn_url',
            'type' => 'text',
            'title' => 'About Button URL',
            'default' => '#',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),

        // Style 2 specifics
            array(
            'type' => 'heading',
            'content' => 'Style 2 Settings',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'footer_2_logo',
            'type' => 'media',
            'title' => 'Footer Logo',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'footer_2_about_text',
            'type' => 'textarea',
            'title' => 'About Text',
            'default' => 'It is a long established fact that a reader will be distracted by the readable content page looking at its normal distribution.',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'footer_2_about_btn_text',
            'type' => 'text',
            'title' => 'About Button Text',
            'default' => 'More About Us',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'footer_2_about_btn_url',
            'type' => 'text',
            'title' => 'About Button URL',
            'default' => '#',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),
            array(
            'id' => 'footer_2_newsletter_text',
            'type' => 'textarea',
            'title' => 'Newsletter Text',
            'default' => 'Subscribe to our Newsletter & Event right now to be updated.',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),

        // Common settings
            array(
            'type' => 'heading',
            'content' => 'Global Footer Settings',
        ),
            array(
            'id' => 'footer_copyright_text',
            'type' => 'wp_editor',
            'title' => 'Copyright Text',
            'default' => 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.',
        ),
    )
));