<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
global $mthan_options_id;
CSF::createSection($mthan_options_id, [
    'id' => 'general_settings',
    'title' => 'General',
    'icon' => 'fas fa-cogs',
    'fields' => [
        [
            'id' => 'logo',
            'type' => 'upload',
            'title' => 'Logo',
            'default' => 'https://team3t.com/wp-content/themes/mthan-wp-prunner/assets/images/logo.png',
            'preview' => false  
        ],
        [
            'id' => 'favicon',
            'type' => 'upload',
            'title' => 'Favicon',
            'default' => 'https://team3t.com/wp-content/themes/mthan-wp-prunner/assets/images/favicon.png',
            'preview' => false
        ],
        [
            'type' => 'subheading',
            'content' => 'Contact Information',
        ],
        [
            'id' => 'contact_phone',
            'type' => 'text',
            'title' => 'Phone Number',
            'default' => '(+84) 933 489 525',
        ],
        [
            'id' => 'contact_email',
            'type' => 'text',
            'title' => 'Email Address',
            'default' => 'maithanhan@gmail.com',
        ],
        [
            'id' => 'contact_address',
            'type' => 'text',
            'title' => 'Address',
            'default' => '1A Hoang Bat Dat St, Tan Son Ward, Ho Chi Minh City',
        ],
        [
            'id' => 'contact_hours',
            'type' => 'text',
            'title' => 'Working Hours',
            'default' => 'Mon-Fri: 9am to 7pm',
        ],
        [
            'id' => 'social_links',
            'type' => 'group',
            'title' => 'Social Links',
            'button_title' => 'Add New Social Link',
            'accordion_title_auto' => true,
            'accordion_title_prefix' => 'Social: ',
            'accordion_title_number' => true,
            'fields' => [
                [
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Name',
                    'default' => 'Facebook',
                ],
                [
                    'id' => 'icon',
                    'type' => 'icon',
                    'title' => 'Icon Class',
                    'default' => 'fab fa-facebook',
                ],
                [
                    'id' => 'url',
                    'type' => 'text',
                    'title' => 'URL',
                    'default' => '#',
                ],
            ],
        ],
    ]
]);