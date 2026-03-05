<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

/**
 * Render the error-section section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_error_section_html($section_data) {
<section class="error-section">
        <div class="image-layer" style="background-image: url(images/background/bg-404.jpg);"></div>

        <div class="auto-container">
            <div class="error-image">
                <img src="images/resource/404-image.png" alt="" title="">
            </div>

            <div class="content-box">
                <h4>Oops! Page Not Found.</h4>
                <div class="text">It looks like nothing was found at this location. Maybe try one of the  links below or a search?</div>
                <div class="link-box">
                    <a href="index.html" class="theme-btn btn-style-four"><span class="btn-title">Back to Home <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>
        </div>
    </section>
}
