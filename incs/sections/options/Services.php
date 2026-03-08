<?php defined('ABSPATH') || exit;

/**
 * Services Section Options
 */
function mthan_section_Services_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';

    return array(
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
    );
}
