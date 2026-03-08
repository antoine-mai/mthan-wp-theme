<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Layouts Settings
 */

$sections_list = mthan_get_sections();

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
                            'type'    => 'subheading',
                            'content' => 'Content Sections',
                        ],
                        [
                            'id'           => 'page_before_content',
                            'type'         => 'group',
                            'title'        => 'Before Page Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                        [
                            'id'           => 'page_after_content',
                            'type'         => 'group',
                            'title'        => 'After Page Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'title'  => 'Post Layout',
                    'icon'   => 'fas fa-edit',
                    'fields' => [
                        [
                            'type'    => 'subheading',
                            'content' => 'Blog Settings',
                        ],
                        [
                            'id' => 'blog_layout',
                            'type' => 'select',
                            'title' => 'Blog Layout',
                            'options' => [
                                'list' => 'List Layout',
                                'grid' => 'Grid Layout',
                            ],
                            'default' => 'list'
                        ],
                        [
                            'id'      => 'blog_posts_per_page',
                            'type'    => 'number',
                            'title'   => 'Posts Per Page',
                            'default' => 10,
                            'help'    => 'Number of posts to show on blog list pages.'
                        ],
                        [
                            'id'      => 'blog_sidebar',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Blog List',
                            'default' => true
                        ],
                        [
                            'id'      => 'blog_single_sidebar',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Single Post',
                            'default' => true
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
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                        [
                            'id'           => 'post_after_content',
                            'type'         => 'group',
                            'title'        => 'After Post Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
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
                            'id'      => 'service_sidebar',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Services',
                            'default' => true,
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
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                        [
                            'id'           => 'service_after_content',
                            'type'         => 'group',
                            'title'        => 'After Service Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
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
                            'id'      => 'shop_sidebar',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Shop',
                            'default' => true,
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
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                        [
                            'id'           => 'shop_after_content',
                            'type'         => 'group',
                            'title'        => 'After Shop Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
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
                            'id'      => 'project_sidebar',
                            'type'    => 'switcher',
                            'title'   => 'Enable Sidebar on Projects',
                            'default' => true,
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
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
                        ],
                        [
                            'id'           => 'project_after_content',
                            'type'         => 'group',
                            'title'        => 'After Project Content',
                            'button_title' => 'Add Section',
                            'fields'       => [
                                [
                                    'id'      => 'template',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                ],
                            ],
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