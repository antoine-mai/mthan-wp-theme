<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * WooCommerce Template
 * 
**/
get_header();

$options = get_option(MTHAN_THEME_OPTIONS);
$sidebar_enabled = !empty($options['shop_sidebar']) ? $options['shop_sidebar'] : false;

mthan_render_global_sections('before');

if ($sidebar_enabled) { ?>
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="shop-content-wrapper">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
                    <aside class="sidebar shop-sidebar">
                        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
                    </aside>
                <?php else : ?>
                    <?php get_template_part('template-parts/sidebar', 'blog'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="auto-container">
    <div class="shop-content-wrapper py-5">
        <?php woocommerce_content(); ?>
    </div>
</div>
<?php }

mthan_render_global_sections('after');
get_footer();
