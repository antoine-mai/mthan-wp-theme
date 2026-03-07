<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
?>
    <!-- Main Header -->
    <header class="main-header header-style-two">
        <?php if (!empty($theme_options['header_topbar'])) : ?>
        <div class="header-top-two">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="top-left">
                        <?php if (!empty($theme_options['header_2_quote_text'])) : ?>
                        <div class="quote-link"><?php echo esc_html($theme_options['header_2_quote_text']); ?> 
                            <?php if (!empty($theme_options['header_2_quote_btn_text'])) : ?>
                            <a href="<?php echo esc_url($theme_options['header_2_quote_btn_url'] ?? '#'); ?>"><?php echo esc_html($theme_options['header_2_quote_btn_text']); ?> <span class="icon flaticon-play-button-1"></span></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="top-right">
                        <div class="top-links">
                            <ul class="clearfix">
                                <?php if (!empty($theme_options['contact_address'])) : ?><li><span class="icon flaticon-placeholder-3"></span><?php echo esc_html($theme_options['contact_address']); ?></li><?php endif; ?>
                                <?php if (!empty($theme_options['contact_email'])) : ?><li><a href="mailto:<?php echo esc_attr($theme_options['contact_email']); ?>"><span class="icon flaticon-envelope-1"></span><?php echo esc_html($theme_options['contact_email']); ?></a></li><?php endif; ?>
                                <?php if (!empty($theme_options['contact_hours'])) : ?><li><span class="icon flaticon-fast"></span><?php echo esc_html($theme_options['contact_hours']); ?></li><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Header Upper -->
        <div class="header-upper-two">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo">
                            <?php if (!empty($theme_options['header_logo']['url'])) : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url($theme_options['header_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>"></a>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="iso">
                        <div class="iso-icon"><span class="icon"><img src="<?php echo !empty($theme_options['header_2_iso_image']['url']) ? esc_url($theme_options['header_2_iso_image']['url']) : esc_url(get_template_directory_uri() . '/assets/images/icons/iso-icon.png'); ?>" alt=""></span></div>
                        <div class="number"><?php echo esc_html($theme_options['header_2_iso_title'] ?? 'ISO 9001:2015'); ?></div>
                        <div class="txt"><?php echo esc_html($theme_options['header_2_iso_text'] ?? 'Certified Landscape Designer'); ?></div>
                    </div>

                    <div class="help clearfix">
                        <div class="info">
                            <div class="call-icon"><span class="flaticon-headphones-2"></span></div>
                            <div class="txt"><?php echo esc_html($theme_options['header_2_help_text'] ?? 'Need Help?'); ?></div>
                            <div class="phone"><a href="tel:<?php echo esc_attr($theme_options['contact_phone'] ?? ''); ?>"><?php echo esc_html($theme_options['contact_phone'] ?? ''); ?></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                         <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <?php 
                                $menu_id = !empty($theme_options['header_menu']) ? $theme_options['header_menu'] : '';
                                wp_nav_menu(array(
                                    'menu' => $menu_id,
                                    'container' => false,
                                    'menu_class' => 'navigation clearfix',
                                    'fallback_cb' => false
                                )); 
                                ?>
                            </div>
                        </nav>
                    </div>

                    <div class="more-links clearfix">
                        <!-- <div class="cart-btn"><a href="#"><span class="flaticon-shopping-bag-2"></span><i class="count">0</i></a></div> -->
                        <div class="social-links">
                            <ul class="clearfix">
                                <?php if (!empty($theme_options['social_facebook'])) : ?><li><a href="<?php echo esc_url($theme_options['social_facebook']); ?>"><span class="fab fa-facebook-f"></span><span class="t-tip-box"><span class="t-t-text">Facebook</span></span></a></li><?php endif; ?>
                                <?php if (!empty($theme_options['social_twitter'])) : ?><li><a href="<?php echo esc_url($theme_options['social_twitter']); ?>"><span class="fab fa-twitter"></span><span class="t-tip-box"><span class="t-t-text">Twitter</span></span></a></li><?php endif; ?>
                                <?php if (!empty($theme_options['social_instagram'])) : ?><li><a href="<?php echo esc_url($theme_options['social_instagram']); ?>"><span class="fab fa-instagram"></span><span class="t-tip-box"><span class="t-t-text">Instagram</span></span></a></li><?php endif; ?>
                                <?php if (!empty($theme_options['social_youtube'])) : ?><li><a href="<?php echo esc_url($theme_options['social_youtube']); ?>"><span class="fab fa-youtube"></span><span class="t-tip-box"><span class="t-t-text">Youtube</span></span></a></li><?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <?php if (!empty($theme_options['header_sticky'])) : ?>
        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <?php if (!empty($theme_options['header_sticky_logo']['url'])) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url($theme_options['header_sticky_logo']['url']); ?>" alt="<?php bloginfo('name'); ?>"></a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/sticky-logo.png" alt="<?php bloginfo('name'); ?>"></a>
                    <?php endif; ?>
                </div>
                <!--Right Col-->
                <div class="pull-right clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->

                    <?php if (!empty($theme_options['header_2_quote_btn_text'])) : ?>
                    <!--Contact Btn-->
                    <div class="contact-link">
                        <a href="<?php echo esc_url($theme_options['header_2_quote_btn_url'] ?? '#'); ?>" class="theme-btn btn-style-three"><span class="btn-title"><?php echo esc_html($theme_options['header_2_quote_btn_text']); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- End Sticky Menu -->
        <?php endif; ?>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-letter-x"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo">
                    <?php if (!empty($theme_options['header_nav_logo']['url'])) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($theme_options['header_nav_logo']['url']); ?>" alt="" title=""></a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/nav-logo.png" alt="" title=""></a>
                    <?php endif; ?>
                </div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
				<div class="social-links">
					<ul class="clearfix">
                        <?php if (!empty($theme_options['social_facebook'])) : ?><li><a href="<?php echo esc_url($theme_options['social_facebook']); ?>"><span class="fab fa-facebook-f"></span></a></li><?php endif; ?>
                        <?php if (!empty($theme_options['social_twitter'])) : ?><li><a href="<?php echo esc_url($theme_options['social_twitter']); ?>"><span class="fab fa-twitter"></span></a></li><?php endif; ?>
                        <?php if (!empty($theme_options['social_instagram'])) : ?><li><a href="<?php echo esc_url($theme_options['social_instagram']); ?>"><span class="fab fa-instagram"></span></a></li><?php endif; ?>
                        <?php if (!empty($theme_options['social_youtube'])) : ?><li><a href="<?php echo esc_url($theme_options['social_youtube']); ?>"><span class="fab fa-youtube"></span></a></li><?php endif; ?>
					</ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
