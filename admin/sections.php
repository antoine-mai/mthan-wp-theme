<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$global_settings_fields = [
    [
        'id'      => 'default_section_padding_top',
        'type'    => 'text',
        'title'   => 'Default Section Top Padding',
        'default' => '120px',
    ],
    [
        'id'      => 'default_section_padding_bottom',
        'type'    => 'text',
        'title'   => 'Default Section Bottom Padding',
        'default' => '120px',
    ],
    [
        'id'      => 'default_section_bg',
        'type'    => 'color',
        'title'   => 'Default Section Background Color',
        'default' => '#ffffff',
    ],
];

$toggle_fields = [];
$sections_path = get_template_directory() . '/sections/';

if (is_dir($sections_path)) {
    $files = glob($sections_path . '*.php');
    if ($files) {
        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $toggle_fields[] = [
                'id'      => 'enable_section_' . str_replace('-', '_', $filename),
                'type'    => 'switcher',
                'title'   => 'Enable ' . ucwords(str_replace('-', ' ', $filename)),
                'default' => true,
            ];
        }
    }
}

if (empty($toggle_fields)) {
    $toggle_fields[] = [
        'type'    => 'content',
        'content' => 'No sections found in the /sections/ directory.',
    ];
}

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'sections_settings',
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => [
        [
            'id'   => 'sections_tabs',
            'type' => 'tabbed',
            'tabs' => [
                [
                    'title'  => 'Global Settings',
                    'icon'   => 'fas fa-globe',
                    'fields' => $global_settings_fields,
                ],
                [
                    'title'  => 'Enable / Disable',
                    'icon'   => 'fas fa-toggle-on',
                    'fields' => $toggle_fields,
                ],
            ],
        ],
    ],
]);