<?php defined('ABSPATH') || exit;

/**
 * Render the Testimonials 1 section.
 *
 * @param array $section_data CSF field values for this section instance.
 */
function mthan_section_Testimonials1_html($section_data) { ?>
<?php
    $slug = 'Testimonials1';
    $title_icon  = mthan_sec_img(mthan_get_section_val($slug, $section_data, 'title_icon'));
    $subtitle    = mthan_get_section_val($slug, $section_data, 'subtitle');
    $title       = mthan_get_section_val($slug, $section_data, 'title');
    $description = mthan_get_section_val($slug, $section_data, 'description');
    $items       = mthan_get_section_val($slug, $section_data, 'items', array());

    if (empty($items)) return;
?>
<section class="testimonials-one">
    <div class="auto-container">
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
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
                </div>
                <?php if ($description) { ?>
                <div class="right-col col-xl-6 col-lg-12 col-md-12">
                    <div class="text"><?php echo wp_kses_post($description); ?></div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="carousel-box">
            <div class="testimonial-carousel owl-theme owl-carousel">

                <?php foreach ($items as $item) { 
                    $name   = isset($item['name']) ? $item['name'] : '';
                    $region = isset($item['region']) ? $item['region'] : '';
                    $rating = isset($item['rating']) ? $item['rating'] : '5';
                    $text   = isset($item['text']) ? $item['text'] : '';
                    $img    = mthan_sec_img(isset($item['image']) ? $item['image'] : '');
                ?>
                <!--Block-->
                <div class="testi-block">
                    <div class="inner-box">
                        <div class="content">
                            <div class="quote-icon"><span></span></div>
                            <?php if ($img) { ?>
                            <div class="image"><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>"></div>
                            <?php } ?>
                            <?php if ($name) { ?>
                            <h6 class="name"><?php echo esc_html($name); ?></h6>
                            <?php } ?>
                            <?php if ($region) { ?>
                            <div class="region"><?php echo esc_html($region); ?></div>
                            <?php } ?>
                            
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
                            <?php if ($text) { ?>
                            <div class="text"><?php echo wp_kses_post($text); ?></div>
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
