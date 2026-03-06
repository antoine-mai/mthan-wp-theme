<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the testimonials section instance.
 * @return array
 */
function mthan_section_testimonials_options()
{
    return array(
        array(
            'id'      => 'testimonials_style',
            'type'    => 'select',
            'title'   => 'Testimonials Style',
            'options' => array(
                'style-1' => 'Style 1 (Full Width Carousel)',
                'style-2' => 'Style 2 (Split Layout)',
            ),
            'default' => 'style-1',
        ),
        array(
            'id'      => 'testi_sec_subtitle',
            'type'    => 'text',
            'title'   => 'Subtitle',
            'default' => 'Our Testimonials',
        ),
        array(
            'id'      => 'testi_sec_title',
            'type'    => 'text',
            'title'   => 'Title',
            'default' => 'What Our Clients Say',
        ),
        array(
            'id'         => 'sec_desc',
            'type'       => 'textarea',
            'title'      => 'Description (Style 1)',
            'default'    => 'Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system.',
            'dependency' => array('testimonials_style', '==', 'style-1'),
        ),
        array(
            'id'      => 'testimonials_repeater',
            'type'    => 'group',
            'title'   => 'Testimonials List',
            'fields'  => array(
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'      => 'image',
                    'type'    => 'media',
                    'library' => 'image',
                    'preview' => false,
                    'title'   => 'Author Image',
                ),
                array(
                    'id'    => 'region',
                    'type'  => 'text',
                    'title' => 'Region/Location',
                ),
                array(
                    'id'      => 'rating',
                    'type'    => 'select',
                    'title'   => 'Rating',
                    'options' => array(
                        '5'   => '5 Stars',
                        '4.5' => '4.5 Stars',
                        '4'   => '4 Stars',
                        '3.5' => '3.5 Stars',
                        '3'   => '3 Stars',
                    ),
                    'default' => '5',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Testimonial Title (Style 2)',
                ),
                array(
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Testimonial Text',
                ),
            ),
            'default' => array(
                array(
                    'name'   => 'Robert Anderson',
                    'region' => 'New York, USA',
                    'rating' => '5',
                    'title'  => 'Outstanding Garden Service!',
                    'text'   => 'Must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system.',
                ),
                array(
                    'name'   => 'Maria Santos',
                    'region' => 'Los Angeles, USA',
                    'rating' => '5',
                    'title'  => 'Professional & Reliable Team',
                    'text'   => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC making it over 2000 years old.',
                ),
                array(
                    'name'   => 'James Collins',
                    'region' => 'Chicago, USA',
                    'rating' => '4.5',
                    'title'  => 'Transformed Our Backyard',
                    'text'   => 'There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form by injected humour.',
                ),
                array(
                    'name'   => 'Sarah O\'Connor',
                    'region' => 'San Francisco, USA',
                    'rating' => '5',
                    'title'  => 'Highly Recommended',
                    'text'   => 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.',
                ),
            ),
        ),
        array(
            'id'         => 'decorative_thumbs',
            'type'       => 'group',
            'title'      => 'Decorative Thumbs (Style 2)',
            'max'        => 4,
            'fields'     => array(
                array(
                    'id'      => 'image',
                    'type'    => 'media',
                    'library' => 'image',
                    'preview' => false,
                    'title'   => 'Thumb Image',
                ),
            ),
            'dependency' => array('testimonials_style', '==', 'style-2'),
        ),
    );
}

/**
 * Render the testimonials section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_testimonials_html($section_data)
{
    $style = isset($section_data['testimonials_style']) ? $section_data['testimonials_style'] : 'style-1';

    if ($style === 'style-2') {
        mthan_section_testimonials_html_2($section_data);
        return;
    }

    $sec_title    = !empty($section_data['testi_sec_title'])              ? $section_data['testi_sec_title']              : 'Guarantee Success';
    $sec_subtitle = !empty($section_data['testi_sec_subtitle'])           ? $section_data['testi_sec_subtitle']           : 'Testimonials';
    $sec_desc     = !empty($section_data['testi_sec_desc'])               ? $section_data['testi_sec_desc']               : 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.';
    $testimonials = !empty($section_data['testimonials_repeater'])  ? $section_data['testimonials_repeater']  : array();

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
    $sec_title    = !empty($section_data['testi_sec_title'])             ? $section_data['testi_sec_title']             : 'What Our Clients Say';
    $sec_subtitle = !empty($section_data['testi_sec_subtitle'])          ? $section_data['testi_sec_subtitle']          : 'Our Testimonials';
    $testimonials = !empty($section_data['testimonials_repeater']) ? $section_data['testimonials_repeater'] : array();
    $decorative   = !empty($section_data['decorative_thumbs'])     ? $section_data['decorative_thumbs']     : array();

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
