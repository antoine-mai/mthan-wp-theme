<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Get section instance fields
 * @return array
 **/
function mthan_get_section_instance_fields()
{
    $fields = [];
    $sections_path = get_template_directory() . '/incs/sections/';
    $style_map = mthan_get_section_style_map();
    $global_options = get_option(MTHAN_THEME_OPTIONS, []);

    // We only provide global per-section setting fields here.
    // The content fields of each section are loaded via AJAX when the section is selected.
    
    $fields[] = [
        'id'      => 'section_background',
        'type'    => 'background',
        'title'   => 'Background Settings',
    ];

    $fields[] = [
        'id'      => 'section_padding',
        'type'    => 'spacing',
        'title'   => 'Padding Settings',
        'left'    => false,
        'right'   => false,
        'units'   => ['px', '%', 'em', 'rem'],
        'default' => [
            'top'    => '120',
            'bottom' => '120',
            'unit'   => 'px',
        ],
    ];

    // Placeholder for AJAX-loaded content fields
    $fields[] = [
        'type'    => 'callback',
        'function'=> 'mthan_render_ajax_section_fields_container',
    ];


    $fields[] = [
        'id'      => 'section_id',
        'type'    => 'text',
        'title'   => 'Section ID',
        'desc'    => 'Optional ID for this section instance (useful for anchor links)',
    ];

    return $fields;
}
