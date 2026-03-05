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
        <div class="share-it">
            <span class="theme-btn share-icon flaticon-share-1"></span>
            <div class="share-list">
                <ul class="clearfix">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><span class="fab fa-twitter"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="lower">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <div class="text"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></div>
        <div class="post-meta">
            <ul class="clearfix">
                <li class="author"><span class="thumb"><?php echo get_avatar(get_the_author_meta('ID'), 50); ?></span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">By: <?php the_author(); ?></a></li>
                <li><a href="<?php comments_link(); ?>"><span class="icon far fa-comment"></span> Comments: <?php echo get_comments_number(); ?></a></li>
            </ul>
        </div>
        <div class="more-link"><a href="<?php the_permalink(); ?>"><span class="icon flaticon-right-arrow"></span></a></div>
    </div>
</div>
