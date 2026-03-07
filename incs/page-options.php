<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Page Options — Definining the layout of a single page.
 */

CSF::createMetabox(MTHAN_PAGE_OPTIONS, [
    'title'        => 'Page Options',
    'post_type'    => 'page',
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
                    ],
                ],
                $section_fields
            ),
        ],
    ];
};

// ── Before Content Sections ────────────────────────────────────────
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Before Content',
    'icon'   => 'fas fa-arrow-up',
    'fields' => $mthan_gen_section_group('page_before_sections'),
]);

// ── After Content Sections ─────────────────────────────────────────
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'After Content',
    'icon'   => 'fas fa-arrow-down',
    'fields' => $mthan_gen_section_group('page_after_sections'),
]);

// ── Settings ──────────────────────────────────────────────────────
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Settings',
    'icon'   => 'fas fa-cogs',
    'fields' => [
        [
            'id'    => 'page_hide_title',
            'type'  => 'switcher',
            'title' => 'Hide Page Title',
        ],
    ],
]);