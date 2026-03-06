<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Search Page Settings
**/
global $mthan_options_id;

CSF::createSection($mthan_options_id, [
    'id'     => 'search_page_settings',
    'title'  => 'Search Page',
    'icon'   => 'fas fa-search',
    'fields' => [
        [
            'id'          => 'default_search_page',
            'type'        => 'select',
            'title'       => 'Search Results Page',
            'desc'        => 'Select the page to be used for Search Results.',
            'options'     => 'post',
            'query_args'  => [
                'post_type' => 'mthan_page',
                'posts_per_page' => -1,
            ],
            'placeholder' => 'Select a Page',
        ],
    ]
]);
