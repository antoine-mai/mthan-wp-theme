<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createMetabox(MTHAN_PAGE_OPTIONS, [
    'title'        => 'Page Options',
    'post_type'    => 'page',
    'show_restore' => true,
    'tabs'         => 'horizontal',
    'context'      => 'normal',
    'priority'     => 'high',
]);

// Sections
$available_sections = mthan_get_available_base_sections();
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Sections',
    'icon'   => 'fas fa-layer-group',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => 'Before Content',
        ],
        [
            'id'                    => 'page_before_content',
            'type'                  => 'group',
            'button_title'          => 'Add Section',
            'accordion_title_auto'  => true,
            'accordion_title_prefix'=> 'Section: ',
            'accordion_title_number'=> true,
            'fields'                => array_merge(
                [
                    [
                        'id'         => 'name',
                        'type'       => 'text',
                        'title'      => 'Name',
                        'attributes' => ['data-section-name' => '1', 'placeholder' => 'Section name'],
                    ],
                    [
                        'id'      => 'section_template',
                        'type'    => 'select',
                        'title'   => 'Select Template',
                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections,
                    ],
                ],
                mthan_get_section_instance_fields()
            ),
        ],
        [
            'type'    => 'subheading',
            'content' => 'After Content',
        ],
        [
            'id'                    => 'page_after_content',
            'type'                  => 'group',
            'button_title'          => 'Add Section',
            'accordion_title_auto'  => true,
            'accordion_title_prefix'=> 'Section: ',
            'accordion_title_number'=> true,
            'fields'                => array_merge(
                [
                    [
                        'id'         => 'name',
                        'type'       => 'text',
                        'title'      => 'Name',
                        'attributes' => ['data-section-name' => '1', 'placeholder' => 'Section name'],
                    ],
                    [
                        'id'      => 'section_template',
                        'type'    => 'select',
                        'title'   => 'Select Template',
                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections,
                    ],
                ],
                mthan_get_section_instance_fields()
            ),
        ],
    ],
]);

// Layout
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