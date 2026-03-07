<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * The Index file.
 * This theme requires a static page to be configured as the homepage.
 * Please go to Settings > Reading and set "A static page" for your homepage.
 */

get_header(); ?>

<section class="error-section">
    <div class="auto-container">
        <div class="content">
            <h1>Configuration Required</h1>
            <p>Please configure a static page to be used as your homepage.</p>
            <div class="btn-box">
                <a href="<?php echo admin_url('options-reading.php'); ?>" class="theme-btn btn-style-one">
                    <span class="txt">Go to Settings > Reading</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>