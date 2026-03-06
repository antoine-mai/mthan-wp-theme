<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
?>
    <!-- Main Footer -->
    <footer class="main-footer">

        <!--Upper Section-->
        <div class="upper-section">
            <?php if (!empty($theme_options['footer_1_bg_left']['url'])) : ?>
            <div class="left-image"><img src="<?php echo esc_url($theme_options['footer_1_bg_left']['url']); ?>" alt=""></div>
            <?php endif; ?>
            <?php if (!empty($theme_options['footer_1_bg_right']['url'])) : ?>
            <div class="right-image"><img src="<?php echo esc_url($theme_options['footer_1_bg_right']['url']); ?>" alt=""></div>
            <?php endif; ?>
            
            <div class="auto-container">

                <div class="upper">
                    <div class="inner">
                        <div class="logo">
                            <?php if (!empty($theme_options['footer_logo']['url'])) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($theme_options['footer_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>"></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/footer-logo.png" alt="<?php bloginfo('name'); ?>"></a>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix">
                            <div class="text-box">
                                <?php if (!empty($theme_options['footer_about_text'])) : ?>
                                <div class="text"><?php echo esc_html($theme_options['footer_about_text']); ?> 
                                    <?php if (!empty($theme_options['footer_about_btn_text'])) : ?>
                                    <a href="<?php echo esc_url($theme_options['footer_about_btn_url'] ?? '#'); ?>" class="theme-btn"><?php echo esc_html($theme_options['footer_about_btn_text']); ?> <i class="arrow flaticon-play-button-1"></i></a>
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
                                    <h4><?php echo esc_html($theme_options['footer_1_services_title'] ?? 'Main Services'); ?></h4>
                                </div>
                                <div class="widget-content">
                                    <?php if (!empty($theme_options['footer_1_services']) && is_array($theme_options['footer_1_services'])) : ?>
                                    <div class="row clearfix">
                                        <?php 
                                        $services_count = count($theme_options['footer_1_services']);
                                        $half = ceil($services_count / 2);
                                        $col1 = array_slice($theme_options['footer_1_services'], 0, $half);
                                        $col2 = array_slice($theme_options['footer_1_services'], $half);
                                        ?>
                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                                            <ul>
                                                <?php foreach ($col1 as $s) : ?>
                                                <li><a href="<?php echo esc_url($s['url'] ?? '#'); ?>">
                                                    <?php if (!empty($s['icon'])) : ?><img src="<?php echo esc_url($s['icon']); ?>" alt="" class="icon" style="width:20px;margin-right:15px;"><?php endif; ?>
                                                    <span class="txt"><?php echo esc_html($s['title'] ?? ''); ?></span>
                                                    <span class="sub-txt"><?php echo esc_html($s['link_text'] ?? 'Details'); ?> <i class="arrow flaticon-play-button-1"></i></span>
                                                </a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12">
                                            <ul>
                                                <?php foreach ($col2 as $s) : ?>
                                                <li><a href="<?php echo esc_url($s['url'] ?? '#'); ?>">
                                                    <?php if (!empty($s['icon'])) : ?><img src="<?php echo esc_url($s['icon']); ?>" alt="" class="icon" style="width:20px;margin-right:15px;"><?php endif; ?>
                                                    <span class="txt"><?php echo esc_html($s['title'] ?? ''); ?></span>
                                                    <span class="sub-txt"><?php echo esc_html($s['link_text'] ?? 'Details'); ?> <i class="arrow flaticon-play-button-1"></i></span>
                                                </a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php endif; ?>
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
                                <button type="submit" class="theme-btn btn-style-three"><span class="btn-title"><?php echo esc_html($theme_options['footer_newsletter_title'] ?? 'Subscribe Us'); ?> <i class="arrow flaticon-play-button-1"></i></span></button>
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
