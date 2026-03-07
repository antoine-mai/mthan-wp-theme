<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the team section — Style 1 (Grid) or dispatch to Style 2.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_team_html($section_data)
{
    $slug = 'team';
    $style = mthan_get_section_val($slug, $section_data, 'team_style', 'style-1');
    $sec_title = mthan_get_section_val($slug, $section_data, 'title', 'Professional Team');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Our Gardeners');
    $btn_text = mthan_get_section_val($slug, $section_data, 'btn_text', 'All Members');
    $btn_link = mthan_sec_link($slug, $section_data, 'btn_link', '#');
    $team_repeater = mthan_get_section_val($slug, $section_data, 'team_repeater', array());

    if ($style === 'style-2') {
        mthan_section_team_html_2($section_data);
        return;
    }

    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/team-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/team-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/team-3.jpg',
    );
?>
<section class="team-section">
    <div class="left-leaf"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/leaf-2.png"
            alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></div>
    <div class="right-leaf"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/leaf-3.png"
            alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></div>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <div class="title-icon">
                    <span class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png"
                            alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>">
                    </span>
                </div>
                <div class="subtitle">
                    <?php echo esc_html($sec_subtitle); ?>
                </div>
                <h2>
                    <?php echo esc_html($sec_title); ?>
                </h2>
            </div>
            <?php if ($btn_text) { ?>
            <div class="link-box">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four"><span class="btn-title">
                        <?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i>
                    </span></a>
            </div>
            <?php
    }?>
        </div>

        <div class="team-box">
            <div class="row clearfix">
                <?php foreach ($team_repeater as $i => $member) {
        $img = !empty($member['image']['url']) ? $member['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
        $name = !empty($member['name']) ? $member['name'] : '';
        $des = !empty($member['designation']) ? $member['designation'] : '';
        $phone = !empty($member['phone']) ? $member['phone'] : '';
        $fb = !empty($member['facebook']) ? $member['facebook'] : '';
        $tw = !empty($member['twitter']) ? $member['twitter'] : '';
        $inst = !empty($member['instagram']) ? $member['instagram'] : '';
?>
                <!--Team block-->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>"
                                    title="<?php echo esc_attr($name); ?>">
                                <div class="social-box">
                                    <ul class="clearfix">
                                        <?php if ($fb) { ?>
                                        <li><a href="<?php echo esc_url($fb); ?>"><span
                                                    class="fab fa-facebook-f"></span></a></li>
                                        <?php
        }?>
                                        <?php if ($tw) { ?>
                                        <li><a href="<?php echo esc_url($tw); ?>"><span
                                                    class="fab fa-twitter"></span></a></li>
                                        <?php
        }?>
                                        <?php if ($inst) { ?>
                                        <li><a href="<?php echo esc_url($inst); ?>"><span
                                                    class="fab fa-instagram"></span></a></li>
                                        <?php
        }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="lower">
                            <?php if ($phone) { ?>
                            <div class="phone">
                                <a href="tel:<?php echo esc_attr($phone); ?>"><span
                                        class="icon flaticon-headphones"></span>Phone:
                                    <?php echo esc_html($phone); ?>
                                </a>
                            </div>
                            <?php
        }?>
                            <h5><a href="#">
                                    <?php echo esc_html($name); ?>
                                </a></h5>
                            <div class="designation">
                                <?php echo esc_html($des); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
    }?>
            </div>
        </div>
    </div>
</section>
<?php
}

/**
 * Render Style 2 (Carousel)
 */
function mthan_section_team_html_2($section_data)
{
    $slug = 'team';
    $sec_title = mthan_get_section_val($slug, $section_data, 'title', 'Professional Team');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Our Gardeners');
    $team_repeater = mthan_get_section_val($slug, $section_data, 'team_repeater', array());

    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-3.jpg',
    );
?>
<section class="team-two">
    <div class="auto-container">
        <div class="sec-title">
            <div class="title-icon">
                <span class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>" />
                </span>
            </div>
            <div class="subtitle">
                <?php echo esc_html($sec_subtitle); ?>
            </div>
            <h2>
                <?php echo esc_html($sec_title); ?>
            </h2>
        </div>

        <div class="team-box">
            <div class="team-carousel owl-theme owl-carousel">
                <?php foreach ($team_repeater as $i => $member) { ?>
                <?php
                    $img = !empty($member['image']['url']) ? $member['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                    $name = !empty($member['name']) ? $member['name'] : '';
                    $des = !empty($member['designation']) ? $member['designation'] : '';
                    $phone = !empty($member['phone']) ? $member['phone'] : '';
                    $fb = !empty($member['facebook']) ? $member['facebook'] : '';
                    $tw = !empty($member['twitter']) ? $member['twitter'] : '';
                    $inst = !empty($member['instagram']) ? $member['instagram'] : '';
                ?>
                <!--Team block-->
                <div class="team-block-two">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" title="<?php echo esc_attr($name); ?>" />
                            </div>
                        </div>
                        <div class="lower">
                            <div class="designation">
                                <?php echo esc_html($des); ?>
                            </div>
                            <h5>
                                <a href="#">
                                    <?php echo esc_html($name); ?>
                                </a>
                            </h5>
                            <div class="phone-box">
                                <?php if ($phone) { ?>
                                <a href="<?php echo (strpos($phone, '@') !== false) ? 'mailto:' . esc_attr($phone) : 'tel:' . esc_attr($phone); ?>" class="phone">
                                    <span class="icon <?php echo (strpos($phone, '@') !== false) ? 'flaticon-envelope-1' : 'flaticon-headphones'; ?>"></span>
                                    <?php echo esc_html($phone); ?>
                                </a>
                                <?php } ?>
                                <div class="share-it">
                                    <span class="theme-btn share-icon flaticon-share-1"></span>
                                    <div class="share-list">
                                        <ul class="clearfix">
                                            <?php if ($fb) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($fb); ?>">
                                                    <span class="fab fa-facebook-f"></span>
                                                </a>
                                            </li>
                                            <?php }?>
                                            <?php if ($tw) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($tw); ?>">
                                                    <span class="fab fa-twitter"></span>
                                                </a>
                                            </li>
                                            <?php }?>
                                            <?php if ($inst) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($inst); ?>">
                                                    <span class="fab fa-instagram"></span>
                                                </a>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php
}