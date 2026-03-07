<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$available_sections = mthan_get_available_base_sections();
// Layouts Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id' => 'layouts_settings',
    'title' => 'Layouts',
    'icon' => 'fas fa-columns',
    'fields' => [
        [
            'id' => 'layouts_tabs',
            'type' => 'tabbed',
            'tabs' => [
                [
                    'title' => 'Page Layout',
                    'icon' => 'fas fa-home',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Global Page Banner',
                        ],
                        [
                            'id'      => 'global_page_banner_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Global Banner',
                            'default' => true,
                        ],
                        [
                            'id'      => 'global_page_banner_bg',
                            'type'    => 'upload',
                            'title'   => 'Global Banner Background',
                            'default' => get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg',
                            'desc'    => 'Default image used across all pages.',
                            'dependency' => ['global_page_banner_enable', '==', 'true'],
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Before Content',
                        ],
                        [
                            'id' => 'page_layout_before_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ],
                        [
                            'type' => 'subheading',
                            'content' => 'After Content',
                        ],
                        [
                            'id' => 'page_layout_after_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ],
                    ],
                ],
                [
                    'title' => 'Blog Layout',
                    'icon' => 'fas fa-blog',
                    'fields' => [
                        [
                            'id'      => 'blog_archive_template',
                            'type'    => 'select',
                            'title'   => 'Archive Template',
                            'options' => [
                                'grid-2' => 'Grid 2 Columns',
                                'grid-3' => 'Grid 3 Columns',
                                'list'   => 'List View',
                            ],
                            'default' => 'grid-2',
                        ],
                        [
                            'id'      => 'disable_page_layout_blog',
                            'type'    => 'switcher',
                            'title'   => 'Disable Global Page Layout Elements',
                            'default' => false,
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Before Content',
                        ],
                        [
                            'id' => 'blog_layout_before_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => false,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ],
                        [
                            'type' => 'subheading',
                            'content' => 'After Content',
                        ],
                        [
                            'id' => 'blog_layout_after_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => false,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ],
                    ],
                ],
                [
                    'title' => 'Service Layout',
                    'icon' => 'fas fa-tools',
                    'fields' => [
                        [
                            'id'      => 'disable_page_layout_service',
                            'type'    => 'switcher',
                            'title'   => 'Disable Global Page Layout Elements',
                            'default' => false,
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Before Content',
                        ],
                        [
                            'id'                     => 'service_layout_before_content',
                            'type'                   => 'group',
                            'button_title'           => 'Add New Section',
                            'accordion_title_auto'   => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields'                 => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'After Content',
                        ],
                        [
                            'id'                     => 'service_layout_after_content',
                            'type'                   => 'group',
                            'button_title'           => 'Add New Section',
                            'accordion_title_auto'   => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields'                 => array_merge(
                                [
                                    [
                                        'id' => 'name', 
                                        'type' => 'text', 
                                        'title' => 'Name', 
                                        'attributes' => [
                                            'data-section-name' => '1', 
                                            'placeholder' => 'Section name'
                                        ]
                                    ],
                                    [
                                        'id' => 'section_template', 
                                        'type' => 'select', 
                                        'title' => 'Select Template', 
                                        'options' => empty($available_sections) ? ['' => 'No sections enabled'] : $available_sections
                                    ],
                                ],
                                mthan_get_section_instance_fields()
                            )
                        ]
                    ]
                ],
                [
                    'title' => 'Settings',
                    'icon'  => 'fas fa-cogs',
                    'fields' => [
                        [
                            'id'      => 'preloader',
                            'type'    => 'switcher',
                            'title'   => 'Enable Preloader',
                            'default' => true,
                        ]
                    ]
                ]
            ]
        ]
    ]
]);