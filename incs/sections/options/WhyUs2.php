<?php defined('ABSPATH') || exit;

/**
 * Why Us 2 Section Options
 */
function mthan_section_WhyUs2_options() {
    $img_path = get_template_directory_uri() . '/assets/images/background/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'bg_image',
            'type'  => 'upload',
            'title' => 'Background Image (Left Column)',
            'default' => $img_path . 'why-us-bg.jpg',
        ),
        array(
            'id'    => 'rating_count',
            'type'  => 'text',
            'title' => 'Rating Number',
            'default' => '4.9',
        ),
        array(
            'id'    => 'rating_text',
            'type'  => 'text',
            'title' => 'Rating Text',
            'default' => 'Customer Rating',
        ),
        array(
            'id'    => 'floated_text',
            'type'  => 'text',
            'title' => 'Floated Text',
            'default' => 'Since 2008',
        ),
        array(
            'id'    => 'title_icon',
            'type'  => 'upload',
            'title' => 'Title Icon',
            'default' => $icon_path . 'leaf-five.png',
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
            'default' => 'Experts Choice',
        ),
        array(
            'id'    => 'description',
            'type'  => 'textarea',
            'title' => 'Description',
            'default' => 'It is a long established fact that a reader will distracted by the readable content.',
        ),
        array(
            'id'    => 'features',
            'type'  => 'textarea',
            'title' => 'Features List (One per line)',
            'default' => "Clean, Branded Vehicles\nProfessional, Uniformed Personnel\nTimely Response Guarantee\nReliable Equipment Maintained Daily",
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'How We Work',
        ),
        mthan_page_select_field('btn_link', 'Button Link'),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Why Us Blocks (Right Column)',
            'default' => array(
                array(
                    'title' => 'Experienced',
                    'icon'  => 'flaticon-null',
                    'text'  => 'Good knowledge becaazuse you done something many times.',
                ),
                array(
                    'title' => 'Fully Insured',
                    'icon'  => 'flaticon-insurance',
                    'text'  => 'All customers claims are managed by the insurance providers.',
                ),
                array(
                    'title' => 'Pet & Kid Safe',
                    'icon'  => 'flaticon-dog-2',
                    'text'  => 'Pet animals for kids can range you make an informed choice.',
                ),
                array(
                    'title' => 'Professional Staff',
                    'icon'  => 'flaticon-gardener-1',
                    'text'  => 'Indignation dislike worked who that our therefore holds.',
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
                    'title' => 'Text',
                ),
                mthan_page_select_field('link', 'Link'),
            ),
        ),
    );
}
