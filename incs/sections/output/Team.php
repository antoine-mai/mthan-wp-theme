<?php defined('ABSPATH') || exit;

/**
 * Render the Team section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Team_html($section_data) { ?>
<?php
    $slug = 'Team';
    $left_leaf   = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'left_leaf'));
    $right_leaf  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'right_leaf'));
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $btn_text    = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link    = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="team-section">
    <?php if ($left_leaf) { ?>
    <div class="left-leaf"><img src="<?php echo esc_url($left_leaf); ?>" alt="leaf"></div>
    <?php } ?>
    <?php if ($right_leaf) { ?>
    <div class="right-leaf"><img src="<?php echo esc_url($right_leaf); ?>" alt="leaf"></div>
    <?php } ?>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <?php if ($title_icon) { ?>
                <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($title_icon); ?>" alt="icon"></span></div>
                <?php } ?>
                <?php if ($subtitle) { ?>
                <div class="subtitle"><?php echo esc_html($subtitle); ?></div>
                <?php } ?>
                <?php if ($title) { ?>
                <h2><?php echo wp_kses_post($title); ?></h2>
                <?php } ?>
            </div>
            <?php if ($btn_text) { ?>
            <div class="link-box">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four">
                    <span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span>
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="team-box">
            <div class="row clearfix">
                <?php foreach ($items as $item) { 
                    $name  = isset($item['name']) ? $item['name'] : '';
                    $desig = isset($item['designation']) ? $item['designation'] : '';
                    $phone = isset($item['phone']) ? $item['phone'] : '';
                    $img   = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                    $lnk   = mthan_get_link(isset($item['link']) ? $item['link'] : '');
                ?>
                <!--Team block-->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <?php if ($img) { ?>
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="lower">
                            <?php if ($phone) { ?>
                            <div class="phone">
                                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>"><span class="icon flaticon-headphones"></span>Phone: <?php echo esc_html($phone); ?></a>
                            </div>
                            <?php } ?>
                            <?php if ($name) { ?>
                            <h5><a href="<?php echo esc_url($lnk); ?>"><?php echo esc_html($name); ?></a></h5>
                            <?php } ?>
                            <?php if ($desig) { ?>
                            <div class="designation"><?php echo esc_html($desig); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php }
