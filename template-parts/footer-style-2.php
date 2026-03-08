<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
$footer_tabs   = $theme_options['footer_tabs'] ?? [];

$footer_logo_url   = mthan_get_img_url($footer_tabs['footer_logo'] ?? '', get_template_directory_uri() . '/assets/images/footer-logo-two.png');
$about_text        = $footer_tabs['footer_about_text'] ?? '';
$about_btn_text    = $footer_tabs['footer_about_btn_text'] ?? '';
$about_btn_url     = $footer_tabs['footer_about_btn_url'] ?? '#';
$newsletter_title  = $footer_tabs['footer_newsletter_title'] ?? 'Subscribe Us';
$newsletter_desc   = $footer_tabs['footer_2_newsletter_text'] ?? '';
$copyright_text    = $footer_tabs['footer_copyright_text'] ?? 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.';
?>
    <!-- Main Footer -->
    <footer class="main-footer footer-two">

        <!--Upper Section-->
        <div class="upper-section">
            <div class="auto-container">

                <!--Widgets-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Column-->
                        <div class="column col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="footer-widget about">
                                <div class="logo">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>"></a>
                                </div>
                                <div class="text-box">
                                    <?php if (!empty($about_text)) : ?>
                                    <div class="text"><?php echo esc_html($about_text); ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($about_btn_text)) : ?>
                                    <div class="link"><a href="<?php echo esc_url($about_btn_url); ?>" class="theme-btn"><?php echo esc_html($about_btn_text); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($theme_options['contact_hours'])) : ?>
                                <div class="hours">
                                    <span class="icon flaticon-clock"></span>
                                    Opening Hrs: <br><?php echo nl2br(esc_html($theme_options['contact_hours'])); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Quick Links</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="row clearfix">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <ul class="links">
                                                <li><a href="#">Company</a></li>
                                                <li><a href="#">Projects</a></li>
                                                <li><a href="#">Testimonials</a></li>
                                                <li><a href="#">News </a></li>
                                                <li><a href="#">Process</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <ul class="links">
                                                <li><a href="#">Services</a></li>
                                                <li><a href="#">Awards</a></li>
                                                <li><a href="#">Pricing Plan</a></li>
                                                <li><a href="#">Faq’s</a></li>
                                                <li><a href="#">Products</a></li>
                                                <li><a href="#">Policies</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="footer-widget newsletter-box">
                                <div class="widget-title">
                                    <h4><?php echo esc_html($newsletter_title); ?></h4>
                                </div>
                                <div class="subscribe-box">
                                    <?php if (!empty($newsletter_desc)) : ?>
                                    <div class="text"><?php echo esc_html($newsletter_desc); ?></div>
                                    <?php endif; ?>
                                    <!--Newsletter-->
                                    <div class="newsletter">
                                        <form method="post" action="#">
                                            <div class="form-group clearfix">
                                                <input type="email" name="email" value="" placeholder="Email Address *" required>
                                                <span class="alt-icon far fa-envelope"></span>
                                                <button type="submit" class="theme-btn"><span class="flaticon-right-arrow-1"></span></button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="follow">
                                        <ul class="clearfix">
                                            <li>Follow Us On:</li>
                                            <?php if (!empty($theme_options['social_facebook'])) : ?><li><a href="<?php echo esc_url($theme_options['social_facebook']); ?>"><span class="fab fa-facebook-f"></span></a></li><?php endif; ?>
                                            <?php if (!empty($theme_options['social_twitter'])) : ?><li><a href="<?php echo esc_url($theme_options['social_twitter']); ?>"><span class="fab fa-twitter"></span></a></li><?php endif; ?>
                                            <?php if (!empty($theme_options['social_linkedin'])) : ?><li><a href="<?php echo esc_url($theme_options['social_linkedin']); ?>"><span class="fab fa-linkedin-in"></span></a></li><?php endif; ?>
                                            <?php if (!empty($theme_options['social_instagram'])) : ?><li><a href="<?php echo esc_url($theme_options['social_instagram']); ?>"><span class="fab fa-instagram"></span></a></li><?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="copyright"><?php echo wp_kses_post($copyright_text); ?></div>
                    <div class="bottom-links">
                        <ul class="clearfix">
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>
