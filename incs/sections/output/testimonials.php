<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Render the testimonials section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_testimonials_html($section_data)
{
    $slug = 'testimonials';
    $style = mthan_get_section_val($slug, $section_data, 'testimonials_style', 'style-1');
    $sec_title    = mthan_get_section_val($slug, $section_data, 'title', 'Guarantee Success');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Testimonials');
    $sec_desc     = mthan_get_section_val($slug, $section_data, 'sec_desc', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $testimonials = mthan_get_section_val($slug, $section_data, 'testimonials_repeater', array());

    if ($style === 'style-2') {
        mthan_section_testimonials_html_2($section_data);
        return;
    }

    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-3.jpg',
    );
?>
<section class="testimonials-one alt-color">
    <div class="auto-container">
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
                        <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-four.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                        <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                        <h2><?php echo esc_html($sec_title); ?></h2>
                    </div>
                </div>
                <div class="right-col col-xl-6 col-lg-12 col-md-12">
                    <div class="text"><?php echo esc_html($sec_desc); ?></div>
                </div>
            </div>
        </div>

        <div class="carousel-box">
            <div class="testimonial-carousel owl-theme owl-carousel">
                <?php foreach ($testimonials as $i => $item) {
                    $img    = !empty($item['image']['url']) ? $item['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                    $name   = !empty($item['name'])   ? $item['name']   : '';
                    $region = !empty($item['region']) ? $item['region'] : '';
                    $rating = !empty($item['rating']) ? $item['rating'] : '5';
                    $text   = !empty($item['text'])   ? $item['text']   : '';
                ?>
                <!--Block-->
                <div class="testi-block">
                    <div class="inner-box">
                        <div class="content">
                            <div class="quote-icon"><span></span></div>
                            <div class="image"><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" title="<?php echo esc_attr($name); ?>"></div>
                            <h6 class="name"><?php echo esc_html($name); ?></h6>
                            <div class="region"><?php echo esc_html($region); ?></div>
                            <div class="rating">
                                <?php
                                $full_stars = floor($rating);
                                $has_half   = ($rating - $full_stars) >= 0.5;
                                for ($s = 1; $s <= 5; $s++) {
                                    if ($s <= $full_stars) {
                                        echo '<span class="fa fa-star"></span>';
                                    } elseif ($has_half && $s == $full_stars + 1) {
                                        echo '<span class="fa fa-star-half-alt"></span>';
                                        $has_half = false;
                                    } else {
                                        echo '<span class="far fa-star"></span>';
                                    }
                                }
                                ?>
                            </div>
                            <div class="text"><?php echo esc_html($text); ?></div>
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

/**
 * Render Style 2 (Split Layout)
 */
function mthan_section_testimonials_html_2($section_data)
{
    $slug = 'testimonials';
    $sec_title    = mthan_get_section_val($slug, $section_data, 'title', 'What Our Clients Say');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'subtitle', 'Our Testimonials');
    $testimonials = mthan_get_section_val($slug, $section_data, 'testimonials_repeater', array());
    $decorative   = mthan_get_section_val($slug, $section_data, 'decorative_thumbs', array());

    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-3.jpg',
        get_template_directory_uri() . '/assets/images/resource/testi-thumb-4.jpg',
    );
?>
<section class="testimonials-two">
    <div class="pattern-layer"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Column-->
            <div class="carousel-col col-lg-6 col-md-12 col-sm-12">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                    <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                    <h2><?php echo esc_html($sec_title); ?></h2>
                </div>
                <div class="carousel-box">
                    <div class="testimonial-carousel-two owl-theme owl-carousel">
                        <?php foreach ($testimonials as $item) {
                            $name   = !empty($item['name'])   ? $item['name']   : '';
                            $region = !empty($item['region']) ? $item['region'] : '';
                            $rating = !empty($item['rating']) ? $item['rating'] : '5';
                            $title  = !empty($item['title'])  ? $item['title']  : '';
                            $text   = !empty($item['text'])   ? $item['text']   : '';
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
                                            $has_half   = ($rating - $full_stars) >= 0.5;
                                            for ($s = 1; $s <= 5; $s++) {
                                                if ($s <= $full_stars) {
                                                    echo '<span class="fa fa-star"></span>';
                                                } elseif ($has_half && $s == $full_stars + 1) {
                                                    echo '<span class="fa fa-star-half-alt"></span>';
                                                    $has_half = false;
                                                } else {
                                                    echo '<span class="far fa-star"></span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <h6 class="title"><?php echo esc_html($title); ?></h6>
                                    </div>
                                    <div class="text"><?php echo esc_html($text); ?></div>
                                    <div class="author">
                                        <span class="name"><?php echo esc_html($name); ?>,</span>
                                        <span class="region"><?php echo esc_html($region); ?></span>
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
                    <?php foreach ($decorative as $j => $thumb) {
                        $img = !empty($thumb['image']['url']) ? $thumb['image']['url'] : $fallback_imgs[$j % count($fallback_imgs)];
                    ?>
                    <div class="image-thumb">
                        <div class="image"><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($sec_title . ' Thumbnail'); ?>" title="<?php echo esc_attr($sec_title); ?>"></div>
                        <div class="icon"><span class="fa fa-quote-left"></span></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
