<?php defined('ABSPATH') || exit;

/**
 * Team 2 Section Options
 */
function mthan_section_Team2_options() {
    $img_path = get_template_directory_uri() . '/assets/images/resource/';
    $icon_path = get_template_directory_uri() . '/assets/images/icons/';

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
            'default' => 'Behind Lander',
        ),
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Professional Team',
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
                    'phone_icon'  => 'flaticon-headphones',
                    'image'       => $img_path . 'team-4.jpg',
                ),
                array(
                    'name'        => 'William Theo',
                    'designation' => 'manager',
                    'phone'       => '+31 65 792 63 12',
                    'phone_icon'  => 'flaticon-headphones',
                    'image'       => $img_path . 'team-5.jpg',
                ),
                array(
                    'name'        => 'Arlo Reuben',
                    'designation' => 'Gardenist',
                    'phone'       => 'arlo@lander.com',
                    'phone_icon'  => 'flaticon-envelope-1',
                    'image'       => $img_path . 'team-6.jpg',
                ),
                array(
                    'name'        => 'Nathan Elliot',
                    'designation' => 'Founder',
                    'phone'       => '+31 65 792 63 13',
                    'phone_icon'  => 'flaticon-headphones',
                    'image'       => $img_path . 'team-7.jpg',
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
                    'title' => 'Phone or Email',
                ),
                array(
                    'id'    => 'phone_icon',
                    'type'  => 'upload',
                    'title' => 'Phone/Email Icon',
                    'default' => 'flaticon-headphones',
                ),
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Member Image',
                    'help'  => 'Recommended size: 270x300px',
                ),
                mthan_page_select_field('link', 'Member Link'),
                array(
                    'id'    => 'socials',
                    'type'  => 'group',
                    'title' => 'Social Links',
                    'fields' => array(
                        array(
                            'id'    => 'icon',
                            'type'  => 'upload',
                            'title' => 'Icon (e.g. fab fa-facebook-f)',
                        ),
                        array(
                            'id'    => 'url',
                            'type'  => 'text',
                            'title' => 'URL',
                        ),
                    ),
                ),
            ),
        ),
    );
}
