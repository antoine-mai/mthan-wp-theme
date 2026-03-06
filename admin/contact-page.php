<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Contact Page Settings
**/
global $mthan_options_id;

CSF::createSection($mthan_options_id, [
    'id'     => 'contact_page_settings',
    'title'  => 'Contact Page',
    'icon'   => 'fas fa-envelope',
    'fields' => [
        [
            'id'          => 'default_contact_page',
            'type'        => 'select',
            'title'       => 'Default Contact Page',
            'desc'        => 'Select the page to be used as Contact Page.',
            'options'     => 'post',
            'query_args'  => [
                'post_type' => 'mthan_page',
                'posts_per_page' => -1,
            ],
            'placeholder' => 'Select a Page',
        ],
    ]
]);
