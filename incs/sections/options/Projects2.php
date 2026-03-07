<?php defined('ABSPATH') || exit;

/**
 * Projects 2 Section Options (Fixed 7 Items for Masonry)
 */
function mthan_section_Projects2_options() {
    $gal_path = get_template_directory_uri() . '/assets/images/gallery/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    $options = array(
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
    );

    // Define 7 Fixed Items with their default values
    $defaults = array(
        1 => array('title' => 'Communual Garden', 'category' => 'Garden Care', 'image' => $gal_path . '1.jpg'),
        2 => array('title' => 'Outdoor Living', 'category' => 'Landscape', 'image' => $gal_path . '2.jpg'),
        3 => array('title' => 'Outdoor Living', 'category' => 'Garden Care', 'image' => $gal_path . '3.jpg'),
        4 => array('title' => 'Outdoor Living', 'category' => 'Landscape', 'image' => $gal_path . '4.jpg'),
        5 => array('title' => 'Outdoor Living', 'category' => 'Garden Care', 'image' => $gal_path . '6.jpg'),
        6 => array('title' => 'Outdoor Living', 'category' => 'Garden Care', 'image' => $gal_path . '7.jpg'),
        7 => array('title' => 'Outdoor Living', 'category' => 'Garden Care', 'image' => $gal_path . '5.jpg'),
    );

    for ($i = 1; $i <= 7; $i++) {
        $options[] = array(
            'id'    => 'item_' . $i,
            'type'  => 'fieldset',
            'title' => 'Project ' . $i . ($i == 1 || $i == 6 ? ' (Large)' : ' (Small)'),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                    'default' => $defaults[$i]['title'],
                ),
                array(
                    'id'    => 'category',
                    'type'  => 'text',
                    'title' => 'Category',
                    'default' => $defaults[$i]['category'],
                ),
                mthan_page_select_field('category_link', 'Category Link'),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                    'default' => $defaults[$i]['image'],
                ),
                mthan_page_select_field('link', 'Project Link'),
            ),
        );
    }

    return $options;
}
