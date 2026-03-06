<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$available_sections = mthan_get_available_base_sections();
// Layouts Settings
global $mthan_options_id;
CSF::createSection($mthan_options_id, array(
    'id' => 'layouts_settings',
    'title' => 'Layout',
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
                            'type'    => 'subheading',
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
                            'id'      => 'blog_archive_template',
                            'type'    => 'select',
                            'title'   => 'Archive Template',
                            'options' => array(
                                'grid-2' => 'Grid 2 Columns',
                                'grid-3' => 'Grid 3 Columns',
                                'list'   => 'List View',
                            ),
                            'default' => 'grid-2',
                        ),
                        array(
                            'type'    => 'subheading',
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