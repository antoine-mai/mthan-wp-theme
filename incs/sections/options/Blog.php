<?php defined('ABSPATH') || exit;

/**
 * Blog Section Options
 */
function mthan_section_Blog_options() {
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'show_header',
            'type'  => 'switcher',
            'title' => 'Show Header',
            'default' => true,
        ),
        array(
            'id'    => 'enable_pager',
            'type'  => 'switcher',
            'title' => 'Enable Pager',
            'default' => false,
        ),
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
        mthan_page_select_field('btn_link', 'View More Button Link'),
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
        array(
            'id'    => 'layout_style',
            'type'  => 'select',
            'title' => 'Layout Style',
            'options' => array(
                'grid' => 'Grid',
                'list' => 'List',
            ),
            'default' => 'grid',
        ),
        array(
            'id'    => 'columns',
            'type'  => 'select',
            'title' => 'Columns',
            'options' => array(
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'    => '3',
            'dependency' => array('layout_style', '==', 'grid'),
        ),
        array(
            'id'    => 'default_thumb',
            'type'  => 'upload',
            'title' => 'Default Thumbnail',
            'default' => get_template_directory_uri() . '/assets/images/resource/news-image-1.jpg',
            'desc' => 'This image will be used if a post doesn\'t have a featured image.',
        ),
    );
}
