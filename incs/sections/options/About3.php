<?php defined('ABSPATH') || exit;

/**
 * About 3 Section Options
 */
function mthan_section_About3_options() {
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
            'default' => 'About Us',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Professional Gardener',
        ),
        array(
            'id'    => 'bigger_text',
            'type'  => 'textarea',
            'title' => 'Bigger Text (Highlight)',
            'default' => 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.',
        ),
        // Quote Box
        array(
            'id'    => 'vid_thumb',
            'type'  => 'upload',
            'title' => 'Video Thumbnail',
            'default' => $img_path . 'vid-thumb-2.jpg',
            'help'    => 'Recommended size: 270x300px',
        ),
        array(
            'id'    => 'vid_link',
            'type'  => 'text',
            'title' => 'Video Link',
            'default' => 'https://www.youtube.com/watch?v=CB_rXABU8DI',
        ),
        array(
            'id'    => 'quote_text',
            'type'  => 'textarea',
            'title' => 'Quote Text',
            'default' => '“Our Company has established a reputation as the leader in landscape design.”',
        ),
        array(
            'id'    => 'quote_author_name',
            'type'  => 'text',
            'title' => 'Author Name',
            'default' => 'Chris Stanley',
        ),
        array(
            'id'    => 'quote_author_designation',
            'type'  => 'text',
            'title' => 'Author Designation',
            'default' => 'Founder of Pruners',
        ),
        array(
            'id'    => 'lower_text',
            'type'  => 'textarea',
            'title' => 'Lower Text',
            'default' => 'Our power of choice is untrammelled & when nothing prevents our being able to do what we like best, every pleasure.',
        ),
        // Lower Box
        array(
            'id'    => 'signature',
            'type'  => 'upload',
            'title' => 'Signature Image',
            'default' => $img_path . 'signature-1.png',
        ),
        array(
            'id'    => 'iso_icon',
            'type'  => 'upload',
            'title' => 'ISO Icon',
            'default' => $icon_path . 'iso-icon.png',
        ),
        array(
            'id'    => 'iso_text',
            'type'  => 'text',
            'title' => 'ISO Text',
            'default' => 'Certified Company',
        ),
        array(
            'id'    => 'iso_number',
            'type'  => 'text',
            'title' => 'ISO Number',
            'default' => 'ISO 9001:2015',
        ),
        // Image Column
        array(
            'id'    => 'main_image',
            'type'  => 'upload',
            'title' => 'Main Image',
            'default' => $img_path . 'featured-image-12.jpg',
            'help'    => 'Recommended size: 570x630px',
        ),
        array(
            'id'    => 'experience_number',
            'type'  => 'text',
            'title' => 'Experience Number',
            'default' => '16',
        ),
        array(
            'id'    => 'experience_text',
            'type'  => 'textarea',
            'title' => 'Experience Text',
            'default' => 'Years <br>of Experience',
        ),
    );
}
