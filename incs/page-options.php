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

// Theme Options data for inheritance
$theme_options = get_option('mthan_theme_options', []);
$layouts_tabs  = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : [];

// Banner Default Background
$default_banner_bg = !empty($layouts_tabs['global_page_banner_bg']['url']) 
    ? $layouts_tabs['global_page_banner_bg']['url'] 
    : get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg';

// Banner Default Visibility (If global is off, default local should probably be hide?)
$global_banner_enabled = isset($layouts_tabs['global_page_banner_enable']) ? $layouts_tabs['global_page_banner_enable'] : true;

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
                ],
                mthan_get_section_layout_fields(),
                [
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
                ],
                mthan_get_section_layout_fields(),
                [
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

// Settings
CSF::createSection(MTHAN_PAGE_OPTIONS, [
    'title'  => 'Settings',
    'icon'   => 'fas fa-cogs',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => 'Layout Settings',
        ],
        [
            'id'      => 'page_layout_type',
            'type'    => 'select',
            'title'   => 'Page Layout Mode',
            'options' => [
                'main'    => 'Page Layout',
                'blog'    => 'Blog Layout',
                'service' => 'Service Layout',
            ],
            'default' => 'main',
        ],
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
            'id'      => 'hide_global_sections',
            'type'    => 'switcher',
            'title'   => 'Disable Global Sections',
            'desc'    => 'If enabled, global sections from Theme Options > Layouts will not be rendered on this page.',
            'default' => false,
        ],
        [
            'type'    => 'subheading',
            'content' => 'Page Banner Settings',
        ],
        [
            'id'      => 'hide_page_banner',
            'type'    => 'switcher',
            'title'   => 'Hide Page Banner',
            'default' => !$global_banner_enabled,
        ],
        [
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'title' => 'Banner Title',
            'placeholder' => get_the_title(),
            'dependency' => ['hide_page_banner', '==', 'false'],
        ],
        [
            'id'      => 'page_banner_bg',
            'type'    => 'upload',
            'title'   => 'Background Image',
            'default' => $default_banner_bg,
            'preview' => false,
            'dependency' => ['hide_page_banner', '==', 'false'],
        ],
    ],
]);