<?php defined('ABSPATH') || exit;

/**
 * Projects 2 Section Options
 */
function mthan_section_Projects2_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $gal_path = get_template_directory_uri() . '/assets/images/gallery/';
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
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'View More',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Project Items',
            'default' => array(
                array(
                    'image' => $gal_path . '1.jpg',
                    'category' => 'Garden Care',
                    'title' => 'Communual Garden',
                    'width' => 'col-lg-6 col-md-12 col-sm-12',
                ),
                array(
                    'image' => $gal_path . '2.jpg',
                    'category' => 'Landscape',
                    'title' => 'Outdoor Living',
                    'width' => 'col-lg-3 col-md-6 col-sm-12',
                ),
                array(
                    'image' => $gal_path . '3.jpg',
                    'category' => 'Garden Care',
                    'title' => 'Outdoor Living',
                    'width' => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
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
                mthan_page_select_field('link', 'Project Link'),
                array(
                    'id'    => 'width',
                    'type'  => 'select',
                    'title' => 'Column Width',
                    'options' => array(
                        'col-lg-6 col-md-12 col-sm-12' => 'Large (50%)',
                        'col-lg-3 col-md-6 col-sm-12'  => 'Small (25%)',
                        'col-lg-4 col-md-6 col-sm-12'  => 'Medium (33%)',
                        'col-lg-12 col-md-12 col-sm-12' => 'Full (100%)',
                    ),
                    'default' => 'col-lg-3 col-md-6 col-sm-12',
                ),
            ),
        ),
    );
}
