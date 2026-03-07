<?php defined('ABSPATH') || exit;

/**
 * Gallery Grid 4 Section Options
 */
function mthan_section_GalleryGrid4_options() {
    $img_path = get_template_directory_uri() . '/assets/images/gallery/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'title_icon',
            'type'  => 'upload',
            'title' => 'Title Icon',
            'default' => $icon_path . 'leaf-four.png',
        ),
        array(
            'id'    => 'subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Projects',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Experience Our Work',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        // Filters
        array(
            'id'    => 'filters',
            'type'  => 'group',
            'title' => 'Gallery Filters',
            'info'  => 'Filter slugs should be preceded by a dot (e.g. .garden), except for "all".',
            'default' => array(
                array('label' => 'All', 'slug' => 'all', 'count' => '15'),
                array('label' => 'Garden', 'slug' => '.garden', 'count' => '5'),
                array('label' => 'Landscape', 'slug' => '.landscape', 'count' => '3'),
                array('label' => 'Lawn Care', 'slug' => '.lawncare', 'count' => '4'),
            ),
            'fields' => array(
                array(
                    'id'    => 'label',
                    'type'  => 'text',
                    'title' => 'Filter Label',
                ),
                array(
                    'id'    => 'slug',
                    'type'  => 'text',
                    'title' => 'Filter Slug (e.g. .garden)',
                ),
                array(
                    'id'    => 'count',
                    'type'  => 'text',
                    'title' => 'Count (Optional)',
                ),
            ),
        ),
        // Items
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Gallery Items',
            'default' => array(
                array(
                    'title'    => 'Sprinkler Irrigation',
                    'category' => 'Lawn Care',
                    'filters'  => 'all lawncare',
                    'image'    => $img_path . '25.jpg',
                ),
                array(
                    'title'    => 'Communual Garden',
                    'category' => 'Garden Care',
                    'filters'  => 'all garden',
                    'image'    => $img_path . '26.jpg',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Item Title',
                ),
                array(
                    'id'    => 'category',
                    'type'  => 'text',
                    'title' => 'Category Label',
                ),
                array(
                    'id'    => 'filters',
                    'type'  => 'text',
                    'title' => 'Filter Classes (space separated, no dots, e.g. garden landscape)',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                    'help'  => 'Recommended size: 270x300px',
                ),
                mthan_page_select_field('link', 'Item Link'),
            ),
        ),
        // Footer Switcher
        array(
            'id'    => 'footer_type',
            'type'  => 'radio',
            'title' => 'Footer Type',
            'inline' => true,
            'options' => array(
                'none'       => 'None',
                'pagination' => 'Pagination',
            ),
            'default' => 'pagination',
        ),
    );
}
