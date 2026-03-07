<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the about-3 section instance.
 * @return array
 */
function mthan_section_about_3_options() {
    $slug = 'about-3';
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
            'id'         => $slug . '_quote_text',
            'type'       => 'textarea',
            'title'      => 'Quote Text',
            'default'    => 'Our Company has established a reputation as the leader in landscape design.',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_quote_author',
            'type'       => 'text',
            'title'      => 'Quote Author',
            'default'    => 'Chris Stanley,',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_quote_designation',
            'type'       => 'text',
            'title'      => 'Quote Designation',
            'default'    => 'Founder of Pruners',
            'dependency' => $dependency,
        ],
        [
            'id'         => $slug . '_signature_image',
            'type'       => 'upload',
            'preview'    => false,
            'title'      => 'Signature Image',
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
    ];
}