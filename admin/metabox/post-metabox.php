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

    // Fetch available base sections (variant slugs like about-two are excluded)
    $available_sections = mthan_get_available_base_sections();

    // Create a section
    CSF::createSection($prefix, array(
        'title' => 'Sections',
        'icon' => 'fas fa-layer-group',
        'fields' => array(
                array(
                'type' => 'subheading',
                'content' => 'Before Content',
            ),
                array(
                'id' => 'post_before_content',
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
                'id' => 'post_after_content',
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
        )
    ));

    CSF::createSection($prefix, array(
        'title' => 'Settings',
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