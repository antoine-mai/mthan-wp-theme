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

            $config_fields_func = 'mthan_section_' . str_replace('-', '_', $filename) . '_config_options';
            $options_fields_func = 'mthan_section_' . str_replace('-', '_', $filename) . '_options';
            $section_config_fields = [];
            
            // First load special config
            if (function_exists($config_fields_func)) {
                $section_config_fields = $config_fields_func();
            }

            // Then load content fields as global defaults
            if (function_exists($options_fields_func)) {
                $content_fields = $options_fields_func();
                foreach($content_fields as $cf) {
                    if (isset($cf['id'])) {
                        $cf['id'] = 'g_' . $filename . '_' . str_replace($filename . '_', '', $cf['id']);
                        $cf['title'] = 'Default ' . $cf['title'];
                        // For global configs, we might not want dependencies based on local style selector
                        if (isset($cf['dependency'])) unset($cf['dependency']);
                        $section_config_fields[] = $cf;
                    }
                }
            }

            if (empty($section_config_fields)) {
                $section_config_fields[] = [
                    'type'    => 'content',
                    'content' => 'No special configurations for ' . $section_name . ' yet.',
                ];
            }

            $config_accordion_items[] = [
                'title'  => $section_name,
                'fields' => $section_config_fields,
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