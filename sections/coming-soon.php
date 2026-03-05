<?php defined('ABSPATH') or die('Cheatin\' uh?'); ?>

/**
 * Render the coming-soon section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_coming_soon_html($section_data) {
<section class="coming-soon">
        <div class="image-layer" style="background-image: url(images/background/bg-coming-soon.jpg);"></div>

        <div class="outer-container">
            <div class="content">
                <div class="content-inner">
                    <div class="auto-container">
                        <div class="logo-box">
                            <div class="logo"><a href="index.html" title="Pruners - Gardening and Landscaping HTML Template"><img src="images/white-logo.png" alt="Pruners - Gardening and Landscaping HTML Template" title="Pruners - Gardening and Landscaping HTML Template"></a></div>
                        </div>
                        <div class="big-text">We introduce something awesome in our work!.</div>
                        <h1>Coming Soon</h1>
                        <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/12/17"></div></div>

                        <div class="subscribe">
                            <div class="form-box">
                                <form method="post" action="contact.html">
                                    <div class="form-group clearfix">
                                        <input type="email" name="email" value="" placeholder="Email Address *" required>
                                        <span class="alt-icon far fa-envelope"></span>
                                        <button type="submit" class="theme-btn btn-style-three"><span class="btn-title">Subscribe <i class="arrow flaticon-play-button-1"></i></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
}
