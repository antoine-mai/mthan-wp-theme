<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
global $mthan_options_id;
CSF::createSection($mthan_options_id, array(
    'id' => 'footer_settings',
    'title' => 'Footer',
    'icon' => 'fas fa-arrow-down',
    'fields' => array(

        array(
            'id' => 'footer_layout',
            'type' => 'select',
            'title' => 'Footer Layout',
            'options' => array(
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
            ),
            'default' => 'style-1',
        ),

        // -------------------------
        // COMMON OPTIONS
        // -------------------------
        array(
            'id' => 'footer_logo',
            'type' => 'media',
            'title' => 'Footer Logo',
        ),
        array(
            'id' => 'footer_about_text',
            'type' => 'textarea',
            'title' => 'About Text',
            'default' => 'Pruners is established in the year of 2001 by Lee Rother, With operations throughout North America ...',
        ),
        array(
            'id' => 'footer_about_btn_text',
            'type' => 'text',
            'title' => 'About Button Text',
            'default' => 'More About Us',
        ),
        array(
            'id' => 'footer_about_btn_url',
            'type' => 'text',
            'title' => 'About Button URL',
            'default' => '#',
        ),
        array(
            'id' => 'footer_newsletter_title',
            'type' => 'text',
            'title' => 'Newsletter Title',
            'default' => 'Subscribe Us',
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'wp_editor',
            'title' => 'Copyright Text',
            'default' => 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.',
        ),

        // -------------------------
        // STYLE 1 OPTIONS
        // -------------------------
        array(
            'id' => 'footer_1_bg_left',
            'type' => 'media',
            'title' => 'Background Image Left',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
        array(
            'id' => 'footer_1_bg_right',
            'type' => 'media',
            'title' => 'Background Image Right',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
        array(
            'id' => 'footer_1_services_title',
            'type' => 'text',
            'title' => 'Services Widget Title',
            'default' => 'Main Services',
            'dependency' => array('footer_layout', '==', 'style-1'),
        ),
        array(
            'id' => 'footer_1_services',
            'type' => 'group',
            'title' => 'Services Widget Items',
            'button_title' => 'Add Service',
            'dependency' => array('footer_layout', '==', 'style-1'),
            'accordion_title_auto' => true,
            'fields' => array(
                array(
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Service Title',
                ),
                array(
                    'id' => 'icon',
                    'type' => 'upload',
                    'preview' => false,
                    'title' => 'Icon Upload',
                ),
                array(
                    'id' => 'link_text',
                    'type' => 'text',
                    'title' => 'Link Text',
                    'default' => 'Details',
                ),
                array(
                    'id' => 'url',
                    'type' => 'text',
                    'title' => 'Service URL',
                    'default' => '#',
                ),
            ),
            'default' => array(
                array('title' => 'Spring Cleanup', 'link_text' => 'Details', 'url' => '#'),
                array('title' => 'Plants Planting', 'link_text' => 'Details', 'url' => '#'),
                array('title' => 'Water Fountain', 'link_text' => 'Details', 'url' => '#'),
            ),
        ),

        // -------------------------
        // STYLE 2 OPTIONS
        // -------------------------
        array(
            'id' => 'footer_2_newsletter_text',
            'type' => 'textarea',
            'title' => 'Newsletter Description',
            'default' => 'Subscribe to our Newsletter & Event right now to be updated.',
            'dependency' => array('footer_layout', '==', 'style-2'),
        ),

    )
));
