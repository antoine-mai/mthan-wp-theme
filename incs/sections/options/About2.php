<?php defined('ABSPATH') || exit;

/**
 * About 2 Section Options
 */
function mthan_section_About2_options() {
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
            'type'  => 'text',
            'title' => 'Bigger Text (Highlight)',
            'default' => 'Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.',
        ),
        // Insured Box
        array(
            'id'    => 'insured_icon',
            'type'  => 'text',
            'title' => 'Insured Icon Class',
            'default' => 'flaticon-insurance',
        ),
        array(
            'id'    => 'insured_title',
            'type'  => 'text',
            'title' => 'Insured Title',
            'default' => 'Fully Insured',
        ),
        array(
            'id'    => 'insured_text',
            'type'  => 'textarea',
            'title' => 'Insured Text',
            'default' => 'Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.',
        ),
        // Lower Box
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'Read More',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
        // ISO Box
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
            'default' => $img_path . 'anim-image-3.png',
            'help'    => 'Recommended size: 570x630px',
        ),
        array(
            'id'    => 'vid_thumb',
            'type'  => 'upload',
            'title' => 'Video Thumbnail',
            'default' => $img_path . 'vid-thumb-1.jpg',
            'help'    => 'Recommended size: 270x300px',
        ),
        array(
            'id'    => 'vid_link',
            'type'  => 'text',
            'title' => 'Video Link',
            'default' => 'https://www.youtube.com/watch?v=CB_rXABU8DI',
        ),
    );
}
