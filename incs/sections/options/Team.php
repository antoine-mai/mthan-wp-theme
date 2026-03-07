<?php defined('ABSPATH') || exit;

/**
 * Team Section Options
 */
function mthan_section_Team_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

    return array(
        array(
            'id'    => 'left_leaf',
            'type'  => 'upload',
            'title' => 'Left Leaf Image',
            'default' => $img_path . 'leaf-2.png',
        ),
        array(
            'id'    => 'right_leaf',
            'type'  => 'upload',
            'title' => 'Right Leaf Image',
            'default' => $img_path . 'leaf-3.png',
        ),
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
            'default' => 'Behind Pruners',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Our Expert Specialists',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text',
            'default' => 'All Members',
        ),
        array(
            'id'    => 'btn_link',
            'type'  => 'link',
            'title' => 'Button Link',
        ),
        array(
            'id'    => 'items',
            'type'  => 'group',
            'title' => 'Team Members',
            'default' => array(
                array(
                    'name'        => 'Isaac Freddie',
                    'designation' => 'Founder',
                    'phone'       => '+31 65 792 63 11',
                    'image'       => $img_path . 'team-1.jpg',
                ),
                array(
                    'name'        => 'William Theo',
                    'designation' => 'Manager',
                    'phone'       => '+31 65 792 63 12',
                    'image'       => $img_path . 'team-2.jpg',
                ),
                array(
                    'name'        => 'Arlo Reuben',
                    'designation' => 'Staff Specialist',
                    'phone'       => '+31 65 792 63 13',
                    'image'       => $img_path . 'team-3.jpg',
                ),
            ),
            'fields' => array(
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'    => 'designation',
                    'type'  => 'text',
                    'title' => 'Designation',
                ),
                array(
                    'id'    => 'phone',
                    'type'  => 'text',
                    'title' => 'Phone Number',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Member Image',
                    'help'  => 'Recommended size: 270x300px',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'link',
                    'title' => 'Member Link',
                ),
            ),
        ),
    );
}
