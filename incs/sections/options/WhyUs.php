<?php defined('ABSPATH') || exit;

/**
 * Why Us Section Options
 */
function mthan_section_WhyUs_options() {
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
            'default' => 'Why Choose Us',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Experts Trusted Us',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Why Us Blocks',
            'default' => array(
                array(
                    'title'    => 'Experienced',
                    'icon'     => 'flaticon-null',
                    'text'     => 'Indignation and dislike mens who are so beguiled & the demoralized.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Upfront Pricing',
                    'icon'     => 'flaticon-insurance',
                    'text'     => 'Take trivial example which of ever undertakes laborious physical exercise.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Fully Insured',
                    'icon'     => 'flaticon-offer',
                    'text'     => 'Readable content page when looking at its layout making look like readable.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Quality Products',
                    'icon'     => 'flaticon-shovel',
                    'text'     => 'How all this mistaken idea of denouncing pleasure and praising complete.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Pet & Kid Safe',
                    'icon'     => 'flaticon-dog-2',
                    'text'     => 'How all this mistaken idea of denouncing pleasure and praising complete.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Expert Staff',
                    'icon'     => 'flaticon-gardener-1',
                    'text'     => 'Take trivial example which of ever undertakes laborious physical exercise.',
                    'link'     => '',
                ),
                array(
                    'title'    => '100% Guarantee',
                    'icon'     => 'flaticon-medal-1',
                    'text'     => 'Indignation and dislike mens who are so beguiled & the demoralized.',
                    'link'     => '',
                ),
                array(
                    'title'    => 'Ontime Delivery',
                    'icon'     => 'flaticon-on-time',
                    'text'     => 'Readable content page when looking at its layout making look like readable.',
                    'link'     => '',
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
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Description',
                ),
                mthan_page_select_field('link', 'Link'),
            ),
        ),
    );
}
