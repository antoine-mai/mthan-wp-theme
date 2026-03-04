<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
?>
    <!-- Main Footer -->
    <footer class="main-footer">

        <!--Upper Section-->
        <div class="upper-section">
            <div class="left-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/footer-left-image.png" alt=""></div>
            <div class="right-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/resource/footer-right-image.png" alt=""></div>
            
            <div class="auto-container">

                <div class="upper">
                    <div class="inner">
                        <div class="logo">
                            <?php if (!empty($theme_options['footer_1_logo']['url'])) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($theme_options['footer_1_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>"></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-logo.png" alt="<?php bloginfo('name'); ?>"></a>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix">
                            <div class="text-box">
                                <?php if (!empty($theme_options['footer_1_about_text'])) : ?>
                                <div class="text"><?php echo esc_html($theme_options['footer_1_about_text']); ?> 
                                    <?php if (!empty($theme_options['footer_1_about_btn_text'])) : ?>
                                    <a href="<?php echo esc_url($theme_options['footer_1_about_btn_url'] ?? '#'); ?>" class="theme-btn"><?php echo esc_html($theme_options['footer_1_about_btn_text']); ?> <i class="arrow flaticon-play-button-1"></i></a>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="social">
                                <ul class="clearfix">
                                    <?php if (!empty($theme_options['social_linkedin'])) : ?><li><a href="<?php echo esc_url($theme_options['social_linkedin']); ?>"><span class="fab fa-linkedin-in"></span></a></li><?php endif; ?>
                                    <?php if (!empty($theme_options['social_twitter'])) : ?><li><a href="<?php echo esc_url($theme_options['social_twitter']); ?>"><span class="fab fa-twitter"></span></a></li><?php endif; ?>
                                    <?php if (!empty($theme_options['social_facebook'])) : ?><li><a href="<?php echo esc_url($theme_options['social_facebook']); ?>"><span class="fab fa-facebook-f"></span></a></li><?php endif; ?>
                                    <?php if (!empty($theme_options['social_instagram'])) : ?><li><a href="<?php echo esc_url($theme_options['social_instagram']); ?>"><span class="fab fa-instagram"></span></a></li><?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Widgets-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget info-widget">
                                <div class="widget-title">
                                    <h4>Get In Touch</h4>
                                </div>
                                <ul class="info">
                                    <?php if (!empty($theme_options['contact_address'])) : ?>
                                    <li class="address"><?php echo nl2br(esc_html($theme_options['contact_address'])); ?></li>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($theme_options['contact_hours'])) : ?>
                                    <li class="timing">
                                        Opening Hrs: <br><?php echo nl2br(esc_html($theme_options['contact_hours'])); ?>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <li>
                                        <?php if (!empty($theme_options['contact_phone'])) : ?>
                                        <span class="phone"><a href="tel:<?php echo esc_attr($theme_options['contact_phone']); ?>"><?php echo esc_html($theme_options['contact_phone']); ?></a></span><br>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($theme_options['contact_email'])) : ?>
                                        <span class="email"><a href="mailto:<?php echo esc_attr($theme_options['contact_email']); ?>"><?php echo esc_html($theme_options['contact_email']); ?></a></span>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-6 col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget services-widget">
                                <div class="widget-title">
                                    <h4>Main Services</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="row clearfix">
                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                                            <ul>
                                                <li><a href="#"><span class="icon flaticon-hedge"></span><span class="txt">Spring Cleanup</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                                <li><a href="#"><span class="icon flaticon-digging-1"></span><span class="txt">Plants Planting</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                                <li><a href="#"><span class="icon flaticon-sprinkler"></span><span class="txt">Water Fountain</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                                            <ul>
                                                <li><a href="#"><span class="icon flaticon-painting"></span><span class="txt">Hardscaping</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                                <li><a href="#"><span class="icon flaticon-wheelbarrow"></span><span class="txt">Garden Care</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                                <li><a href="#"><span class="icon flaticon-terrain"></span><span class="txt">Soil Preparation</span><span class="sub-txt">Details <i class="arrow flaticon-play-button-1"></i></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="column col-xl-3 col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h4>Quick Links</h4>
                                </div>
                                <div class="widget-content">
                                    <?php 
                                    if(has_nav_menu('footer-quick-links')) {
                                        wp_nav_menu(array(
                                            'theme_location' => 'footer-quick-links',
                                            'container' => false,
                                            'menu_class' => 'links',
                                            'fallback_cb' => false
                                        ));
                                    } else {
                                        echo '<ul class="links">
                                            <li><a href="#">About Company</a></li>
                                            <li><a href="#">Projects</a></li>
                                            <li><a href="#">Testimonials</a></li>
                                            <li><a href="#">News & Updates</a></li>
                                            <li><a href="#">Working Process</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer-widget newsletter-widget">
                    <!--Newsletter-->
                    <div class="newsletter-form">
                        <form method="post" action="#">
                            <div class="form-group clearfix">
                                <input type="text" name="name" value="" placeholder="Your Name *" required>
                                <input type="email" name="email" value="" placeholder="Email Address *" required>
                                <button type="submit" class="theme-btn btn-style-three"><span class="btn-title">Subscribe Us <i class="arrow flaticon-play-button-1"></i></span></button>
                            </div>
                        </form>
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
