<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Contact Settings
**/
CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'contact_settings',
    'title' => 'Contact',
    'icon'  => 'fas fa-address-book',
    'fields' => [
        mthan_page_select_field('contact_page', 'Contact Page', [
            'desc' => 'Select the page that serves as the main contact page.'
        ]),
    ]
]);
