<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>
<div class="inner-box">
    <div class="upper">
        <?php if (has_post_thumbnail()) : ?>
        <div class="image-box">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <?php endif; ?>
        <div class="info clearfix">
            <?php 
            $categories = get_the_category();
            if (!empty($categories)) : ?>
            <div class="cat"><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a></div>
            <?php endif; ?>
            <div class="date"><span class="icon far fa-calendar"></span> <?php echo get_the_date(); ?></div>
        </div>
        <div class="hvr-link theme-btn"><a href="<?php the_permalink(); ?>"><span class="flaticon-cross"></span></a></div>
    </div>
    <div class="lower">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <div class="post-meta">
            <ul class="clearfix">
                <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><span class="icon far fa-user"></span> <?php the_author(); ?></a></li>
                <li><a href="<?php comments_link(); ?>"><span class="icon far fa-comment"></span> Comments: <?php echo get_comments_number(); ?></a></li>
            </ul>
        </div>
        <div class="more-link"><a href="<?php the_permalink(); ?>"><span class="icon flaticon-right-arrow"></span></a></div>
    </div>
</div>
