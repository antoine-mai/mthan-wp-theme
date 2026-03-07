<?php defined('ABSPATH') || exit;

/**
 * Banners Section Options
 */
function mthan_section_Banners_options() {
    $img_path = get_template_directory_uri() . '/assets/images/main-slider/';

    return array(
        array(
            'id'    => 'slides',
            'type'  => 'group',
            'title' => 'Slides',
            'default' => array(
                array(
                    'subtitle' => 'Welcome to Pruners',
                    'title'    => 'Brilliant Hands <br>For Your Landscaping',
                    'text'     => 'How to pursue pleasure rationally encounter consequences that are extremely painful nor again is there anyone.',
                    'image'    => $img_path . '1.jpg',
                    'btn1_text' => 'Read More',
                    'btn1_link' => '',
                    'btn2_text' => 'Contact Us',
                    'btn2_link' => '',
                ),
                array(
                    'subtitle' => 'Form of Impression',
                    'title'    => 'Complete Solution <br>for Your Landscaping',
                    'text'     => 'When our power of choice is untrammelled and when nothing our being able to do what we like best.',
                    'image'    => $img_path . '2.jpg',
                    'btn1_text' => 'Read More',
                    'btn1_link' => '',
                    'btn2_text' => 'Services',
                    'btn2_link' => '',
                ),
                array(
                    'subtitle' => '100% Gurantee Works',
                    'title'    => 'We Give Guarantee <br>for Healthy Landscapes',
                    'text'     => 'How to pursue pleasure rationally encounter consequences that are extremely painful nor again is there anyone.',
                    'image'    => $img_path . '3.jpg',
                    'btn1_text' => 'Read More',
                    'btn1_link' => '',
                    'btn2_text' => 'Testimonials',
                    'btn2_link' => '',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => 'Subtitle',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Background Image',
                ),
                array(
                    'id'    => 'btn1_text',
                    'type'  => 'text',
                    'title' => 'Button 1 Text',
                ),
                mthan_page_select_field('btn1_link', 'Button 1 Link'),
                array(
                    'id'    => 'btn2_text',
                    'type'  => 'text',
                    'title' => 'Button 2 Text',
                ),
                mthan_page_select_field('btn2_link', 'Button 2 Link'),
            ),
        ),
    );
}
