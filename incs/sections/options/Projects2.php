<?php defined('ABSPATH') || exit;

/**
 * Projects 2 Section Options (Fixed 7 Items for Masonry)
 */
function mthan_section_Projects2_options() {
    $gal_path = get_template_directory_uri() . '/assets/images/gallery/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    $fields = array(
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
    );

    // Explicit 7 Items Field sets
    $items_config = array(
        1 => array('size' => '570x630px', 'title' => 'Communual Garden', 'cat' => 'Garden Care', 'img' => '1.jpg'),
        2 => array('size' => '270x300px', 'title' => 'Outdoor Living',   'cat' => 'Landscape',   'img' => '2.jpg'),
        3 => array('size' => '270x300px', 'title' => 'Outdoor Living',   'cat' => 'Garden Care', 'img' => '3.jpg'),
        4 => array('size' => '270x300px', 'title' => 'Outdoor Living',   'cat' => 'Landscape',   'img' => '4.jpg'),
        5 => array('size' => '270x300px', 'title' => 'Outdoor Living',   'cat' => 'Garden Care', 'img' => '6.jpg'),
        6 => array('size' => '570x630px', 'title' => 'Outdoor Living',   'cat' => 'Garden Care', 'img' => '7.jpg'),
        7 => array('size' => '270x300px', 'title' => 'Outdoor Living',   'cat' => 'Garden Care', 'img' => '5.jpg'),
    );

    foreach ($items_config as $i => $conf) {
        $fields[] = array(
            'type'    => 'subheading',
            'content' => 'Project Item ' . $i . ' (Masonry Layout Position)',
        );
        $fields[] = array(
            'id'      => 'item_' . $i . '_title',
            'type'    => 'text',
            'title'   => 'Title',
            'default' => $conf['title'],
        );
        $fields[] = array(
            'id'      => 'item_' . $i . '_category',
            'type'    => 'text',
            'title'   => 'Category',
            'default' => $conf['cat'],
        );
        $fields[] = array(
            'id'      => 'item_' . $i . '_image',
            'type'    => 'upload',
            'title'   => 'Image',
            'help'    => 'Recommended size: ' . $conf['size'],
            'default' => $gal_path . $conf['img'],
        );
        $fields[] = mthan_page_select_field('item_' . $i . '_link', 'Link');
    }

    return $fields;
}
