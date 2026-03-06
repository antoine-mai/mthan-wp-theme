<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$global_settings_fields = [
    [
        'id'      => 'default_section_padding',
        'type'    => 'spacing',
        'title'   => 'Default Section Padding',
        'left'    => false,
        'right'   => false,
        'units'   => ['px', '%', 'em', 'rem'],
        'default' => [
            'top'    => '120',
            'bottom' => '120',
            'unit'   => 'px',
        ],
    ],
    [
        'id'      => 'default_section_bg',
        'type'    => 'color',
        'title'   => 'Default Section Background Color',
        'default' => '#ffffff',
    ],
];

$toggle_fields = [];
$config_accordion_items = [];
$sections_path = get_template_directory() . '/sections/';

if (is_dir($sections_path)) {
    $files = glob($sections_path . '*.php');
    if ($files) {
        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $section_name = ucwords(str_replace('-', ' ', $filename));
            
            $toggle_fields[] = [
                'id'      => 'enable_section_' . str_replace('-', '_', $filename),
                'type'    => 'switcher',
                'title'   => 'Enable ' . $section_name,
                'default' => true,
            ];

            $config_accordion_items[] = [
                'title'  => $section_name,
                'fields' => [
                    [
                        'type'    => 'content',
                        'content' => 'Configurations for ' . $section_name . ' will be placed here.',
                    ]
                ]
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

$config_fields = [];
if (!empty($config_accordion_items)) {
    $config_fields[] = [
        'id'         => 'sections_configuration_accordion',
        'type'       => 'accordion',
        'accordions' => $config_accordion_items,
    ];
} else {
    $config_fields[] = [
        'type'    => 'content',
        'content' => 'No sections found.',
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
                    'title'  => 'Configurations',
                    'icon'   => 'fas fa-sliders-h',
                    'fields' => $config_fields,
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