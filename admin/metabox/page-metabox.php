<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createMetabox(MTHAN_PAGE_OPTIONS, [
    'title'        => 'Page Options',
    'post_type'    => 'page',
    'show_restore' => true,
    'tabs'         => 'horizontal',
]);

// General
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Layout',
    'icon'   => 'fas fa-columns',
    'fields' => [
        [
            'id'      => 'custom_header_layout',
            'type'    => 'select',
            'title'   => 'Header Style',
            'options' => [
                ''        => '— Use Default —',
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
            ],
        ],
        [
            'id'      => 'custom_footer_layout',
            'type'    => 'select',
            'title'   => 'Footer Style',
            'options' => [
                ''        => '— Use Default —',
                'style-1' => 'Style 1',
                'style-2' => 'Style 2',
            ],
        ],
        [
            'id'      => 'hide_page_banner',
            'type'    => 'switcher',
            'title'   => 'Hide Page Banner',
            'default' => false,
        ],
        [
            'id'      => 'hide_mobile_bar',
            'type'    => 'switcher',
            'title'   => 'Hide Mobile Bar',
            'default' => false,
        ],
    ],
]);

// Page Banner
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Page Banner',
    'icon'   => 'fas fa-image',
    'fields' => [
        [
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'title' => 'Banner Title',
        ],
        [
            'id'      => 'page_banner_bg',
            'type'    => 'upload',
            'title'   => 'Background Image',
            'preview' => false,
        ],
    ],
]);