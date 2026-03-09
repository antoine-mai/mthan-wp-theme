<?php defined('ABSPATH') or die('Cheatin\' uh?');
get_header();
mthan_render_global_sections('before', 'blog');
mthan_render_page_sections('before');

// Blog post banner (replaces the generic page-banner for single posts)
if (have_posts()) {
    the_post();
    $categories = get_the_category();
    $first_cat = !empty($categories) ? $categories[0] : null;
?>
<section class="page-banner single-banner">
    <div class="image-layer"
        style="background-image:url(<?php echo esc_url(has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg'); ?>);">
    </div>
    <div class="banner-bottom-pattern"></div>
    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <div class="news-info">
                    <div class="info clearfix">
                        <?php if ($first_cat): ?>
                        <div class="cat"><a href="<?php echo esc_url(get_category_link($first_cat->term_id)); ?>">
                                <?php echo esc_html($first_cat->name); ?>
                            </a></div>
                        <?php
    endif; ?>
                        <div class="date"><span class="icon far fa-calendar"></span>
                            <?php echo get_the_date(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php rewind_posts();
}?>

<?php 
$sidebar_settings = mthan_get_sidebar_settings();
$sidebar_enabled  = $sidebar_settings['enabled'];
$sidebar_pos      = $sidebar_settings['position'];
?>

<div class="sidebar-page-container blog-page">
    <div class="auto-container">
        <div class="row clearfix">

            <?php if ($sidebar_enabled && $sidebar_pos == 'left') { ?>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>

            <!--Content Side-->
            <div class="content-side <?php echo ($sidebar_enabled) ? 'col-lg-8' : 'col-lg-12'; ?> col-md-12 col-sm-12">
                <div class="blog-content">
                    <?php if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
                    <div class="post-details">
                        <div class="inner-box">

                            <div class="post-meta">
                                <ul class="clearfix">
                                    <li class="author">
                                        <span class="thumb"><img
                                                src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>"
                                                alt=""></span>
                                        <a
                                            href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">By:
                                            <?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li><a href="#"><span class="icon far fa-comment"></span> Comments:
                                             <?php echo get_comments_number(); ?>
                                        </a></li>
                                    <li><a href="#"><span class="icon far fa-calendar"></span>
                                            <?php echo get_the_date(); ?>
                                        </a></li>
                                </ul>
                            </div>

                            <?php if (has_post_thumbnail()) { ?>
                            <div class="upper">
                                <div class="image-box">
                                    <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                </div>
                            </div>
                            <?php
        }?>

                            <div class="lower">
                                <div class="text">
                                    <?php the_content(); ?>
                                </div>
                            </div>

                            <div class="lower-info clearfix">
                                <div class="related-tags">
                                    <ul class="clearfix">
                                        <li><span class="fa fa-tags"></span> Tags :</li>
                                        <li>
                                            <?php the_tags('', ', '); ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="share-post">
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="author-box">
                        <div class="inner-box">
                            <figure class="thumb"><img
                                    src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>" alt="">
                            </figure>
                            <h5>
                                <?php the_author(); ?>
                            </h5>
                            <div class="link"><a
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">View
                                    all posts</a></div>
                            <div class="text">
                                <?php the_author_meta('description'); ?>
                            </div>
                            <div class="follow-me">
                                <ul class="clearfix">
                                    <?php $fb = get_the_author_meta('facebook');
        if ($fb): ?>
                                    <li><a href="<?php echo esc_url($fb); ?>"><span
                                                 class="fab fa-facebook-f"></span></a></li>
                                    <?php
        endif; ?>
                                    <?php $tw = get_the_author_meta('twitter');
        if ($tw): ?>
                                    <li><a href="<?php echo esc_url($tw); ?>"><span class="fab fa-twitter"></span></a>
                                    </li>
                                    <?php
        endif; ?>
                                    <?php $li = get_the_author_meta('linkedin');
        if ($li): ?>
                                    <li><a href="<?php echo esc_url($li); ?>"><span
                                                class="fab fa-linkedin-in"></span></a></li>
                                    <?php
        endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="post-controls">
                        <div class="inner clearfix">
                            <?php $prev = get_previous_post();
        if ($prev) { ?>
                            <div class="prev-post">
                                <a href="<?php echo esc_url(get_permalink($prev->ID)); ?>">
                                    <?php if (has_post_thumbnail($prev->ID)) {
                echo get_the_post_thumbnail($prev->ID, 'thumbnail');
            }?>
                                    <div class="upper-title"><span class="icon fa fa-caret-left"></span>&ensp; Prev Post
                                    </div>
                                    <span class="txt">
                                        <?php echo esc_html(get_the_title($prev->ID)); ?>
                                    </span>
                                </a>
                            </div>
                            <?php
        }
        $next = get_next_post();
        if ($next) { ?>
                            <div class="next-post">
                                <a href="<?php echo esc_url(get_permalink($next->ID)); ?>">
                                    <?php if (has_post_thumbnail($next->ID)) {
                echo get_the_post_thumbnail($next->ID, 'thumbnail');
            }?>
                                    <div class="upper-title">Next Post &ensp;<span
                                            class="icon fa fa-caret-right"></span></div>
                                    <span class="txt">
                                        <?php echo esc_html(get_the_title($next->ID)); ?>
                                    </span>
                                </a>
                            </div>
                            <?php
        }?>
                        </div>
                    </div>

                    <div class="comments-area">
                        <?php comments_template(); ?>
                    </div>

                    <?php
    }
}?>
                </div>
            </div>

            <?php if ($sidebar_enabled && $sidebar_pos == 'right') { ?>
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <?php get_template_part('template-parts/sidebar', 'blog'); ?>
            </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php
mthan_render_page_sections('after');
mthan_render_global_sections('after', 'blog');
get_footer();