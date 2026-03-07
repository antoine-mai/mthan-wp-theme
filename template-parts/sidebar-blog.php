<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

<aside class="sidebar blog-sidebar">

    <!-- Search Widget -->
    <div class="sidebar-widget search-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="widget-inner">
            <?php $theme_options = get_option('mthan_theme_options'); ?>
            <form role="search" method="get" action="<?php echo esc_url(!empty($theme_options['default_search_page']) ? get_permalink($theme_options['default_search_page']) : home_url('/')); ?>">
                <div class="form-group">
                    <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>"
                        placeholder="Enter Keyword ...">
                    <button type="submit"><span class="icon fa fa-search"></span></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="sidebar-widget archives wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="widget-inner">
            <div class="sidebar-title">
                <h4>Categories</h4>
            </div>
            <ul>
                <?php
$categories = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'hide_empty' => true, 'exclude' => get_cat_ID('Uncategorized')));
foreach ($categories as $cat):
    $active = (is_category($cat->term_id)) ? ' class="active"' : '';
?>
                <li<?php echo $active; ?>>
                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                        <span class="ttl">
                            <?php echo esc_html($cat->name); ?>
                        </span>
                        <span class="count">
                            <?php echo (int)$cat->count; ?>
                        </span>
                    </a>
                    </li>
                    <?php
endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Popular Posts Widget -->
    <div class="sidebar-widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="widget-inner">
            <div class="sidebar-title">
                <h4>Popular Post</h4>
            </div>
            <?php
$popular_posts = new WP_Query(array(
    'posts_per_page' => 3,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'ignore_sticky_posts' => true,
));
// Fallback: nếu không dùng view counter, lấy by comments
if (!$popular_posts->have_posts()) {
    $popular_posts = new WP_Query(array(
        'posts_per_page' => 3,
        'orderby' => 'comment_count',
        'order' => 'DESC',
        'ignore_sticky_posts' => true,
    ));
}
while ($popular_posts->have_posts()):
    $popular_posts->the_post(); ?>
            <div class="post">
                <?php if (has_post_thumbnail()): ?>
                <figure class="post-thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                    </a>
                </figure>
                <?php
    endif; ?>
                <h5 class="text"><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></h5>
                <div class="info">
                    <?php echo get_the_date(); ?>
                </div>
            </div>
            <?php
endwhile;
wp_reset_postdata(); ?>
        </div>
    </div>

    <!-- Tags Widget -->
    <?php $tags = get_tags(array('orderby' => 'count', 'order' => 'DESC', 'hide_empty' => true)); ?>
    <?php if (!empty($tags)): ?>
    <div class="sidebar-widget popular-tags wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="widget-inner">
            <div class="sidebar-title">
                <h4>Tags</h4>
            </div>
            <ul class="tags-list clearfix">
                <?php foreach ($tags as $tag): ?>
                <li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                        <?php echo esc_html($tag->name); ?>
                    </a></li>
                <?php
    endforeach; ?>
            </ul>
        </div>
    </div>
    <?php
endif; ?>

    <!-- Call To Action Widget -->
    <div class="sidebar-widget call-to-widget wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="widget-inner">
            <div class="image-layer"
                style="background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/background/call-to-bg-2.jpg);">
            </div>
            <div class="content">
                <div class="icon-box"><span class="flaticon-gardener"></span></div>
                <h5>Let's Start Your Project <br>Contact Experts</h5>
                <div class="email"><a href="mailto:<?php echo esc_attr(get_option('admin_email')); ?>">
                        <?php echo esc_html(get_option('admin_email')); ?>
                    </a></div>
                <div class="link-box"><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"
                        class="theme-btn btn-style-four"><span class="btn-title">Get a Quote <i
                                class="arrow flaticon-play-button-1"></i></span></a></div>
            </div>
        </div>
    </div>

</aside>