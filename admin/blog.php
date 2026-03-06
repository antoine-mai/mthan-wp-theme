<?php defined('ABSPATH') or die('Cheatin\' uh?');
// Blog Settings
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'blog_settings',
    'title' => 'Blog',
    'icon' => 'fas fa-edit',
    'fields' => array(
            array(
            'id' => 'blog_layout',
            'type' => 'select',
            'title' => 'Blog Layout',
            'options' => array(
                'list' => 'List Layout',
                'grid' => 'Grid Layout',
            ),
            'default' => 'list'
        ),
            array(
            'id' => 'blog_sidebar',
            'type' => 'switcher',
            'title' => 'Enable Sidebar on Single Post',
            'default' => true,
        ),
    )
));