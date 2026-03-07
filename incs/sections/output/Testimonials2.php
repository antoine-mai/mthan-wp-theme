<?php defined('ABSPATH') || exit;

/**
 * Render the Testimonials 2 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Testimonials2_html($section_data) { ?>
<?php
    $slug = 'Testimonials2';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());
    $thumbs      = mthan_get_section_val($slug, $section_data, 'thumbs', array());

    if (empty($items)) return;
?>
<section class="testimonials-two">
    <div class="pattern-layer"></div>
    <div class="auto-container">

        <div class="row clearfix">
            <!--Column-->
            <div class="carousel-col col-lg-6 col-md-12 col-sm-12">
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
                <div class="carousel-box">
                    <div class="testimonial-carousel-two owl-theme owl-carousel">

                        <?php foreach ($items as $item) { 
                            $name   = isset($item['name']) ? $item['name'] : '';
                            $region = isset($item['region']) ? $item['region'] : '';
                            $rating = isset($item['rating']) ? $item['rating'] : '5';
                            $tit    = isset($item['title']) ? $item['title'] : '';
                            $text   = isset($item['text']) ? $item['text'] : '';
                        ?>
                        <!--Block-->
                        <div class="testi-block-two">
                            <div class="inner-box">
                                <div class="content">
                                    <div class="info">
                                        <div class="quote-icon"><span></span></div>
                                        <div class="rating">
                                            <?php 
                                                $full_stars = floor($rating);
                                                $half_star  = ($rating - $full_stars) >= 0.5;
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $full_stars) {
                                                        echo '<span class="fa fa-star"></span>';
                                                    } elseif ($half_star && $i == ($full_stars + 1)) {
                                                        echo '<span class="fa fa-star-half-alt"></span>';
                                                    } else {
                                                        echo '<span class="far fa-star"></span>';
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <?php if ($tit) { ?>
                                        <h6 class="title"><?php echo esc_html($tit); ?></h6>
                                        <?php } ?>
                                    </div>
                                    <?php if ($text) { ?>
                                    <div class="text"><?php echo wp_kses_post($text); ?></div>
                                    <?php } ?>
                                    <div class="author">
                                        <?php if ($name) { ?>
                                        <span class="name"><?php echo esc_html($name); ?>,</span>
                                        <?php } ?>
                                        <?php if ($region) { ?>
                                        <span class="region"><?php echo esc_html($region); ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <!--Column-->
            <div class="thumbs-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <?php foreach ($thumbs as $thumb) { 
                        $t_img = mthan_sec_img(isset($thumb['image']) ? $thumb['image'] : '');
                        if (!$t_img) continue;
                    ?>
                    <div class="image-thumb">
                        <div class="image"><img src="<?php echo esc_url($t_img); ?>" alt="thumb"></div>
                        <div class="icon"><span class="fa fa-quote-left"></span></div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php }
