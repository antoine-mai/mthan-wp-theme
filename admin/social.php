<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Social Media Tab
 */
CSF::createSection(MTHAN_THEME_OPTIONS, array(
    'id' => 'social_settings',
    'title' => 'Social Media',
    'icon' => 'fas fa-share-alt',
    'fields' => array(
        array(
            'id' => 'social_links',
            'type' => 'group',
            'title' => 'Social Links',
            'button_title' => 'Add New Social Link',
            'accordion_title_auto' => false,
            'accordion_title_prefix' => 'Social Link: ',
            'accordion_title_number' => true,
            'fields' => array(
                array(
                    'id' => 'icon',
                    'type' => 'icon',
                    'title' => 'Icon Name (e.g., fab fa-facebook)',
                    'default' => 'fab fa-facebook',
                ),
                array(
                    'id' => 'url',
                    'type' => 'text',
                    'title' => 'URL',
                    'default' => '#',
                ),
            ),
        ),
    )
));