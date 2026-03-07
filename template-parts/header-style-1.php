<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
$theme_options = get_option('mthan_theme_options');
?>
<header class="main-header">
    <?php if (!empty($theme_options['header_topbar'])) { ?>
    <div class="header-top">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="top-left">
                    <?php if (!empty($theme_options['header_1_tip_text'])) { ?>
                    <div class="tip-link">
                        <a href="<?php echo esc_url($theme_options['header_1_tip_link'] ?? '#'); ?>">
                            <span class="icon flaticon-play-button-1"></span> 
                            <?php echo esc_html($theme_options['header_1_tip_text']); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="social-links">
                        <ul class="clearfix">
                            <?php if (!empty($theme_options['social_facebook'])) { ?>
                            <li>
                                <a href="<?php echo esc_url($theme_options['social_facebook']); ?>">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_twitter'])) { ?>
                            <li>
                                <a href="<?php echo esc_url($theme_options['social_twitter']); ?>">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_instagram'])) { ?>
                            <li>
                                <a href="<?php echo esc_url($theme_options['social_instagram']); ?>">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_youtube'])) { ?>
                            <li>
                                <a href="<?php echo esc_url($theme_options['social_youtube']); ?>">
                                    <span class="fab fa-youtube"></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="top-right">
                    <div class="top-links">
                        <ul class="clearfix">
                            <?php if (!empty($theme_options['contact_hours'])) { ?>
                            <li>
                                <span class="icon flaticon-fast"></span>
                                <?php echo esc_html($theme_options['contact_hours']); ?>
                            </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['contact_address'])) { ?>
                            <li>
                                <span class="icon flaticon-placeholder-3"></span>
                                <?php echo esc_html($theme_options['contact_address']); ?>
                            </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['contact_email'])) { ?>
                            <li>
                                <a href="mailto:<?php echo esc_attr($theme_options['contact_email']); ?>">
                                    <span class="icon flaticon-envelope-1"></span>
                                    <?php echo esc_html($theme_options['contact_email']); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
                        <?php 
                        $logo_url = mthan_get_img_url($theme_options['header_logo'] ?? '', get_template_directory_uri() . '/assets/images/logo.png');
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>
                </div>
                <div class="other-links clearfix">
                    <div class="info">
                        <div class="info-icon">
                            <span class="flaticon-smartphone"></span>
                        </div>
                        <div class="phone">
                            <a href="tel:<?php echo esc_attr($theme_options['contact_phone'] ?? ''); ?>">
                                <?php echo esc_html($theme_options['contact_phone'] ?? ''); ?>
                            </a>
                        </div>
                        <div class="call">
                            <?php echo esc_html($theme_options['header_1_callback_text'] ?? 'Get Call Back'); ?> 
                            <span class="icon flaticon-play-button-1"></span>
                        </div>
                    </div>
                    <div class="search-box">
                        <form method="get" action="<?php echo esc_url(!empty($theme_options['default_search_page']) ? get_permalink($theme_options['default_search_page']) : home_url('/')); ?>">
                            <div class="form-group">
                                <div class="field-box">
                                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="Keyword ..." required="">
                                </div>
                                <div class="btn-box"><button type="submit" class="search-btn"><span class="flaticon-search-1"></span></button></div>
                            </div>
                        </form>
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
                    <div class="mobile-nav-toggler">
                        <span class="icon flaticon-menu-1"></span>
                    </div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <!-- Custom Menu Placeholder -->
                        </div>
                    </nav>
                </div>

                <div class="more-links clearfix">
                    <!-- <div class="cart-btn"><a href="#"><span class="flaticon-shopping-bag-2"></span></a></div> WooCommerce Cart optionally -->
                    <?php if (!empty($theme_options['header_1_btn_text'])) { ?>
                    <div class="estimate-btn">
                        <a href="<?php echo esc_url($theme_options['header_1_btn_url'] ?? '#'); ?>">
                            <span class="icon flaticon-business-1"></span>
                            <?php echo esc_html($theme_options['header_1_btn_text']); ?> 
                            <span class="arrow flaticon-play-button-1"></span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Lower-->

    <?php if (!empty($theme_options['header_sticky'])) { ?>
    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <?php 
                $sticky_logo_url = mthan_get_img_url($theme_options['header_sticky_logo'] ?? '', get_template_directory_uri() . '/assets/images/sticky-logo.png');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                    <img src="<?php echo esc_url($sticky_logo_url); ?>" alt="<?php bloginfo('name'); ?>" />
                </a>
            </div>
            <!--Right Col-->
            <div class="pull-right clearfix">
                <!-- Main Menu -->
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->

                <?php if (!empty($theme_options['header_1_btn_text'])) { ?>
                <!--Contact Btn-->
                <div class="contact-link">
                    <a href="<?php echo esc_url($theme_options['header_1_btn_url'] ?? '#'); ?>" class="theme-btn btn-style-three">
                        <span class="btn-title">
                            <?php echo esc_html($theme_options['header_1_btn_text']); ?> 
                            <i class="arrow flaticon-play-button-1"></i>
                        </span>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div><!-- End Sticky Menu -->
    <?php } ?>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn">
            <span class="icon flaticon-letter-x"></span>
        </div>
        
        <nav class="menu-box">
            <div class="nav-logo">
                <?php 
                $nav_logo_url = mthan_get_img_url($theme_options['header_nav_logo'] ?? '', get_template_directory_uri() . '/assets/images/nav-logo.png');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($nav_logo_url); ?>" alt="" title="" />
                </a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <?php if (!empty($theme_options['social_facebook'])) { ?>
                    <li>
                        <a href="<?php echo esc_url($theme_options['social_facebook']); ?>">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (!empty($theme_options['social_twitter'])) { ?>
                    <li>
                        <a href="<?php echo esc_url($theme_options['social_twitter']); ?>">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (!empty($theme_options['social_instagram'])) { ?>
                    <li>
                        <a href="<?php echo esc_url($theme_options['social_instagram']); ?>">
                            <span class="fab fa-instagram"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (!empty($theme_options['social_youtube'])) { ?>
                    <li>
                        <a href="<?php echo esc_url($theme_options['social_youtube']); ?>">
                            <span class="fab fa-youtube"></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->
</header>
