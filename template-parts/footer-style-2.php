<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
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
                                    <?php if (!empty($theme_options['footer_2_logo']['url'])) : ?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($theme_options['footer_2_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>"></a>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-logo-two.png" alt="<?php bloginfo('name'); ?>"></a>
                                    <?php endif; ?>
                                </div>
                                <div class="text-box">
                                    <?php if (!empty($theme_options['footer_2_about_text'])) : ?>
                                    <div class="text"><?php echo esc_html($theme_options['footer_2_about_text']); ?></div>
                                    <?php endif; ?>
                                    <?php if (!empty($theme_options['footer_2_about_btn_text'])) : ?>
                                    <div class="link"><a href="<?php echo esc_url($theme_options['footer_2_about_btn_url'] ?? '#'); ?>" class="theme-btn"><?php echo esc_html($theme_options['footer_2_about_btn_text']); ?> <i class="arrow flaticon-play-button-1"></i></a></div>
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
                                            <?php 
                                            if(has_nav_menu('footer-quick-links-left')) {
                                                wp_nav_menu(array(
                                                    'theme_location' => 'footer-quick-links-left',
                                                    'container' => false,
                                                    'menu_class' => 'links',
                                                    'fallback_cb' => false
                                                ));
                                            } else {
                                                echo '<ul class="links">
                                                    <li><a href="#">Company</a></li>
                                                    <li><a href="#">Projects</a></li>
                                                    <li><a href="#">Testimonials</a></li>
                                                    <li><a href="#">News </a></li>
                                                    <li><a href="#">Process</a></li>
                                                    <li><a href="#">Contact Us</a></li>
                                                </ul>';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <?php 
                                            if(has_nav_menu('footer-quick-links-right')) {
                                                wp_nav_menu(array(
                                                    'theme_location' => 'footer-quick-links-right',
                                                    'container' => false,
                                                    'menu_class' => 'links',
                                                    'fallback_cb' => false
                                                ));
                                            } else {
                                                echo '<ul class="links">
                                                    <li><a href="#">Services</a></li>
                                                    <li><a href="#">Awards</a></li>
                                                    <li><a href="#">Pricing Plan</a></li>
                                                    <li><a href="#">Faq’s</a></li>
                                                    <li><a href="#">Products</a></li>
                                                    <li><a href="#">Policies</a></li>
                                                </ul>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="footer-widget newsletter-box">
                                <div class="widget-title">
                                    <h4>Subscribe Us</h4>
                                </div>
                                <div class="subscribe-box">
                                    <?php if (!empty($theme_options['footer_2_newsletter_text'])) : ?>
                                    <div class="text"><?php echo esc_html($theme_options['footer_2_newsletter_text']); ?></div>
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
                    <div class="copyright"><?php echo wp_kses_post($theme_options['footer_copyright_text'] ?? 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.'); ?></div>
                    <div class="bottom-links">
                        <?php 
                        if(has_nav_menu('footer-bottom-links')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-bottom-links',
                                'container' => false,
                                'menu_class' => 'clearfix',
                                'fallback_cb' => false
                            ));
                        } else {
                            echo '<ul class="clearfix">
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </footer>
