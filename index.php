<?php get_header(); ?>

<main id="site-content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-content"><?php the_excerpt(); ?></div>
    </article>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'No posts found.', 'my-theme' ); ?></p>
<?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
