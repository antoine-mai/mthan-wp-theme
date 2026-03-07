<?php defined('ABSPATH') || exit;

/**
 * Services (What We Do) Section Options
 */
function mthan_section_Services_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';
    $bg_path = get_template_directory_uri() . '/assets/images/background/';

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
            'default' => 'What we Do',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Services We Provide',
        ),
        array(
            'id'    => 'tabs',
            'type'  => 'group',
            'title' => 'Service Tabs',
            'default' => array(
                array(
                    'tab_title' => 'Spring Cleanup',
                    'tab_icon'  => 'flaticon-hedge',
                    'tab_hover_icon' => 'flaticon-null-3',
                    'bg_image' => $bg_path . 'image-1.jpg',
                    'content_icon' => 'flaticon-leaves',
                    'content_title' => 'Let’s <br>Start Your Project',
                    'content_text'  => 'Make an appointment & Start your project today.',
                    'service_subtitle' => 'know About',
                    'service_title' => 'Spring Cleanup',
                    'service_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'brochure_img' => $img_path . 'bro-thumb-1.jpg',
                    'brochure_title' => 'Projects & Case Studies',
                    'brochure_link_text' => 'Download.pdf',
                    'more_link_text' => 'More about service',
                ),
                array(
                    'tab_title' => 'Plants Plantintg',
                    'tab_icon'  => 'flaticon-digging-1',
                    'tab_hover_icon' => 'flaticon-digging',
                    'bg_image' => $bg_path . 'image-2.jpg',
                    'content_icon' => 'flaticon-leaves',
                    'content_title' => 'Let’s <br>Start Your Project',
                    'content_text'  => 'Make an appointment & Start your project today.',
                    'service_subtitle' => 'know About',
                    'service_title' => 'Plants Plantintg',
                    'service_text' => 'We denounce with righteous indignation and dislike men who are beguiled and demoralized by the charms of pleasure of the moment equal belongs fail in their duty through as saying through shrinking ...',
                    'brochure_img' => $img_path . 'bro-thumb-1.jpg',
                    'brochure_title' => 'Projects & Case Studies',
                    'brochure_link_text' => 'Download.pdf',
                    'more_link_text' => 'More about service',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'tab_title',
                    'type'  => 'text',
                    'title' => 'Tab Title',
                ),
                array(
                    'id'    => 'tab_icon',
                    'type'  => 'upload',
                    'title' => 'Tab Icon',
                ),
                array(
                    'id'    => 'tab_hover_icon',
                    'type'  => 'upload',
                    'title' => 'Tab Hover Icon',
                ),
                array(
                    'id'    => 'bg_image',
                    'type'  => 'upload',
                    'title' => 'Background Image',
                ),
                array(
                    'id'    => 'content_icon',
                    'type'  => 'upload',
                    'title' => 'Inner Box Icon',
                ),
                array(
                    'id'    => 'content_title',
                    'type'  => 'text',
                    'title' => 'Inner Box Title',
                ),
                array(
                    'id'    => 'content_text',
                    'type'  => 'textarea',
                    'title' => 'Inner Box Text',
                ),
                mthan_page_select_field('appointment_link', 'Appointment Link'),
                array(
                    'id'    => 'service_subtitle',
                    'type'  => 'text',
                    'title' => 'Service Subtitle',
                ),
                array(
                    'id'    => 'service_title',
                    'type'  => 'text',
                    'title' => 'Service Title',
                ),
                array(
                    'id'    => 'service_text',
                    'type'  => 'textarea',
                    'title' => 'Service Description',
                ),
                array(
                    'id'    => 'brochure_img',
                    'type'  => 'upload',
                    'title' => 'Brochure Thumbnail',
                ),
                array(
                    'id'    => 'brochure_title',
                    'type'  => 'text',
                    'title' => 'Brochure Title',
                ),
                array(
                    'id'    => 'brochure_link_text',
                    'type'  => 'text',
                    'title' => 'Brochure Link Text',
                ),
                array(
                    'id'    => 'brochure_link_url',
                    'type'  => 'text',
                    'title' => 'Brochure Link URL',
                ),
                array(
                    'id'    => 'more_link_text',
                    'type'  => 'text',
                    'title' => 'More Link Text',
                ),
                mthan_page_select_field('more_link_url', 'More Link URL'),
            ),
        ),
    );
}
