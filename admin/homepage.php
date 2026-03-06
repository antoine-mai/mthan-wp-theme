<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'homepage_settings',
    'title' => 'Home Page',
    'icon'  => 'fas fa-home',
    'fields' => [
        [
            'id'          => 'homepage_select',
            'type'        => 'select',
            'title'       => 'Select Home Page',
            'desc'        => 'Select a Page from the Custom Post Type (Pages) to serve as your Home Page.',
            'options'     => 'post',
            'query_args'  => [
                'post_type' => 'mthan_page',
                'posts_per_page' => -1,
            ],
            'placeholder' => 'Select a Page',
        ],
        [
            'type'    => 'notice',
            'style'   => 'info',
            'content' => 'After selecting a page here, the theme will automatically use its builder data to render the front page of your website.',
        ],
    ]
]);
