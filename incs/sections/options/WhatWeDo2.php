<?php defined('ABSPATH') || exit;

/**
 * Services (What We Do 2) Section Options
 */
function mthan_section_WhatWeDo2_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
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
            'default' => 'What We Do',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Main Services',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Title Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Service Items',
            'default' => array(
                array(
                    'title' => 'Spring Cleanup',
                    'image' => $img_path . 'featured-image-9.jpg',
                    'icon'  => 'flaticon-hedge',
                    'text'  => 'Indignation and dislike men who are so beguiled demoralized ...',
                ),
                array(
                    'title' => 'Garden Care',
                    'image' => $img_path . 'featured-image-10.jpg',
                    'icon'  => 'flaticon-wheelbarrow',
                    'text'  => 'Frequently occur that pleasures have to berepudiated & accepted ...',
                ),
                array(
                    'title' => 'Water Fountain',
                    'image' => $img_path . 'featured-image-11.jpg',
                    'icon'  => 'flaticon-sprinkler',
                    'text'  => 'Duty through weakness of will which is the same as saying through ...',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Service Image',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'upload',
                    'title' => 'Icon (Image or flaticon class)',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Short Description',
                ),
                mthan_page_select_field('link', 'Service Link'),
            ),
        ),
    );
}
