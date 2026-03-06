<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Sections Settings

$section_fields = [
    [
        'type'    => 'subheading',
        'content' => 'Global Section Settings',
    ],
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
    [
        'type'    => 'subheading',
        'content' => 'Enable / Disable Sections',
    ],
];

$sections_path = get_template_directory() . '/sections/';

if (is_dir($sections_path)) {
    $files = glob($sections_path . '*.php');
    if ($files) {
        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $section_fields[] = [
                'id'      => 'enable_section_' . str_replace('-', '_', $filename),
                'type'    => 'switcher',
                'title'   => 'Enable ' . ucwords(str_replace('-', ' ', $filename)),
                'default' => true,
            ];
        }
    }
}

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'sections_settings',
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => empty($files) ? [
        [
            'type'    => 'content',
            'content' => 'No sections found in the /sections/ directory.',
        ]
    ] : $section_fields
]);