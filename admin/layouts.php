<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Layouts Settings
CSF::createSection($prefix, array(
    'id' => 'layouts_settings',
    'title' => 'Layout Settings',
    'icon' => 'fas fa-columns',
    'fields' => array(

        array(
            'id' => 'header_layout',
            'type' => 'image_select',
            'title' => 'Header Layout',
            'desc' => 'Select the global header style for your site.',
            'options' => array(
                'style-1' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                'style-2' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
            ),
            'default' => 'style-1',
        ),
        
        array(
            'id' => 'footer_layout',
            'type' => 'image_select',
            'title' => 'Footer Layout',
            'desc' => 'Select the global footer style for your site.',
            'options' => array(
                'style-1' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                'style-2' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
            ),
            'default' => 'style-1',
        ),

    )
));