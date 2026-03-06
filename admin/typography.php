<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Typography Settings
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'typography_settings',
    'title' => 'Typography',
    'icon' => 'fas fa-font',
    'fields' => array(
        array(
            'id' => 'body_typography',
            'type' => 'typography',
            'title' => 'Body Font',
            'output' => 'body, p',
        ),
        array(
            'id' => 'heading_typography',
            'type' => 'typography',
            'title' => 'Heading Font (H1 - H6)',
            'output' => 'h1, h2, h3, h4, h5, h6, .theme-btn',
        ),
    )
));
