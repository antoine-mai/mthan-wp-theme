<?php defined('ABSPATH') || exit;

/**
 * Sponsors Section Options
 */
function mthan_section_Sponsors_options() {
    $img_path = get_template_directory_uri() . '/assets/clients/';

    return array(
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Sponsor Items',
            'default' => array(
                array( 'image' => $img_path . '1.png' ),
                array( 'image' => $img_path . '2.png' ),
                array( 'image' => $img_path . '3.png' ),
                array( 'image' => $img_path . '4.png' ),
            ),
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Sponsor Logo',
                ),
                mthan_page_select_field('link', 'Sponsor Link'),
            ),
        ),
    );
}
