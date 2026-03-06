<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Typography Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id' => 'typography_settings',
    'title' => 'Typography',
    'icon' => 'fas fa-font',
    'fields' => [
        [
            'id' => 'body_typography',
            'type' => 'typography',
            'title' => 'Body Font',
            'output' => 'body, p',
            'default' => [
                'font-family' => 'Inter',
                'type'        => 'google',
            ],
        ],
        [
            'id' => 'heading_typography',
            'type' => 'typography',
            'title' => 'Heading Font (H1 - H6)',
            'output' => 'h1, h2, h3, h4, h5, h6, .theme-btn',
            'default' => [
                'font-family' => 'Libre Baskerville',
                'type'        => 'google',
            ],
        ],
    ]
]);
