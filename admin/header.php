<?php
// Header Settings
CSF::createSection($prefix, array(
    'id' => 'header_settings',
    'title' => 'Header Settings',
    'icon' => 'fas fa-arrow-up',
    'fields' => array(
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
            array(
            'id' => 'header_button',
            'type' => 'switcher',
            'title' => 'Show Header Button',
            'default' => false,
        ),
    )
));