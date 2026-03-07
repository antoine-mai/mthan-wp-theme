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
$registered    = function_exists('mthan_get_registered_sections') ? mthan_get_registered_sections() : array();
$variant_slugs = function_exists('mthan_get_section_variant_slugs') ? mthan_get_section_variant_slugs() : array();

foreach ($registered as $slug) {
    if (in_array($slug, $variant_slugs)) {
        continue;
    }
    $section_name = ucwords(str_replace('-', ' ', $slug));
    
    $toggle_fields[] = [
        'id'      => 'enable_section_' . str_replace('-', '_', $slug),
        'type'    => 'switcher',
        'title'   => 'Enable ' . $section_name,
        'default' => true,
    ];
}

if (empty($toggle_fields)) {
    $toggle_fields[] = [
        'type'    => 'content',
        'content' => 'No sections found in the /incs/sections/ directory.',
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