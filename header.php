<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$theme_options = get_option('mthan_theme_options');
$layouts_tabs  = !empty($theme_options['layouts_tabs']) 
    ? $theme_options['layouts_tabs'] 
    : [];
$enable_preloader = isset($layouts_tabs['preloader']) 
    ? (bool)$layouts_tabs['preloader'] 
    : true;
$header_tabs = !empty($theme_options['header_tabs']) 
    ? $theme_options['header_tabs'] 
    : [];
$header_layout = !empty($header_tabs['header_layout']) 
    ? $header_tabs['header_layout'] 
    : 'style-1';
if (is_singular()) {
    $meta_key = is_page() ? 'mthan_page_options' : 'mthan_post_options';
    $post_meta = get_post_meta(get_the_ID(), $meta_key, true);
    if (!empty($post_meta['custom_header_layout']) && $post_meta['custom_header_layout'] != 'default') {
        $header_layout = $post_meta['custom_header_layout'];
    }
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (!empty($theme_options['favicon']['url'])) { ?>
    <link rel="shortcut icon" href="<?php echo esc_url($theme_options['favicon']['url']); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url($theme_options['favicon']['url']); ?>" type="image/x-icon">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('hidden-bar-wrapper'); ?>>
    <?php wp_body_open(); ?>
    <div class="page-wrapper">
        <?php if ($enable_preloader) { ?>
        <!-- Preloader -->
        <div class="preloader">
            <div class="icon"></div>
        </div>
        <?php } ?>
        <?php get_template_part('template-parts/header', $header_layout); ?>