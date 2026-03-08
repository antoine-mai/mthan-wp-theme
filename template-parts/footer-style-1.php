<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
$footer_tabs   = $theme_options['footer_tabs'] ?? [];

$bg_left_url       = mthan_get_img_url($footer_tabs['footer_1_bg_left'] ?? '');
$bg_right_url      = mthan_get_img_url($footer_tabs['footer_1_bg_right'] ?? '');
$footer_logo_url   = mthan_get_img_url($footer_tabs['footer_logo'] ?? '', get_template_directory_uri() . '/assets/images/footer-logo.png');
$about_text        = $footer_tabs['footer_about_text'] ?? '';
$about_btn_text    = $footer_tabs['footer_about_btn_text'] ?? '';
$about_btn_url     = $footer_tabs['footer_about_btn_url'] ?? '#';
$newsletter_title  = $footer_tabs['footer_newsletter_title'] ?? 'Subscribe Us';
$services_title    = $footer_tabs['footer_1_services_title'] ?? 'Main Services';
$services_items    = $footer_tabs['footer_1_services'] ?? [];
$copyright_text    = $footer_tabs['footer_copyright_text'] ?? 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.';
?>
    <!-- Main Footer -->
    <footer class="main-footer">

        <!--Upper Section-->
        <div class="upper-section">
            <?php if (!empty($bg_left_url)) : ?>
            <div class="left-image">
                <img src="<?php echo esc_url($bg_left_url); ?>" alt="">
            </div>
            <?php endif; ?>
            <?php if (!empty($bg_right_url)) : ?>
            <div class="right-image">
                <img src="<?php echo esc_url($bg_right_url); ?>" alt="">
            </div>
            <?php endif; ?>
            
            <div class="auto-container">

                <div class="upper">
                    <div class="inner">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>"></a>
                        </div>
                        <div class="clearfix">
                            <div class="text-box">
                                <?php if (!empty($about_text)) : ?>
                                <div class="text"><?php echo esc_html($about_text); ?> 
                                    <?php if (!empty($about_btn_text)) : ?>
                                    <a href="<?php echo esc_url($about_btn_url); ?>" class="theme-btn"><?php echo esc_html($about_btn_text); ?> <i class="arrow flaticon-play-button-1"></i></a>
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
                                    <h4><?php echo esc_html($services_title); ?></h4>
                                </div>
                                <div class="widget-content">
                                    <?php if (!empty($services_items) && is_array($services_items)) : ?>
                                    <div class="row clearfix">
                                        <?php 
                                        $services_count = count($services_items);
                                        $half = ceil($services_count / 2);
                                        $col1 = array_slice($services_items, 0, $half);
                                        $col2 = array_slice($services_items, $half);
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
                                    <ul class="links">
                                        <li><a href="#">About Company</a></li>
                                        <li><a href="#">Projects</a></li>
                                        <li><a href="#">Testimonials</a></li>
                                        <li><a href="#">News & Updates</a></li>
                                        <li><a href="#">Working Process</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
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
                                <button type="submit" class="theme-btn btn-style-three"><span class="btn-title"><?php echo esc_html($newsletter_title); ?> <i class="arrow flaticon-play-button-1"></i></span></button>
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
