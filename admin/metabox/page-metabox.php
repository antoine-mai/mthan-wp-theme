<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $prefix = 'mthan_page_options';

    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Page Options',
        'post_type' => 'page',
        'context' => 'normal',
    ));

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

}