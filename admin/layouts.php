<?php defined('ABSPATH') or die('Cheatin\' uh?');

// Get all sections for the sorter options
$available_sections = array();
$sections_path = get_template_directory() . '/sections/';
if (is_dir($sections_path)) {
    $files = glob($sections_path . '*.php');
    if ($files) {
        foreach ($files as $file) {
            $filename = basename($file, '.php');
            $section_name = ucwords(str_replace('-', ' ', $filename));
            $available_sections['section_' . str_replace('-', '_', $filename)] = $section_name . ' Section';
        }
    }
}

// Fallback if no sections
if (empty($available_sections)) {
    $available_sections = array(
        'section_dummy_1' => 'Dummy Section 1',
        'section_dummy_2' => 'Dummy Section 2',
    );
}

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
                            'fields' => array(
                                    array(
                                    'id' => 'section_template',
                                    'type' => 'select',
                                    'title' => 'Select Template',
                                    'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections,
                                ),
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
                            'fields' => array(
                                    array(
                                    'id' => 'section_template',
                                    'type' => 'select',
                                    'title' => 'Select Template',
                                    'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections,
                                ),
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
                            'fields' => array(
                                    array(
                                    'id' => 'section_template',
                                    'type' => 'select',
                                    'title' => 'Select Template',
                                    'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections,
                                ),
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
                            'fields' => array(
                                    array(
                                    'id' => 'section_template',
                                    'type' => 'select',
                                    'title' => 'Select Template',
                                    'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections,
                                ),
                            )
                        ),
                    ),
                ),
            ),
        ),
    )
)); // EOF