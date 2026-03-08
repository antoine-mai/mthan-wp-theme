<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Search Page Settings
**/

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'     => 'search_page_settings',
    'title'  => 'Search',
    'icon'   => 'fas fa-search',
    'fields' => [
        mthan_page_select_field('default_search_page', 'Search Page', [
            'desc' => 'Select the page to be used for Search functionality and results.',
        ]),
        array(
            'id'    => 'search_placeholder',
            'type'  => 'text',
            'title' => 'Search Form Placeholder',
            'default' => 'Keyword ...',
        ),
    ]
]);
