<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * 
**/
$theme_options      = get_option('mthan_theme_options');
$header_tabs        = !empty($theme_options['header_tabs']) ? $theme_options['header_tabs'] : [];
$social_links       = !empty($theme_options['social_links']) ? $theme_options['social_links'] : [];

// 1. Data URLs & Text
$tip_link           = mthan_get_link($header_tabs['header_1_tip_link'] ?? '/contact');
$callback_url       = mthan_get_link($header_tabs['header_1_callback_url'] ?? '/contact');
$btn_url            = mthan_get_link($header_tabs['header_1_btn_url'] ?? '#');
$btn_icon_url       = !empty($header_tabs['header_1_btn_icon']) ? mthan_get_img_url($header_tabs['header_1_btn_icon']) : '';
$search_placeholder = !empty($theme_options['search_placeholder']) ? $theme_options['search_placeholder'] : 'Keyword ...';
$search_action_url  = mthan_get_link($theme_options['default_search_page'] ?? home_url('/'));

// 2. Logo URLs
$logo_url           = mthan_get_img_url($header_tabs['header_logo'] ?? '', get_template_directory_uri() . '/assets/images/logo.png');
$sticky_logo_url    = mthan_get_img_url($header_tabs['header_sticky_logo'] ?? '', mthan_get_img_url($theme_options['logo'] ?? '', ''));
$nav_logo_url       = mthan_get_img_url(
    $header_tabs['mobile_menu_logo'] ?? '', 
    mthan_get_img_url(
        $header_tabs['header_nav_logo'] ?? '', 
        mthan_get_img_url(
            $header_tabs['header_logo'] ?? '', 
            mthan_get_img_url($theme_options['logo'] ?? '', '')
        )
    )
);

// 3. Menus
$menu_items = !empty($header_tabs['menu_items']) ? $header_tabs['menu_items'] : [];
?>
<header class="main-header header-style-one inner-header">
    <div class="header-top">
        <div class="auto-container">
            <div class="inner clearfix">
                <div class="top-left">
                    <?php if (!empty($header_tabs['header_1_tip_text'])) { ?>
                    <div class="tip-link">
                        <a href="<?php echo esc_url($tip_link); ?>">
                            <span class="icon flaticon-play-button-1"></span> 
                            <?php echo esc_html($header_tabs['header_1_tip_text']); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="social-links">
                        <ul class="clearfix">
                            <?php foreach ($social_links as $social) { if (empty($social['url']) || empty($social['icon'])) continue;
                                $icon_url = mthan_get_img_url($social['icon']);
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social['url']); ?>">
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($social['title'] ?? ''); ?>" style="width: 16px; height: 16px; object-fit: contain;">
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
    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
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
                            <a href="<?php echo esc_url($callback_url); ?>">
                                <?php echo esc_html($header_tabs['header_1_callback_text'] ?? 'Get Call Back'); ?> 
                                <span class="icon flaticon-play-button-1"></span>
                            </a>
                        </div>
                    </div>
                    <div class="search-box">
                        <form method="get" action="<?php echo esc_url($search_action_url); ?>">
                            <div class="form-group">
                                <div class="field-box">
                                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr($search_placeholder); ?>" required="" />
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
                            <ul class="navigation clearfix">
                                <?php 
                                foreach ($menu_items as $item) :
                                    $has_submenu = !empty($item['submenu']);
                                    $li_class = $has_submenu ? 'dropdown' : '';
                                    if (!empty($item['mega_menu'])) {
                                        $li_class .= ' megamenu';
                                    }
                                ?>
                                <li class="<?php echo esc_attr($li_class); ?>">
                                    <?php 
                                    $url = mthan_get_link($item['url'] ?? '#');
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($item['target'] ?? (is_array($item['url'] ?? null) ? ($item['url']['target'] ?? '_self') : '_self')); ?>">
                                        <?php echo esc_html($item['title'] ?? ''); ?>
                                    </a>
                                    <?php if ($has_submenu) : ?>
                                    <ul>
                                        <?php foreach ($item['submenu'] as $sub) : ?>
                                        <li>
                                            <?php 
                                            $sub_url = mthan_get_link($sub['url'] ?? '#');
                                            ?>
                                            <a href="<?php echo esc_url($sub_url); ?>" target="<?php echo esc_attr($sub['target'] ?? (is_array($sub['url'] ?? null) ? ($sub['url']['target'] ?? '_self') : '_self')); ?>">
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
                    <!-- <div class="cart-btn"><a href="#"><span class="flaticon-shopping-bag-2"></span></a></div> WooCommerce Cart optionally -->
                    <?php if (!empty($header_tabs['header_1_btn_text'])) { ?>
                    <div class="quote-btn">
                        <a href="<?php echo esc_url($btn_url); ?>">
                            <?php 
                            if ($btn_icon_url && (strpos($btn_icon_url, 'http') === 0 || strpos($btn_icon_url, '/') === 0)) : ?>
                                <img src="<?php echo esc_url($btn_icon_url); ?>" alt="">
                            <?php elseif ($btn_icon_url) : ?>
                                <i class="<?php echo esc_attr($btn_icon_url); ?>"></i>
                            <?php else : ?>
                                <span class="flaticon-smartphone icon-fallback"></span>
                            <?php endif; ?>
                            <span class="btn-text"><?php echo esc_html($header_tabs['header_1_btn_text']); ?></span> 
                        </a>
                    </div>
                    <?php } ?>
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

                <?php if (!empty($header_tabs['header_1_btn_text'])) { ?>
                <div class="contact-link">
                    <a href="<?php echo esc_url($btn_url); ?>" class="theme-btn btn-style-three">
                        <?php 
                        if ($btn_icon_url && (strpos($btn_icon_url, 'http') === 0 || strpos($btn_icon_url, '/') === 0)) : ?>
                            <img src="<?php echo esc_url($btn_icon_url); ?>" alt="">
                        <?php elseif ($btn_icon_url) : ?>
                            <i class="<?php echo esc_attr($btn_icon_url); ?>"></i>
                        <?php else : ?>
                            <span class="flaticon-smartphone icon-fallback"></span>
                        <?php endif; ?>
                        <span class="btn-title">
                            <?php echo esc_html($header_tabs['header_1_btn_text']); ?> 
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
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($nav_logo_url); ?>" alt="" title="" />
                </a>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <?php 
                    foreach ($social_links as $social) :
                        if (empty($social['url']) || empty($social['icon'])) continue;
                        $icon_url = mthan_get_img_url($social['icon']);
                    ?>
                        <li>
                            <a href="<?php echo esc_url($social['url']); ?>">
                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($social['title'] ?? ''); ?>" style="width: 16px; height: 16px; object-fit: contain;">
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->
</header>
