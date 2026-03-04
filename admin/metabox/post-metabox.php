<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $prefix = 'mthan_post_options';

    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => 'Post Options',
        'post_type' => 'post',
        'context' => 'normal',
    ));

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

}