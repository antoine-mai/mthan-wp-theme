<?php defined('ABSPATH') || exit;

/**
 * Testimonials 1 Section Options
 */
function mthan_section_Testimonials1_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'title_icon',
            'type'  => 'upload',
            'title' => 'Title Icon',
            'default' => $icon_path . 'leaf-four.png',
        ),
        array(
            'id'    => 'subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Testimonials',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Guarantee Success',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Testimonials',
            'default' => array(
                array(
                    'name'   => 'Louie Daxon',
                    'region' => 'New Orleans, United States',
                    'rating' => '5',
                    'text'   => 'Thank you for our beautiful new front! Your crew was outstanding, neat, tidy, & very professional!.',
                    'image'  => $img_path . 'testi-thumb-1.jpg',
                ),
                array(
                    'name'   => 'Luke Mattew',
                    'region' => 'San Antonio, United States',
                    'rating' => '4',
                    'text'   => 'We are very pleased with the way of business is done, We look forward to the completion of our project.',
                    'image'  => $img_path . 'testi-thumb-2.jpg',
                ),
                array(
                    'name'   => 'Rory Blake',
                    'region' => 'Nottingham, United Kingdom',
                    'rating' => '4.5',
                    'text'   => 'Pruners Landscaping blends unique garden, water and patio layouts while working within a budget.',
                    'image'  => $img_path . 'testi-thumb-3.jpg',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'    => 'region',
                    'type'  => 'text',
                    'title' => 'Region/Location',
                ),
                array(
                    'id'    => 'rating',
                    'type'  => 'select',
                    'title' => 'Rating',
                    'options' => array(
                        '1'   => '1 Star',
                        '1.5' => '1.5 Stars',
                        '2'   => '2 Stars',
                        '2.5' => '2.5 Stars',
                        '3'   => '3 Stars',
                        '3.5' => '3.5 Stars',
                        '4'   => '4 Stars',
                        '4.5' => '4.5 Stars',
                        '5'   => '5 Stars',
                    ),
                    'default' => '5',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'User Image',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Feedback Text',
                ),
            ),
        ),
    );
}
