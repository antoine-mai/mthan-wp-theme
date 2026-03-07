<?php defined('ABSPATH') || exit;

/**
 * Projects 1 Section Options
 */
function mthan_section_Projects1_options() {
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
            'default' => 'Our Projects',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Latest From Projects',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Project Items',
            'default' => array(
                array(
                    'image' => $img_path . 'featured-image-2.jpg',
                    'category' => 'Garden Care',
                    'title' => 'Communual Garden',
                    'link'  => '',
                ),
                array(
                    'image' => $img_path . 'featured-image-3.jpg',
                    'category' => 'Lawn Care',
                    'title' => 'Sprinkler Irrigation',
                    'link'  => '',
                ),
                array(
                    'image' => $img_path . 'featured-image-4.jpg',
                    'category' => 'Pathways',
                    'title' => 'Rubbish Removal',
                    'link'  => '',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Project Image',
                ),
                array(
                    'id'    => 'category',
                    'type'  => 'text',
                    'title' => 'Category',
                ),
                mthan_page_select_field('category_link', 'Category Link'),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                mthan_page_select_field('link', 'Project Link'),
            ),
        ),
        array(
            'id'    => 'lower_text',
            'type'  => 'textarea',
            'title' => 'Lower Text',
            'default' => 'We give guarantee for healthy landscapes, You should never compromise with quality.',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'View All Projects',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
    );
}
