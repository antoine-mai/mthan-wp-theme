<?php defined('ABSPATH') or die('Cheatin\' uh?');
// General Settings
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id' => 'general_settings',
    'title' => 'General',
    'icon' => 'fas fa-cogs',
    'fields' => [
        [
            'id' => 'logo',
            'type' => 'upload',
            'title' => 'Logo',
            'preview' => false  
        ],
        [
            'id' => 'favicon',
            'type' => 'upload',
            'title' => 'Favicon',
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
            'default' => '(+5) 678 90 12 345',
        ],
        [
            'id' => 'contact_email',
            'type' => 'text',
            'title' => 'Email Address',
            'default' => 'service@pruners.com',
        ],
        [
            'id' => 'contact_address',
            'type' => 'text',
            'title' => 'Address',
            'default' => '53 Garden Street LA, USA',
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