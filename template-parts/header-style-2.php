<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
/**
 * Template Name: Header Style 2
 * 
 * @package Mthan
 * @since 1.0.0
**/
$theme_options = get_option('mthan_theme_options');
$header_tabs = !empty($theme_options['header_tabs']) ? $theme_options['header_tabs'] : [];
?>
<header class="main-header header-style-two">
    <div class="header-top-two">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="top-left">
                    <?php if (!empty($header_tabs['header_2_quote_text'])) { ?>
                    <div class="quote-link">
                        <?php echo esc_html($header_tabs['header_2_quote_text']); ?> 
                        <?php if (!empty($header_tabs['header_2_quote_btn_text'])) { 
                             $quote_btn_url = !empty($header_tabs['header_2_quote_btn_url']) ? (is_numeric($header_tabs['header_2_quote_btn_url']) ? get_permalink($header_tabs['header_2_quote_btn_url']) : $header_tabs['header_2_quote_btn_url']) : '#';
                        ?>
                        <a href="<?php echo esc_url($quote_btn_url); ?>">
                            <?php echo esc_html($header_tabs['header_2_quote_btn_text']); ?>
                            <span class="icon flaticon-play-button-1"></span>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="top-right">
                    <div class="top-links">
                        <ul class="clearfix">
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
                            <?php if (!empty($theme_options['contact_hours'])) { ?>
                            <li>
                                <span class="icon flaticon-fast"></span>
                                <?php echo esc_html($theme_options['contact_hours']); ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Upper -->
    <div class="header-upper-two">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
                        <?php 
                        $logo_url = mthan_get_img_url($header_tabs['header_logo'] ?? '', get_template_directory_uri() . '/assets/images/logo.png');
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                    </div>
                </div>
                
                <div class="iso">
                    <div class="iso-icon">
                        <span class="icon">
                            <?php 
                            $iso_img_url = mthan_get_img_url($header_tabs['header_2_iso_image'] ?? '', get_template_directory_uri() . '/assets/images/icons/iso-icon.png');
                            ?>
                            <img src="<?php echo esc_url($iso_img_url); ?>" alt="">
                        </span>
                    </div>
                    <div class="number">
                        <?php echo esc_html($header_tabs['header_2_iso_title'] ?? 'ISO 9001:2015'); ?>
                    </div>
                    <div class="txt">
                        <?php echo esc_html($header_tabs['header_2_iso_text'] ?? 'Certified Landscape Designer'); ?>
                    </div>
                </div>

                <div class="help clearfix">
                    <div class="info">
                        <div class="call-icon">
                            <span class="flaticon-headphones-2"></span>
                        </div>
                        <div class="txt">
                            <?php echo esc_html($header_tabs['header_2_help_text'] ?? 'Need Help?'); ?>
                        </div>
                        <div class="phone">
                            <a href="tel:<?php echo esc_attr($theme_options['contact_phone'] ?? ''); ?>">
                                <?php echo esc_html($theme_options['contact_phone'] ?? ''); ?>
                            </a>
                        </div>
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
                            <ul class="navigation clearfix">
                                <?php 
                                $menu_items = !empty($header_tabs['menu_items']) ? $header_tabs['menu_items'] : [];
                                foreach ($menu_items as $item) :
                                    $has_submenu = !empty($item['submenu']);
                                    $li_class = $has_submenu ? 'dropdown' : '';
                                    if (!empty($item['mega_menu'])) {
                                        $li_class .= ' megamenu';
                                    }
                                ?>
                                <li class="<?php echo esc_attr($li_class); ?>">
                                    <?php 
                                    $url = !empty($item['url']) ? (is_numeric($item['url']) ? get_permalink($item['url']) : $item['url']) : '#';
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($item['target'] ?? '_self'); ?>">
                                        <?php echo esc_html($item['title'] ?? ''); ?>
                                    </a>
                                    <?php if ($has_submenu) : ?>
                                    <ul>
                                        <?php foreach ($item['submenu'] as $sub) : ?>
                                        <li>
                                            <?php 
                                            $sub_url = !empty($sub['url']) ? (is_numeric($sub['url']) ? get_permalink($sub['url']) : $sub['url']) : '#';
                                            ?>
                                            <a href="<?php echo esc_url($sub_url); ?>" target="<?php echo esc_attr($sub['target'] ?? '_self'); ?>">
                                                <?php echo esc_html($sub['title'] ?? ''); ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="more-links clearfix">
                    <!-- <div class="cart-btn"><a href="#"><span class="flaticon-shopping-bag-2"></span><i class="count">0</i></a></div> -->
                    <div class="social-links">
                        <ul class="clearfix">
                            <?php if (!empty($theme_options['social_facebook'])) { ?>
                                <li>
                                    <a href="<?php echo esc_url($theme_options['social_facebook']); ?>">
                                        <span class="fab fa-facebook-f"></span>
                                        <span class="t-tip-box">
                                            <span class="t-t-text">Facebook</span>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_twitter'])) { ?>
                                <li>
                                    <a href="<?php echo esc_url($theme_options['social_twitter']); ?>">
                                        <span class="fab fa-twitter"></span>
                                        <span class="t-tip-box">
                                            <span class="t-t-text">Twitter</span>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_instagram'])) { ?>
                                <li>
                                    <a href="<?php echo esc_url($theme_options['social_instagram']); ?>">
                                        <span class="fab fa-instagram"></span>
                                        <span class="t-tip-box">
                                            <span class="t-t-text">Instagram</span>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($theme_options['social_youtube'])) { ?>
                                <li>
                                    <a href="<?php echo esc_url($theme_options['social_youtube']); ?>">
                                        <span class="fab fa-youtube"></span>
                                        <span class="t-tip-box">
                                            <span class="t-t-text">Youtube</span>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Lower-->

    <?php if (!empty($header_tabs['header_sticky'])) { ?>
    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <?php 
                $sticky_logo_url = mthan_get_img_url($header_tabs['header_sticky_logo'] ?? '', get_template_directory_uri() . '/assets/images/sticky-logo.png');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                    <img src="<?php echo esc_url($sticky_logo_url); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            </div>
            <!--Right Col-->
            <div class="pull-right clearfix">
                <!-- Main Menu -->
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav><!-- Main Menu End-->

                <?php if (!empty($header_tabs['header_2_quote_btn_text'])) { ?>
                <!--Contact Btn-->
                <div class="contact-link">
                    <?php 
                    $quote_btn_url = !empty($header_tabs['header_2_quote_btn_url']) ? (is_numeric($header_tabs['header_2_quote_btn_url']) ? get_permalink($header_tabs['header_2_quote_btn_url']) : $header_tabs['header_2_quote_btn_url']) : '#';
                    ?>
                    <a href="<?php echo esc_url($quote_btn_url); ?>" class="theme-btn btn-style-three">
                        <span class="btn-title">
                            <?php echo esc_html($header_tabs['header_2_quote_btn_text']); ?> 
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
                $nav_logo_url = mthan_get_img_url($header_tabs['header_nav_logo'] ?? '', get_template_directory_uri() . '/assets/images/nav-logo.png');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($nav_logo_url); ?>" alt="" title="">
                </a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
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
