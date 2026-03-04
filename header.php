<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('hidden-bar-wrapper'); ?> >
    <?php wp_body_open(); ?>

    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <div class="icon"></div>
        </div>

        <?php
$theme_options = get_option('mthan_theme_options');
$header_layout = !empty($theme_options['header_layout']) ? $theme_options['header_layout'] : 'style-1';

if (is_singular()) {
    $meta_key = is_page() ? 'mthan_page_options' : 'mthan_post_options';
    $post_meta = get_post_meta(get_the_ID(), $meta_key, true);
    if (!empty($post_meta['custom_header_layout']) && $post_meta['custom_header_layout'] != 'default') {
        $header_layout = $post_meta['custom_header_layout'];
    }
}

get_template_part('template-parts/header', $header_layout);