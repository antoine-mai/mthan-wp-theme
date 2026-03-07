<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
if (class_exists('CSF')) {

    CSF::createNavMenuOptions(MTHAN_MENU_OPTIONS, [
        'data_type' => 'serialize',
    ]);

    CSF::createSection(MTHAN_MENU_OPTIONS, [
        'fields' => [
            [
                'id'    => 'is_mega_menu',
                'type'  => 'switcher',
                'title' => 'Enable Mega Menu',
                'desc'  => 'Turn this menu item into a Mega Menu (only works on top-level items).',
                'default' => false,
            ],
            [
                'id'         => 'mega_menu_type',
                'type'       => 'select',
                'title'      => 'Mega Menu Type',
                'options'    => [
                    'template' => 'Use Template (Section Builder)',
                    'columns'  => 'Custom Columns',
                ],
                'default'    => 'columns',
                'dependency' => ['is_mega_menu', '==', 'true'],
            ],
            // mthan_page_select_field is a helper function defined in section-helpers.php
            mthan_page_select_field('mega_menu_template', 'Select Mega Menu Template', [
                'desc' => 'Select a section template to display as mega menu content.',
                'dependency' => ['is_mega_menu|mega_menu_type', '==|==', 'true|template'],
            ]),
        ]
    ]);

}
