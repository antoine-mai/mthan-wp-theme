<?php
// Footer Settings
CSF::createSection($prefix, array(
    'id' => 'footer_settings',
    'title' => 'Footer Settings',
    'icon' => 'fas fa-arrow-down',
    'fields' => array(
            array(
            'id' => 'footer_layout',
            'type' => 'select',
            'title' => 'Footer Layout',
            'desc' => 'Select the footer style for your site.',
            'options' => array(
                'style-1' => 'Style 1 - Default Footer',
                'style-2' => 'Style 2 - Alternative Footer',
            ),
            'default' => 'style-1',
        ),
            array(
            'id' => 'footer_text',
            'type' => 'wp_editor',
            'title' => 'Copyright Text',
            'default' => '© ' . date('Y') . ' Mthan WP. All rights reserved.',
        ),
    )
));