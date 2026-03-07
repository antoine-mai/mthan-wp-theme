<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the about-2 section instance.
 * @return array
 */
function mthan_section_about_2_options() {
    return [
        mthan_subtitle_field('About Us'),
        [
            'id'      => 'subtitle_icon',
            'type'    => 'media',
            'library' => 'image',
            'preview' => false,
            'title'   => 'Subtitle Icon',
            'default' => ['url' => get_template_directory_uri() . '/assets/images/icons/leaf-two.png']
        ],
        mthan_title_field('Professional Gardener'),
        [
            'id'      => 'about_content',
            'type'    => 'wp_editor',
            'title'   => 'Content',
            'default' => '<p class="bigger-text">Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.</p><p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>',
        ],
        [
            'id'         => 'insured_title',
            'type'       => 'text',
            'title'      => 'Insured Title',
            'default'    => 'Fully Insured',
        ],
        [
            'id'         => 'insured_text',
            'type'       => 'textarea',
            'title'      => 'Insured Text',
            'default'    => 'Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.',
        ],
        [
            'id'         => 'iso_number',
            'type'       => 'text',
            'title'      => 'ISO Number',
            'default'    => 'ISO 9001:2015',
        ],
        [
            'id'    => 'image',
            'type'  => 'media',
            'title' => 'Main Image',
        ],
        [
            'id'    => 'video_url',
            'type'  => 'text',
            'title' => 'Video URL',
        ],
        mthan_btn_text_field('Read More'),
        mthan_btn_link_field('#'),
    ];
}