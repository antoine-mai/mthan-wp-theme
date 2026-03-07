<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Get section instance fields
 * @return array
 **/
/**
 * Returns section layout fields (Background, Padding)
 */
function mthan_get_section_layout_fields()
{
    return [
        [
            'id'    => 'section_background',
            'type'  => 'background',
            'title' => 'Background Settings',
        ],
        [
            'id'    => 'section_padding',
            'type'  => 'spacing',
            'title' => 'Padding Settings',
            'left'  => false,
            'right' => false,
            'units' => ['px', '%', 'em', 'rem'],
            'default' => [
                'top'    => '120',
                'bottom' => '120',
                'unit'   => 'px',
            ],
        ],
    ];
}

/**
 * Get section instance dynamic/content fields (AJAX container and ID)
 * @return array
 **/
function mthan_get_section_instance_fields()
{
    $fields = [];
    
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
