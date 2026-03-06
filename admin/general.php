<?php defined('ABSPATH') or die('Cheatin\' uh?');
// General Settings
CSF::createSection($prefix, array(
    'id' => 'general_settings',
    'title' => 'General',
    'icon' => 'fas fa-cogs',
    'fields' => array(
            array(
            'id' => 'logo',
            'type' => 'media',
            'title' => 'Site Logo',
        ),
            array(
            'id' => 'favicon',
            'type' => 'media',
            'title' => 'Favicon',
        ),
    )
));