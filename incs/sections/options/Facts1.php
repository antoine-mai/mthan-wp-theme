<?php defined('ABSPATH') || exit;

/**
 * Facts 1 Section Options
 */
function mthan_section_Facts1_options() {
    $bg_path = get_template_directory_uri() . '/assets/images/background/';

    return array(
        array(
            'id'    => 'bg_image',
            'type'  => 'upload',
            'title' => 'Background Image',
            'default' => $bg_path . 'image-6.jpg',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Fact Blocks',
            'default' => array(
                array(
                    'icon'  => 'flaticon-park',
                    'count' => '2.5',
                    'suffix' => 'k',
                    'speed' => '1000',
                    'title' => 'Completed Projects',
                ),
                array(
                    'icon'  => 'flaticon-gardener',
                    'count' => '108',
                    'suffix' => '',
                    'speed' => '3000',
                    'title' => 'Expert Landscapers',
                ),
                array(
                    'icon'  => 'flaticon-medal',
                    'count' => '23',
                    'suffix' => '+',
                    'speed' => '2000',
                    'title' => 'Awards and Honors',
                ),
                array(
                    'icon'  => 'flaticon-customer-review-1',
                    'count' => '99',
                    'suffix' => '%',
                    'speed' => '3000',
                    'title' => 'Satisfied Customers',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'upload',
                    'title' => 'Icon (Image or flaticon class)',
                ),
                array(
                    'id'    => 'count',
                    'type'  => 'text',
                    'title' => 'Count Number',
                ),
                array(
                    'id'    => 'suffix',
                    'type'  => 'text',
                    'title' => 'Suffix (e.g. k, %, +)',
                ),
                array(
                    'id'    => 'speed',
                    'type'  => 'text',
                    'title' => 'Animation Speed (ms)',
                    'default' => '2000',
                ),
            ),
        ),
    );
}
