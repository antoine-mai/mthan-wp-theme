<?php defined('ABSPATH') || exit;

/**
 * Testimonials 2 Section Options
 */
function mthan_section_Testimonials2_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'title_icon',
            'type'  => 'upload',
            'title' => 'Title Icon',
            'default' => $icon_path . 'leaf-two.png',
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
            'default' => 'Customer Words',
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
                    'title'  => 'Thank you for an excellent job',
                    'text'   => 'Your crew did a great job following your drawing and left property immaculate. We were extremely happy with the finished job. The house looks 30 years younger.',
                ),
                array(
                    'name'   => 'Luke Mattew',
                    'region' => 'San Antonio, United States',
                    'rating' => '5',
                    'title'  => 'Professional Work',
                    'text'   => 'Highly recommended! The team was professional and the results surpassed my expectations. My garden has never looked better.',
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
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Feedback Title',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Feedback Text',
                ),
            ),
        ),
        array(
            'id'    => 'thumbs',
            'type'  => 'group',
            'title' => 'Right Column Images (Thumbs)',
            'default' => array(
                array('image' => $img_path . 'testi-thumb-4.jpg'),
                array('image' => $img_path . 'testi-thumb-5.jpg'),
                array('image' => $img_path . 'testi-thumb-6.jpg'),
                array('image' => $img_path . 'testi-thumb-7.jpg'),
            ),
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Thumb Image',
                ),
            ),
        ),
    );
}
