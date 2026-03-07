<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the about-2 section instance.
 * @return array
 */
function mthan_section_about_2_options() {
    $slug = 'about-2';
    $dependency = ['section_template', '==', $slug];

    return [
        array_merge(mthan_subtitle_field('About Us'), ['id' => $slug . '_subtitle', 'dependency' => $dependency]),
        [
            'id'      => $slug . '_subtitle_icon',
            'type'    => 'upload',
            'preview' => false,
            'title'   => 'Subtitle Icon',
            'default' => get_template_directory_uri() . '/assets/images/icons/leaf-two.png',
            'dependency' => $dependency,
        ],
        array_merge(mthan_title_field('Professional Gardener'), ['id' => $slug . '_title', 'dependency' => $dependency]),
        [
            'id'      => $slug . '_about_content',
            'type'    => 'wp_editor',
            'title'   => 'Content',
            'default' => '<p class="bigger-text">Leader in landscaping, lawn care, and irrigation services in Los Angeles since 2004.</p><p>Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and we will give you a complete account of the system, and expound the actualy teachings.</p>',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_insured_title',
            'type'       => 'text',
            'title'      => 'Insured Title',
            'default'    => 'Fully Insured',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_insured_text',
            'type'       => 'textarea',
            'title'      => 'Insured Text',
            'default'    => 'Indignation and dislike men who are so that our garden therefore always holds in these matters too this stone has beguiled and occur demoralized.',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_iso_number',
            'type'       => 'text',
            'title'      => 'ISO Number',
            'default'    => 'ISO 9001:2015',
            'dependency' => $dependency,
        ],
        [
            'id'    => $slug . '_image',
            'type'  => 'upload',
            'preview' => false,
            'title' => 'Main Image',
            'dependency' => $dependency,
        ],
        [
            'id'    => $slug . '_video_url',
            'type'  => 'text',
            'title' => 'Video URL',
            'dependency' => $dependency,
        ],
        array_merge(mthan_btn_text_field('Read More', 'Button Text', $slug . '_btn_text'), ['dependency' => $dependency]),
        array_merge(mthan_btn_link_field('#', 'Button Link', $slug . '_btn_link'), ['dependency' => $dependency]),
    ];
}