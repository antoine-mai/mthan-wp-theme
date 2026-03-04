<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'mthan_theme_options';

    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => 'Theme Options',
        'menu_slug' => 'mthan-theme-options',
        'menu_type' => 'submenu',
        'menu_parent' => 'themes.php', // Adds it under Appearance
        'menu_position' => 999, // Position at the end
        'framework_title' => 'Theme Options',
        'theme' => 'light', // Preferred theme
    ));

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'General Settings',
        'icon' => 'fas fa-cogs',
        'fields' => array(
                array(
                'id' => 'example_text',
                'type' => 'text',
                'title' => 'Example Text',
                'desc' => 'This is an example text field.',
            ),
        )
    ));

}