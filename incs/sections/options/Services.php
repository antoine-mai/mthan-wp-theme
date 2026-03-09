<?php defined('ABSPATH') || exit;

/**
 * Services Section Options
 */
function mthan_section_Services_options() {
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
            'default' => 'Our Services',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Professional Services',
        ),
        array(
            'id'      => 'count',
            'type'    => 'number',
            'title'   => 'Service Count',
            'default' => -1,
        ),
        array(
            'id'      => 'read_more_text',
            'type'    => 'text',
            'title'   => 'Read More Text',
            'default' => 'Read More',
        ),
        array(
            'id'      => 'columns',
            'type'    => 'select',
            'title'   => 'Columns',
            'options' => array(
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default' => '3',
        ),
    );
}
