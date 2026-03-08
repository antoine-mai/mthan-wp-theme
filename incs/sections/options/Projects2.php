<?php defined('ABSPATH') || exit;

/**
 * Projects 2 Section Options (Fixed 7 Items for Masonry)
 */
function mthan_section_Projects2_options() {
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
        mthan_page_select_field('btn_link', 'Button Link', [
            'default' => [
                'url' => '#'
            ]
        ]),
        // Explicit 7 Items for Masonry Layout
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Project Items (Exactly 7 recommended)',
            'max'   => 7,
            'default' => array(
                array( 'image' => $gal_path . '1.jpg', 'title' => 'Communual Garden', 'category' => 'Garden Care' ),
                array( 'image' => $gal_path . '2.jpg', 'title' => 'Outdoor Living', 'category' => 'Landscape' ),
                array( 'image' => $gal_path . '3.jpg', 'title' => 'Outdoor Living', 'category' => 'Garden Care' ),
                array( 'image' => $gal_path . '4.jpg', 'title' => 'Outdoor Living', 'category' => 'Landscape' ),
                array( 'image' => $gal_path . '6.jpg', 'title' => 'Outdoor Living', 'category' => 'Garden Care' ),
                array( 'image' => $gal_path . '7.jpg', 'title' => 'Outdoor Living', 'category' => 'Garden Care' ),
                array( 'image' => $gal_path . '5.jpg', 'title' => 'Outdoor Living', 'category' => 'Garden Care' ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Project Title',
                ),
                array(
                    'id'    => 'category',
                    'type'  => 'text',
                    'title' => 'Category Label',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                ),
                mthan_page_select_field('link', 'Project Link'),
            ),
        ),
    );
}
