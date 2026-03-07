<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the about-1 section instance.
 * @return array
 */
function mthan_section_about_1_options() {
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
            'id'         => 'quote_text',
            'type'       => 'textarea',
            'title'      => 'Quote Text',
            'default'    => 'Our Company has established a reputation as the leader in landscape design.',
        ],
        [
            'id'         => 'quote_author',
            'type'       => 'text',
            'title'      => 'Quote Author',
            'default'    => 'Chris Stanley,',
        ],
        [
            'id'         => 'quote_designation',
            'type'       => 'text',
            'title'      => 'Quote Designation',
            'default'    => 'Founder of Pruners',
        ],
        [
            'id'         => 'signature_image',
            'type'       => 'media',
            'title'      => 'Signature Image',
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