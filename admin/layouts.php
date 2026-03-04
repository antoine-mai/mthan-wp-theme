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
            'title' => 'Layout Sections',
            'tabs' => array(
                    array(
                    'title' => 'Main Layout',
                    'icon' => 'fas fa-home',
                    'fields' => array(
                            array(
                            'id' => 'main_layout_before_content',
                            'type' => 'sorter',
                            'title' => 'Before Content',
                            'desc' => 'Order the sections to display before the main content.',
                            'default' => array(
                                'enabled' => array(),
                                'disabled' => $available_sections,
                            ),
                        ),
                            array(
                            'id' => 'main_layout_after_content',
                            'type' => 'sorter',
                            'title' => 'After Content',
                            'desc' => 'Order the sections to display after the main content.',
                            'default' => array(
                                'enabled' => array(),
                                'disabled' => $available_sections,
                            ),
                        ),
                    ),
                ),
                    array(
                    'title' => 'Blog Layout',
                    'icon' => 'fas fa-blog',
                    'fields' => array(
                            array(
                            'id' => 'blog_layout_before_content',
                            'type' => 'sorter',
                            'title' => 'Before Content',
                            'desc' => 'Order the sections to display before the blog content.',
                            'default' => array(
                                'enabled' => array(),
                                'disabled' => $available_sections,
                            ),
                        ),
                            array(
                            'id' => 'blog_layout_after_content',
                            'type' => 'sorter',
                            'title' => 'After Content',
                            'desc' => 'Order the sections to display after the blog content.',
                            'default' => array(
                                'enabled' => array(),
                                'disabled' => $available_sections,
                            ),
                        ),
                    ),
                ),
            ),
        ),

            array(
            'type' => 'subheading',
            'content' => 'Global Header & Footer Style',
        ),

            array(
            'id' => 'header_layout',
            'type' => 'image_select',
            'title' => 'Header Layout',
            'desc' => 'Select the global header style for your site.',
            'options' => array(
                'style-1' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                'style-2' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
            ),
            'default' => 'style-1',
        ),

            array(
            'id' => 'footer_layout',
            'type' => 'image_select',
            'title' => 'Footer Layout',
            'desc' => 'Select the global footer style for your site.',
            'options' => array(
                'style-1' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                'style-2' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
            ),
            'default' => 'style-1',
        ),

    )
));