<?php defined('ABSPATH') || exit;

/**
 * How It Works Section Options
 */
function mthan_section_HowItWorks1_options() {
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
            'default' => 'How It Works',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Working Process',
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
            'title' => 'Process Steps',
            'default' => array(
                array(
                    'title' => 'Talk with expert',
                    'step'  => 'Step One',
                    'image' => $img_path . 'featured-image-5.jpg',
                    'icon'  => 'flaticon-consulting',
                    'text'  => 'Which is the same as saying through shrinkings from toil and cases are perfect.',
                ),
                array(
                    'title' => 'Design proposal',
                    'step'  => 'Step Two',
                    'image' => $img_path . 'featured-image-6.jpg',
                    'icon'  => 'flaticon-blueprint',
                    'text'  => 'Which is the same as saying through shrinkings from toil and cases are perfect.',
                ),
                array(
                    'title' => 'Start planting',
                    'step'  => 'Step Three',
                    'image' => $img_path . 'featured-image-7.jpg',
                    'icon'  => 'flaticon-gardener-2',
                    'text'  => 'Which is the same as saying through shrinkings from toil and cases are perfect.',
                ),
                array(
                    'title' => 'Party With Family',
                    'step'  => 'Step Four',
                    'image' => $img_path . 'featured-image-8.jpg',
                    'icon'  => 'flaticon-trees',
                    'text'  => 'Which is the same as saying through shrinkings from toil and cases are perfect.',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'step',
                    'type'  => 'text',
                    'title' => 'Step Label (e.g. Step One)',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Featured Image',
                ),
                array(
                    'id'    => 'icon',
                    'type'  => 'upload',
                    'title' => 'Icon (Image or flaticon class)',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Hover Description',
                ),
            ),
        ),
    );
}
