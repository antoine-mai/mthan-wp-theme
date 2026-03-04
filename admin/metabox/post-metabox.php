<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $prefix = 'mthan_post_options';

    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Post Options',
        'post_type' => 'post',
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
                'id' => 'post_layout',
                'type' => 'select',
                'title' => 'Post Layout',
                'options' => array(
                    'default' => 'Default',
                    'full-width' => 'Full Width',
                    'left-sidebar' => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                ),
                'default' => 'default',
            ),

                array(
                'id' => 'show_featured_image',
                'type' => 'switcher',
                'title' => 'Show Featured Image on Single Post',
                'default' => true,
            ),

        )
    ));

    CSF::createSection($prefix, array(
        'title' => 'Sections',
        'icon' => 'fas fa-layer-group',
        'fields' => array(
                array(
                'id' => 'post_before_content',
                'type' => 'sorter',
                'title' => 'Before Content',
                'desc' => 'Order the sections to display before the post content.',
                'default' => array(
                    'enabled' => array(),
                    'disabled' => $available_sections,
                ),
            ),
                array(
                'id' => 'post_after_content',
                'type' => 'sorter',
                'title' => 'After Content',
                'desc' => 'Order the sections to display after the post content.',
                'default' => array(
                    'enabled' => array(),
                    'disabled' => $available_sections,
                ),
            ),
        )
    ));

    // Header Meta Options
    CSF::createSection($prefix, array(
        'title' => 'Header Settings',
        'icon' => 'fas fa-arrow-up',
        'fields' => array(
                array(
                'id' => 'custom_header_layout',
                'type' => 'select',
                'title' => 'Header Layout',
                'options' => array(
                    '' => 'Default (From Theme Options)',
                    'style-1' => 'Style 1',
                    'style-2' => 'Style 2',
                ),
            ),
                array(
                'id' => 'custom_header_topbar',
                'type' => 'select',
                'title' => 'Topbar',
                'options' => array(
                    '' => 'Default (From Theme Options)',
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
            ),
        )
    ));

    // Footer Meta Options
    CSF::createSection($prefix, array(
        'title' => 'Footer Settings',
        'icon' => 'fas fa-arrow-down',
        'fields' => array(
                array(
                'id' => 'custom_footer_layout',
                'type' => 'select',
                'title' => 'Footer Layout',
                'options' => array(
                    '' => 'Default (From Theme Options)',
                    'style-1' => 'Style 1',
                    'style-2' => 'Style 2',
                ),
            ),
        )
    ));

}