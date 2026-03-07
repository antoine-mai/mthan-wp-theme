<?php defined('ABSPATH') || exit;

/**
 * Blog Section Options
 */
function mthan_section_Blog_options() {
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
            'default' => 'News & Updates',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Latest From Blog',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'View More Button Text',
            'default' => 'View More Blog',
        ),
        array(
            'id'    => 'btn_link',
            'type'  => 'link',
            'title' => 'View More Button Link',
        ),
        array(
            'id'    => 'count',
            'type'  => 'number',
            'title' => 'Number of Posts',
            'default' => 3,
        ),
        array(
            'id'    => 'category',
            'type'  => 'select',
            'title' => 'Category',
            'options' => 'categories',
            'placeholder' => 'Select a category',
        ),
    );
}
