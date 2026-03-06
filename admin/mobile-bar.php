<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Mobile Bar Settings
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'mobile_bar_settings',
    'title' => 'Mobile Bar',
    'icon' => 'fas fa-mobile-alt',
    'fields' => array(
        array(
            'id' => 'enable_mobile_bar',
            'type' => 'switcher',
            'title' => 'Enable Mobile Bar',
            'default' => true,
        ),
        array(
            'id' => 'mobile_bar_items',
            'type' => 'group',
            'title' => 'Mobile Bar Items',
            'button_title' => 'Add New Item',
            'accordion_title_auto' => true,
            'accordion_title_prefix' => 'Item: ',
            'accordion_title_number' => true,
            'dependency' => array('enable_mobile_bar', '==', true),
            'fields' => array(
                array(
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id' => 'url',
                    'type' => 'text',
                    'title' => 'URL',
                    'default' => '#',
                ),
                array(
                    'id' => 'icon',
                    'type' => 'upload',
                    'title' => 'Icon Upload',
                    'preview' => false,
                ),
                array(
                    'id' => 'text_color',
                    'type' => 'color',
                    'title' => 'Text Color',
                    'default' => '#333333',
                ),
            ),
        ),
    )
));
