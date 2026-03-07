<?php defined('ABSPATH') || exit;

/**
 * About Section Options
 */
function mthan_section_About1_options() {
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
        // Quote Box
        array(
            'id'    => 'quote_thumb',
            'type'  => 'upload',
            'title' => 'Video/Quote Thumbnail',
            'default' => $img_path . 'quote-thumb.jpg',
        ),
        array(
            'id'    => 'video_link',
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
        // Lower Box
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'Read More',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
        array(
            'id'    => 'signature',
            'type'  => 'upload',
            'title' => 'Signature Image',
            'default' => $img_path . 'signature-1.png',
        ),
        // Image Column
        array(
            'id'    => 'main_image',
            'type'  => 'upload',
            'title' => 'Main Image',
            'default' => $img_path . 'featured-image-1.jpg',
        ),
        array(
            'id'    => 'anim_image',
            'type'  => 'upload',
            'title' => 'Animated Image (Background)',
            'default' => $img_path . 'anim-image-1.png',
        ),
        // Caption
        array(
            'id'    => 'caption_icon',
            'type'  => 'text',
            'title' => 'Caption Icon Class',
            'default' => 'flaticon-leaves',
        ),
        array(
            'id'    => 'caption_big_text',
            'type'  => 'text',
            'title' => 'Caption Big Text (Number)',
            'default' => '2k',
        ),
        array(
            'id'    => 'caption_text',
            'type'  => 'textarea',
            'title' => 'Caption Text',
            'default' => 'Projects were completed',
        ),
    );
}
