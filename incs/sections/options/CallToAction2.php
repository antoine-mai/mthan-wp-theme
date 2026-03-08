<?php defined('ABSPATH') || exit;

/**
 * Call To Action 2 Section Options
 */
function mthan_section_CallToAction2_options() {
    $bg_path = get_template_directory_uri() . '/assets/images/background/';

    return array(
        array(
            'id'    => 'bg_image',
            'type'  => 'upload',
            'title' => 'Background Image',
            'default' => $bg_path . 'call-to-bg.jpg',
        ),
        array(
            'id'    => 'title',
            'type'  => 'textarea',
            'title' => 'Title',
            'default' => 'In Need of Gardening & Landscaping <br>Maintenence Service?',
        ),
        array(
            'id'    => 'btn1_text',
            'type'  => 'text',
            'title' => 'Button 1 Text',
            'default' => 'Commercial',
        ),
        mthan_page_select_field('btn1_link', 'Button 1 Link'),
        array(
            'id'    => 'btn2_text',
            'type'  => 'text',
            'title' => 'Button 2 Text',
            'default' => 'Residential',
        ),
        mthan_page_select_field('btn2_link', 'Button 2 Link'),
    );
}
