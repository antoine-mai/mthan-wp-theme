<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $prefix = 'mthan_page_options';

    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Page Options',
        'post_type' => 'page',
        'context' => 'normal',
    ));

    // Fetch available sections
    $available_sections = array();
    $theme_options = get_option('mthan_theme_options');
    $sections_path = get_template_directory() . '/sections/';

    if (is_dir($sections_path)) {
        $files = glob($sections_path . '*.php');
        if ($files) {
            foreach ($files as $file) {
                $filename = basename($file, '.php');
                $option_id = 'enable_section_' . str_replace('-', '_', $filename);

                // Defaults to true
                $is_enabled = isset($theme_options[$option_id]) ? $theme_options[$option_id] : true;

                if ($is_enabled) {
                    $available_sections[$filename] = ucwords(str_replace('-', ' ', $filename));
                }
            }
        }
    }

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'General Settings',
        'icon' => 'fas fa-cogs',
        'fields' => array(

                array(
                'id' => 'page_layout',
                'type' => 'select',
                'title' => 'Page Layout',
                'options' => array(
                    'default' => 'Default',
                    'full-width' => 'Full Width',
                    'left-sidebar' => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                ),
                'default' => 'default',
            ),

                array(
                'id' => 'show_page_title',
                'type' => 'switcher',
                'title' => 'Show Page Title',
                'default' => true,
            ),

        )
    ));

    CSF::createSection($prefix, array(
        'title' => 'Sections',
        'icon' => 'fas fa-layer-group',
        'fields' => array(
                array(
                'type' => 'subheading',
                'content' => 'Before Content',
            ),
                array(
                'id' => 'page_before_content',
                'type' => 'group',
                'button_title' => 'Add New Section',
                'accordion_title_auto' => true,
                'accordion_title_prefix' => 'Section: ',
                'accordion_title_number' => true,
                'fields' => array(
                        array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => 'Name',
                        'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name'),
                    ),
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
                'id' => 'page_after_content',
                'type' => 'group',
                'button_title' => 'Add New Section',
                'accordion_title_auto' => true,
                'accordion_title_prefix' => 'Section: ',
                'accordion_title_number' => true,
                'fields' => array(
                        array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => 'Name',
                        'attributes' => array('data-section-name' => '1', 'placeholder' => 'Section name'),
                    ),
                        array(
                        'id' => 'section_template',
                        'type' => 'select',
                        'title' => 'Select Template',
                        'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections,
                    ),
                )
            ),
        )
    ));

}