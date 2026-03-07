<?php defined('ABSPATH') || exit;

/**
 * Render the History section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_History_html($section_data) { ?>
<?php
    $slug = 'History';
    
    // MVG (Items & Description)
    $mvg_items      = mthan_get_section_val($slug, $section_data, 'mvg_items', array());
    $mvg_desc_items = mthan_get_section_val($slug, $section_data, 'mvg_desc_items', array());
    
    // History Timeline
    $history_items  = mthan_get_section_val($slug, $section_data, 'history_items', array());
    
    // Bottom Link
    $btn_text       = mthan_get_section_val($slug, $section_data, 'btn_text');
    $btn_link       = mthan_get_link(mthan_get_section_val($slug, $section_data, 'btn_link'));
?>
<section class="mvg-history">
    <!-- MVG Box -->
    <div class="mvg">
        <div class="auto-container">
            <div class="mvg-box">
                <div class="row clearfix">

                    <!-- MVG Columns (Images & Title) -->
                    <div class="mvg-col col-xl-9 col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <?php foreach ($mvg_items as $item) { 
                                $img    = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                                $sub    = isset($item['subtitle']) ? $item['subtitle'] : '';
                                $title  = isset($item['title']) ? $item['title'] : '';
                                $letter = isset($item['letter']) ? $item['letter'] : '';
                            ?>
                            <div class="mvg-block col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <?php if ($img) { ?>
                                    <div class="image-box">
                                        <img src="<?php echo esc_url($img); ?>" alt="mvg image">
                                    </div>
                                    <?php } ?>
                                    <div class="lower-box">
                                        <?php if ($sub) { ?>
                                        <div class="subtitle"><span><?php echo esc_html($sub); ?></span></div>
                                        <?php } ?>
                                        <?php if ($title) { ?>
                                        <h5><?php echo esc_html($title); ?></h5>
                                        <?php } ?>
                                        <?php if ($letter) { ?>
                                        <div class="letter"><?php echo esc_html($letter); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Description Carousel -->
                    <div class="description-col col-xl-3 col-lg-12 col-md-12 col-sm-12">
                        <div class="carousel-box">
                            <div class="mvg-carousel owl-theme owl-carousel">
                                <?php foreach ($mvg_desc_items as $desc) { 
                                    $desc_title = isset($desc['title']) ? $desc['title'] : '';
                                    $desc_icon  = isset($desc['icon']) ? $desc['icon'] : 'flaticon-bullseye';
                                    $desc_text  = isset($desc['text']) ? $desc['text'] : '';
                                    $desc_ltxt  = isset($desc['link_text']) ? $desc['link_text'] : 'Continue Reading';
                                    $desc_lurl  = mthan_get_link(isset($desc['link_url']) ? $desc['link_url'] : '#');
                                ?>
                                <div class="desc-block">
                                    <div class="inner">
                                        <div class="fade-icon"><span class="<?php echo esc_attr($desc_icon); ?>"></span></div>
                                        <div class="icon-box"><span class="<?php echo esc_attr($desc_icon); ?>"></span></div>
                                        <?php if ($desc_title) { ?>
                                        <h5><?php echo esc_html($desc_title); ?></h5>
                                        <?php } ?>
                                        <?php if ($desc_text) { ?>
                                        <div class="text"><?php echo wp_kses_post($desc_text); ?></div>
                                        <?php } ?>
                                        <div class="link">
                                            <a href="<?php echo esc_url($desc_lurl); ?>" class="theme-btn">
                                                <?php echo esc_html($desc_ltxt); ?> <i class="arrow flaticon-play-button-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- History Box (Timeline) -->
    <div class="history-box">
        <div class="auto-container">
            <?php if (!empty($history_items)) { ?>
            <div class="carousel-box">
                <div class="history-carousel owl-theme owl-carousel">
                    <?php foreach ($history_items as $h_item) { 
                        $year    = isset($h_item['year']) ? $h_item['year'] : '';
                        $h_title = isset($h_item['title']) ? $h_item['title'] : '';
                        $h_text  = isset($h_item['text']) ? $h_item['text'] : '';
                    ?>
                    <div class="history-block">
                        <div class="inner">
                            <?php if ($year) { ?>
                            <div class="date">
                                <div class="date-inner"><span><?php echo esc_html($year); ?></span></div>
                            </div>
                            <?php } ?>
                            <?php if ($h_title) { ?>
                            <h5><?php echo esc_html($h_title); ?></h5>
                            <?php } ?>
                            <?php if ($h_text) { ?>
                            <div class="text"><?php echo wp_kses_post($h_text); ?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

            <?php if ($btn_text) { ?>
            <div class="see-all">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn">
                    <?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

</section>
<?php }
