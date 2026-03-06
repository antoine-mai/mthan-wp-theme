<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Default Pages Settings
**/
global $mthan_options_id;

$available_sections = mthan_get_available_base_sections();

CSF::createSection($mthan_options_id, [
    'id'     => 'home_page_settings',
    'title'  => 'Home Page',
    'icon'   => 'fas fa-home',
    'fields' => [
        [
            'id'                     => 'homepage_sections',
            'type'                   => 'group',
            'title'                  => '',
            'button_title'           => 'Add New Section',
            'accordion_title_auto'   => true,
            'accordion_title_prefix' => 'Section: ',
            'accordion_title_number' => true,
            'fields'                 => array_merge(
                [
                    ['id' => 'name', 'type' => 'text', 'title' => 'Name', 'attributes' => ['data-section-name' => '1', 'placeholder' => 'Section name']],
                    ['id' => 'section_template', 'type' => 'select', 'title' => 'Select Template', 'options' => empty($available_sections) ? array('' => 'No sections enabled') : $available_sections],
                ],
                mthan_get_section_instance_fields()
            )
        ],
    ]
]);
