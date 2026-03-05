<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Get base sections only (variant slugs like about-two/about-three are excluded)
$available_sections = mthan_get_available_base_sections();

// Layouts Settings
CSF::createSection($prefix, array(
    'id' => 'layouts_settings',
    'title' => 'Layout Settings',
    'icon' => 'fas fa-columns',
    'fields' => array(

            array(
            'id' => 'layouts_tabs',
            'type' => 'tabbed',
            'tabs' => array(
                    array(
                    'title' => 'Main Layout',
                    'icon' => 'fas fa-home',
                    'fields' => array(
                            array(
                            'type' => 'subheading',
                            'content' => 'Before Content',
                        ),
                            array(
                            'id' => 'main_layout_before_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                            ),
                            mthan_get_section_instance_fields()
                        )
                        ),
                            array(
                            'type' => 'subheading',
                            'content' => 'After Content',
                        ),
                            array(
                            'id' => 'main_layout_after_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                            ),
                            mthan_get_section_instance_fields()
                        )
                        ),
                    ),
                ),
                    array(
                    'title' => 'Blog Layout',
                    'icon' => 'fas fa-blog',
                    'fields' => array(
                            array(
                            'type' => 'subheading',
                            'content' => 'Before Content',
                        ),
                            array(
                            'id' => 'blog_layout_before_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => false,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                            ),
                            mthan_get_section_instance_fields()
                        )
                        ),
                            array(
                            'type' => 'subheading',
                            'content' => 'After Content',
                        ),
                            array(
                            'id' => 'blog_layout_after_content',
                            'type' => 'group',
                            'button_title' => 'Add New Section',
                            'accordion_title_auto' => false,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields' => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                            ),
                            mthan_get_section_instance_fields()
                        )
                        ),
                    ),
                ),
                    array(
                    'title' => 'Service Layout',
                    'icon' => 'fas fa-tools',
                    'fields' => array(
                        array(
                            'id'      => 'service_layout_sidebar',
                            'type'    => 'image_select',
                            'title'   => 'Service Sidebar',
                            'options' => array(
                                'full-width'    => get_template_directory_uri() . '/incs/codestar/assets/images/layout/no-sidebar.png',
                                'left-sidebar'  => get_template_directory_uri() . '/incs/codestar/assets/images/layout/left-sidebar.png',
                                'right-sidebar' => get_template_directory_uri() . '/incs/codestar/assets/images/layout/right-sidebar.png',
                            ),
                            'default' => 'left-sidebar',
                        ),
                        array(
                            'type'    => 'subheading',
                            'content' => 'Before Content',
                        ),
                        array(
                            'id'                     => 'service_layout_before_content',
                            'type'                   => 'group',
                            'button_title'           => 'Add New Section',
                            'accordion_title_auto'   => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields'                 => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                                ),
                                mthan_get_section_instance_fields()
                            )
                        ),
                        array(
                            'type'    => 'subheading',
                            'content' => 'After Content',
                        ),
                        array(
                            'id'                     => 'service_layout_after_content',
                            'type'                   => 'group',
                            'button_title'           => 'Add New Section',
                            'accordion_title_auto'   => true,
                            'accordion_title_prefix' => 'Section: ',
                            'accordion_title_number' => true,
                            'fields'                 => array_merge(
                                array(
                                    array('id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name')),
                                    array('id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections),
                                ),
                                mthan_get_section_instance_fields()
                            )
                        ),
                    ),
                ),
        ),
    ),
))); // EOF