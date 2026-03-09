<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Service Options — Definining the layout of a single service.
**/
CSF::createMetabox(MTHAN_SERVICE_OPTIONS, [
    'title'        => 'Service Options',
    'post_type'    => 'mthan_service',
    'show_restore' => true,
    'tabs'         => 'horizontal',
    'context'      => 'normal',
    'priority'     => 'high',
]);

// ── Sections Data ───────────────────────────────────────────────────
$available_sections = array_merge(['' => '— Select Template —'], mthan_get_sections());
$icon_path = get_template_directory_uri() . '/assets/images/icons/';
$section_fields     = mthan_get_section_fields();
// ── Helper to create section group ──
$mthan_gen_section_group = function($id) use ($available_sections, $section_fields) {
    return [
        [
            'id'                     => $id,
            'type'                   => 'group',
            'button_title'           => 'Add Section',
            'accordion_title_auto'   => true,
            'accordion_title_prefix' => 'Section: ',
            'accordion_title_number' => true,
            'fields'                 => array_merge(
                [
                    [
                        'id'    => 'template',
                        'type'  => 'select',
                        'title' => 'Select Template',
                        'options' => $available_sections,
                    ],
                ],
                $section_fields
            ),
        ],
    ];
};

// ── Service Layout Sections ────────────────────────────────────────
CSF::createSection(MTHAN_SERVICE_OPTIONS, [
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => array_merge(
        [
            [
                'id'    => 'service_icon',
                'type'  => 'upload',
                'title' => 'Service Icon',
                'help'  => 'Upload an icon image. If empty, the default font icon will be used.',
                'default' => $icon_path . 'leaf-two.png'
            ],
        ],
        $mthan_gen_section_group('service_sections')
    ),
]);

// ── Settings ──────────────────────────────────────────────────────
CSF::createSection(MTHAN_SERVICE_OPTIONS, [
    'title'  => 'Settings',
    'icon'   => 'fas fa-cogs',
    'fields' => [
        [
            'id'    => 'service_layout',
            'type'  => 'radio',
            'title' => 'Page Container',
            'options' => array(
                'boxed'    => 'Boxed',
                'fullwide' => 'Fullwide',
            ),
            'default' => 'boxed',
        ],
        [
            'id'    => 'service_sidebar_enable',
            'type'  => 'switcher',
            'title' => 'Enable Sidebar',
            'default' => false,
        ],
        [
            'id'    => 'service_hide_heading',
            'type'  => 'switcher',
            'title' => 'Hide Heading',
            'default' => false,
        ],
        [
            'id'      => 'service_sidebar_position',
            'type'    => 'radio',
            'title'   => 'Sidebar Position',
            'options' => array(
                'left'  => 'Left',
                'right' => 'Right',
            ),
            'default'    => 'left',
            'dependency' => array('service_sidebar_enable', '==', true),
        ],
        [
            'id'      => 'service_sidebar_select',
            'type'    => 'select',
            'title'   => 'Select Sidebar',
            'options' => 'sidebars',
            'dependency' => array('service_sidebar_enable', '==', true),
        ],
    ],
]);
