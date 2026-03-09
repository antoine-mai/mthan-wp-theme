<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Default Page Template
 **/
get_header();

$theme_options = get_option(MTHAN_THEME_OPTIONS);
$page_meta     = get_post_meta(get_the_ID(), MTHAN_PAGE_OPTIONS, true);

// Spacing Logic: Page Meta > Layout Settings > Default
$layouts_tabs = !empty($theme_options['layouts_tabs']) ? $theme_options['layouts_tabs'] : [];
$def_spacing  = !empty($layouts_tabs['page_spacing']) ? $layouts_tabs['page_spacing'] : ['top' => '100', 'bottom' => '100', 'unit' => 'px'];
$spacing      = !empty($page_meta['page_spacing']) ? $page_meta['page_spacing'] : $def_spacing;

$sidebar_settings = mthan_get_sidebar_settings();
$sidebar_enabled  = $sidebar_settings['enabled'];
$sidebar_pos      = $sidebar_settings['position'];

$sec_style = '';
if (!empty($spacing)) {
    $unit = !empty($spacing['unit']) ? $spacing['unit'] : 'px';
    if (isset($spacing['top'])) $sec_style .= 'padding-top:' . $spacing['top'] . $unit . ';';
    if (isset($spacing['bottom'])) $sec_style .= 'padding-bottom:' . $spacing['bottom'] . $unit . ';';
}

if (empty($page_meta) || !isset($page_meta['page_global_before_sections_enable']) || $page_meta['page_global_before_sections_enable']) {
    mthan_render_global_sections('before');
}
mthan_render_page_sections('before');
if (have_posts()) {
    the_post(); ?>
<div class="sidebar-page-container" <?php if ($sec_style) echo 'style="' . esc_attr($sec_style) . '"'; ?>>
    <div class="auto-container">
        <div class="row clearfix">
            
            <?php if ($sidebar_enabled && $sidebar_pos == 'left') { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>

            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <?php if (!empty($page_meta['page_content_sections_enable'])) {
                    mthan_render_page_sections('content');
                } else {
                    the_content();
                } ?>
            </div>

            <?php if ($sidebar_enabled && $sidebar_pos == 'right') { ?>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>

        </div>
    </div>
</div>
<?php }
mthan_render_page_sections('after');
if (empty($page_meta) || !isset($page_meta['page_global_after_sections_enable']) || $page_meta['page_global_after_sections_enable']) {
    mthan_render_global_sections('after');
}
get_footer();