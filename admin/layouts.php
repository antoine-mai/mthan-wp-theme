<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Layouts Settings
 */

$sections_list = mthan_get_sections();
$section_fields = array_merge(
    [
        [
            'id'      => 'template',
            'type'    => 'select',
            'title'   => 'Select Section',
            'options' => $sections_list,
        ],
    ],
    mthan_get_section_fields('all')
);

CSF::createSection(MTHAN_THEME_OPTIONS, [
    'id'    => 'layouts_settings',
    'title' => 'Layouts',
    'icon'  => 'fas fa-columns',
    'fields' => [
        [
            'id'    => 'layouts_tabs',
            'type'  => 'tabbed',
            'tabs'  => [
                [
                    'title'  => 'Page Layout',
                    'icon'   => 'fas fa-file',
                    'fields' => [
                        [
                            'id'      => 'page_sidebar_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar',
                            'default' => false,
                        ],
                        [
                            'id'      => 'page_sidebar_position',
                            'type'    => 'radio',
                            'title'   => 'Sidebar Position',
                            'options' => array(
                                'left'  => 'Left',
                                'right' => 'Right',
                            ),
                            'default'    => 'right',
                            'dependency' => array('page_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'page_sidebar_select',
                            'type'    => 'select',
                            'title'   => 'Select Sidebar',
                            'options' => 'sidebars',
                            'dependency' => array('page_sidebar_enable', '==', true),
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'page_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Page Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                        [
                            'id'           => 'page_after_content',
                            'type'         => 'group',
                            'title'        => 'After Page Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                    ],
                ],
                [
                    'title'  => 'Post Layout',
                    'icon'   => 'fas fa-edit',
                    'fields' => [
                        [
                            'id'      => 'blog_sidebar_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar',
                            'default' => true
                        ],
                        [
                            'id'      => 'blog_sidebar_position',
                            'type'    => 'radio',
                            'title'   => 'Sidebar Position',
                            'options' => array(
                                'left'  => 'Left',
                                'right' => 'Right',
                            ),
                            'default'    => 'right',
                            'dependency' => array('blog_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'blog_sidebar_select',
                            'type'    => 'select',
                            'title'   => 'Select Sidebar',
                            'options' => mthan_get_sidebar_options(),
                            'dependency' => array('blog_sidebar_enable', '==', true),
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'post_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Post Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                        [
                            'id'           => 'post_after_content',
                            'type'         => 'group',
                            'title'        => 'After Post Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                    ],
                ],
                [
                    'title'  => 'Service Layout',
                    'icon'   => 'fas fa-concierge-bell',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Service Settings',
                        ],
                        [
                            'id'    => 'service_layout',
                            'type'  => 'radio',
                            'title' => 'Service Layout',
                            'options' => array(
                                'boxed'    => 'Boxed',
                                'fullwide' => 'Fullwide',
                             ),
                             'default' => 'boxed',
                        ],
                        [
                            'id'      => 'service_sidebar_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Services',
                            'default' => true,
                        ],
                        [
                            'id'      => 'service_sidebar_position',
                            'type'    => 'radio',
                            'title'   => 'Sidebar Position',
                            'options' => array(
                                'left'  => 'Left',
                                'right' => 'Right',
                            ),
                            'default'    => 'left',
                            'dependency' => array('service_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'service_sidebar_select',
                            'type'    => 'select',
                            'title'   => 'Select Sidebar',
                            'options' => 'sidebars',
                            'dependency' => array('service_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'service_spacing',
                            'type'    => 'spacing',
                            'title'   => 'Service Content Spacing',
                            'default' => [
                                'top'    => '100',
                                'bottom' => '100',
                                'unit'   => 'px',
                            ],
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'service_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Service Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                        [
                            'id'           => 'service_after_content',
                            'type'         => 'group',
                            'title'        => 'After Service Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                    ],
                ],
                [
                    'title'  => 'Shop Layout',
                    'icon'   => 'fas fa-shopping-cart',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Shop Settings',
                        ],
                        [
                            'id'      => 'shop_sidebar_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Shop',
                            'default' => true,
                        ],
                        [
                            'id'      => 'shop_sidebar_position',
                            'type'    => 'radio',
                            'title'   => 'Sidebar Position',
                            'options' => array(
                                'left'  => 'Left',
                                'right' => 'Right',
                            ),
                            'default'    => 'left',
                            'dependency' => array('shop_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'shop_sidebar_select',
                            'type'    => 'select',
                            'title'   => 'Select Sidebar',
                            'options' => 'sidebars',
                            'dependency' => array('shop_sidebar_enable', '==', true),
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'shop_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Shop Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                        [
                            'id'           => 'shop_after_content',
                            'type'         => 'group',
                            'title'        => 'After Shop Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                    ],
                ],
                [
                    'title'  => 'Project Layout',
                    'icon'   => 'fas fa-project-diagram',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Project Settings',
                        ],
                        [
                            'id'      => 'project_sidebar_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Projects',
                            'default' => true,
                        ],
                        [
                            'id'      => 'project_sidebar_position',
                            'type'    => 'radio',
                            'title'   => 'Sidebar Position',
                            'options' => array(
                                'left'  => 'Left',
                                'right' => 'Right',
                            ),
                            'default'    => 'right',
                            'dependency' => array('project_sidebar_enable', '==', true),
                        ],
                        [
                            'id'      => 'project_sidebar_select',
                            'type'    => 'select',
                            'title'   => 'Select Sidebar',
                            'options' => 'sidebars',
                            'dependency' => array('project_sidebar_enable', '==', true),
                        ],
                        [
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'project_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Project Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                        [
                            'id'           => 'project_after_content',
                            'type'         => 'group',
                            'title'        => 'After Project Content',
                            'button_title' => 'Add Section',
                            'fields'       => $section_fields,
                        ],
                    ],
                ],
                [
                    'title'  => 'Settings',
                    'icon'   => 'fas fa-cog',
                    'fields' => [
                        [
                            'id'      => 'disable_preloader',
                            'type'    => 'switcher',
                            'title'   => 'Disable Preloader',
                            'default' => false,
                        ],
                    ],
                ],
            ],
        ],
    ],
]);