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

// ── Sections ───────────────────────────────────────────────────────
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => [
        [
            'type'    => 'content',
            'content' => 'Section logic has been reset. Please start from zero.',
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