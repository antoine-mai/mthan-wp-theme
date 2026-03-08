<?php
/**
 * The template for displaying product content within loops
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$columns = wc_get_loop_prop( 'columns' );
$classes = array('shop-item', 'wow', 'fadeInUp');

if ($columns == 3) {
    $classes[] = 'col-xl-4 col-lg-6 col-md-6 col-sm-12';
} else {
    $classes[] = 'col-lg-3 col-md-6 col-sm-12';
}
?>

<div <?php wc_product_class( $classes, $product ); ?>>
    <div class="inner-box">
        <div class="image">
            <a href="<?php the_permalink(); ?>">
                <?php
                /**
                 * Hook: woocommerce_before_shop_loop_item_title.
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
                ?>
            </a>
        </div>
        <div class="options">
            <ul class="option-box clearfix">
                <?php if (class_exists('YITH_WCWL')) : ?>
                <li class="add-fav"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></li>
                <?php else : ?>
                <li class="add-fav"><a href="#"><span class="flaticon-heart-1"></span><span class="t-tip">Wishlist</span></a></li>
                <?php endif; ?>

                <li><?php woocommerce_template_loop_add_to_cart(); ?></li>

                <li class="zoom-btn">
                    <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="lightbox-image" data-fancybox="products">
                        <span class="flaticon-expand"></span><span class="t-tip">Preview</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="lower-content">
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <div class="price"><?php echo $product->get_price_html(); ?></div>
        </div>
    </div>
</div>
