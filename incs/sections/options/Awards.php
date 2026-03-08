<?php defined('ABSPATH') || exit;

/**
 * Awards Section Options
 */
function mthan_section_Awards_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $bg_path = get_template_directory_uri() . '/assets/images/background/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'bottom_image',
            'type'  => 'upload',
            'title' => 'Bottom Decorative Image',
            'default' => $img_path . 'anim-image-4.png',
        ),
        array(
            'id'    => 'bg_image',
            'type'  => 'upload',
            'title' => 'Left Column Background Image',
            'default' => $bg_path . 'awards-bg.jpg',
        ),
        array(
            'id'    => 'bg_icon',
            'type'  => 'upload',
            'title' => 'Background Icon',
            'default' => $icon_path . 'awards-bg-icon.png',
        ),
        array(
            'id'    => 'content_icon',
            'type'  => 'icon',
            'title' => 'Content Icon',
            'default' => 'flaticon-guarantee-3',
        ),
        array(
            'id'    => 'subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Awards & Recognition',
        ),
        array(
            'id'    => 'title',
            'type'  => 'textarea',
            'title' => 'Title',
            'default' => 'Most Awards Won <br>By a Company in <br>USA - <span class="theme_color">Pruners&CO</span>',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'It is a long established fact that a reader will distracted by the readable content.',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'All Our Awards',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Award Items',
            'default' => array(
                array(
                    'label' => 'Awards 2017',
                    'date'  => 'wyn’s 2017',
                    'title' => 'Customer Choice of The Year',
                ),
                array(
                    'label' => 'Awards 2014',
                    'date'  => 'asla 2014',
                    'title' => 'Residential Design Awards',
                ),
                array(
                    'label' => 'Awards 2010',
                    'date'  => 'wyn’s 2010',
                    'title' => 'Public Parks and Open Space',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'label',
                    'type'  => 'textarea',
                    'title' => 'Label (e.g. Awards 2017)',
                ),
                array(
                    'id'    => 'date',
                    'type'  => 'text',
                    'title' => 'Date/Organization',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'textarea',
                    'title' => 'Award Title',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Award Image (for Lightbox)',
                ),
            ),
        ),
    );
}
