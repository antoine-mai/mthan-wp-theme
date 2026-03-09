<?php defined('ABSPATH') or die('Cheatin\' uh?'); 
/**
 * Footer Style 2
**/
$theme_options = get_option('mthan_theme_options');
$footer_tabs   = $theme_options['footer_tabs'] ?? [];

$general_logo      = $theme_options['logo'] ?? '';
$footer_logo_url   = mthan_get_img_url($footer_tabs['footer_logo'] ?? '', mthan_get_img_url($general_logo, get_template_directory_uri() . '/assets/images/footer-logo-two.png'));
$about_text        = $footer_tabs['footer_about_text'] ?? '';
$about_btn_text    = $footer_tabs['footer_about_btn_text'] ?? '';
$about_btn_url     = mthan_get_link($footer_tabs['footer_about_btn_url'] ?? '#');

$opening_label     = $footer_tabs['footer_2_opening_label'] ?? 'Opening Hrs:';

$newsletter_title  = $footer_tabs['footer_newsletter_title'] ?? 'Subscribe Us';
$newsletter_desc   = $footer_tabs['footer_2_newsletter_text'] ?? '';

$links_title       = $footer_tabs['footer_2_links_title'] ?? 'Quick Links';
$links_items_1     = $footer_tabs['footer_2_links_1'] ?? [];
$links_items_2     = $footer_tabs['footer_2_links_2'] ?? [];

$social_label      = $footer_tabs['footer_2_social_label'] ?? 'Follow Us On:';

$copyright_text    = $footer_tabs['footer_copyright_text'] ?? 'Copyright &copy; ' . date('Y') . ' All Rights Reserved by Pruners.';
$bottom_links      = $footer_tabs['footer_bottom_links'] ?? [];
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
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>" />
                                </a>
                            </div>
                            <div class="text-box">
                                <?php if (!empty($about_text)) { ?>
                                <div class="text">
                                    <?php echo esc_html($about_text); ?>
                                </div>
                                <?php } ?>
                                <?php if (!empty($about_btn_text)) { ?>
                                <div class="link">
                                    <a href="<?php echo esc_url($about_btn_url); ?>" class="theme-btn">
                                        <?php echo esc_html($about_btn_text); ?>
                                        <i class="arrow flaticon-play-button-1"></i>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if (!empty($theme_options['contact_hours'])) { ?>
                            <div class="hours">
                                <span class="icon flaticon-clock"></span>
                                <?php echo esc_html($opening_label); ?> <br>
                                <?php echo nl2br(esc_html($theme_options['contact_hours'])); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h4><?php echo esc_html($links_title); ?></h4>
                            </div>
                            <div class="widget-content">
                                <div class="row clearfix">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <?php if (!empty($links_items_1)) { ?>
                                        <ul class="links">
                                            <?php foreach ($links_items_1 as $li) { ?>
                                            <li>
                                                <a href="<?php echo esc_url(mthan_get_link($li['url'] ?? '#')); ?>">
                                                    <?php echo esc_html($li['title'] ?? ''); ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                        <?php if (!empty($links_items_2)) { ?>
                                        <ul class="links">
                                            <?php foreach ($links_items_2 as $li) { ?>
                                            <li>
                                                <a href="<?php echo esc_url(mthan_get_link($li['url'] ?? '#')); ?>">
                                                    <?php echo esc_html($li['title'] ?? ''); ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
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
                                        <?php if (!empty($social_label)) { ?>
                                        <li>
                                            <?php echo esc_html($social_label); ?>
                                        </li>
                                        <?php } ?>
                                        <?php if (!empty($theme_options['social_links'])) { foreach ($theme_options['social_links'] as $social) { ?>
                                        <?php
                                            $s_url   = mthan_get_link($social['url'] ?? '#');
                                            $s_title = !empty($social['title']) ? $social['title'] : '';
                                            $s_icon  = !empty($social['icon']) ? mthan_get_img_url($social['icon']) : '';
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url($s_url); ?>">
                                                <?php if ($s_icon) { ?>
                                                <img src="<?php echo esc_url($s_icon); ?>" alt="<?php echo esc_attr($s_title); ?>" style="width: 16px; height: auto; vertical-align: middle;">
                                                <?php } else { ?>
                                                <span class="fab fa-<?php echo strtolower(esc_attr($s_title)); ?>"></span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                        <?php } } ?>
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
                    <?php if (!empty($bottom_links)) : ?>
                    <ul class="clearfix">
                        <?php foreach ($bottom_links as $bl) : ?>
                        <li><a href="<?php echo esc_url(mthan_get_link($bl['url'] ?? '#')); ?>"><?php echo esc_html($bl['title'] ?? ''); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</footer>
