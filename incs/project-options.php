<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Project Options — Definining the layout of a single project.
 */

CSF::createMetabox(MTHAN_PROJECT_OPTIONS, [
    'title'        => 'Project Options',
    'post_type'    => 'mthan_project',
    'show_restore' => true,
    'tabs'         => 'horizontal',
    'context'      => 'normal',
    'priority'     => 'high',
]);

// ── Sections Data ───────────────────────────────────────────────────
$available_sections = array_merge(['' => '— Select Template —'], mthan_get_sections());
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
                        'chosen'  => true,
                    ],
                ],
                $section_fields
            ),
        ],
    ];
};

// ── Project Layout Sections ────────────────────────────────────────
CSF::createSection(MTHAN_PROJECT_OPTIONS, [
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => $mthan_gen_section_group('project_sections'),
]);
