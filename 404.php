<?php defined('ABSPATH') or die('Cheatin\' uh?');
get_header(); ?>

<section class="error-section">
    <div class="image-layer" style="background-image: url(<?php echo esc_url(get_template_directory_uri() . '/assets/images/background/bg-404.jpg'); ?>);"></div>
    <div class="auto-container">
        <div class="error-image">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/resource/404-image.png'); ?>" alt="" title="">
        </div>
        <div class="content-box">
            <h4>Oops! Page Not Found.</h4>
            <div class="text">It looks like nothing was found at this location. Maybe try one of the links below or a search?</div>
            <div class="link-box">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn btn-style-four">
                    <span class="btn-title">Back to Home <i class="arrow flaticon-play-button-1"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
