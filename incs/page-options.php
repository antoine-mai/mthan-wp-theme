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

// ── Sections ───────────────────────────────────────────────────────
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => [
        [
            'id'                     => 'page_sections',
            'type'                   => 'group',
            'button_title'           => 'Add Section',
            'accordion_title_auto'   => true,
            'accordion_title_prefix' => 'Section: ',
            'accordion_title_number' => true,
            'fields'                 => [
                [
                    'id'    => 'template',
                    'type'  => 'select',
                    'title' => 'Select Template',
                    'options' => $available_sections,
                ],
            ],
        ],
    ],
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