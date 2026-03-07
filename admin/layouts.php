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
                            'content' => 'Banner Settings',
                        ],
                        [
                            'id'      => 'global_page_banner_enable',
                            'type'    => 'switcher',
                            'title'   => 'Enable Global Banner',
                            'default' => true,
                        ],
                        [
                            'id'      => 'global_page_banner_bg',
                            'type'    => 'upload',
                            'title'   => 'Global Banner Background',
                            'default' => get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg',
                            'dependency' => ['global_page_banner_enable', '==', 'true'],
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
                            'fields'       => [
                                [
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
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
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
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
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
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
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
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
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
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
                                    'id'      => 'section',
                                    'type'    => 'select',
                                    'title'   => 'Select Section',
                                    'options' => $sections_list,
                                    'chosen'  => true,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
]);