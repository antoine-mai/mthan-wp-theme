<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the testimonials section instance.
 * @return array
 */
function mthan_section_testimonials_options()
{
    return array(
        array(
            'id'    => 'testimonials_style',
            'type'  => 'select',
            'title' => 'Testimonials Style',
            'options' => array(
                'style-1' => 'Style 1 (Full Width Carousel)',
                'style-2' => 'Style 2 (Split Layout)',
            ),
            'default' => 'style-1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Testimonials',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'What Our Clients Say',
        ),
        array(
            'id'    => 'sec_desc',
            'type'  => 'textarea',
            'title' => 'Description (Style 1)',
            'dependency' => array('testimonials_style', '==', 'style-1'),
        ),
        array(
            'id'     => 'testimonials_repeater',
            'type'   => 'group',
            'title'  => 'Testimonials List',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Author Image',
                ),
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'    => 'region',
                    'type'  => 'text',
                    'title' => 'Region/Location',
                ),
                array(
                    'id'    => 'rating',
                    'type'  => 'select',
                    'title' => 'Rating',
                    'options' => array(
                        '5' => '5 Stars',
                        '4.5' => '4.5 Stars',
                        '4' => '4 Stars',
                        '3.5' => '3.5 Stars',
                        '3' => '3 Stars',
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
        ),
        array(
            'id'     => 'decorative_thumbs',
            'type'   => 'group',
            'title'  => 'Decorative Thumbs (Style 2)',
            'max'    => 4,
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Thumb Image',
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
 **/
function mthan_section_testimonials_html($section_data) {
    $style       = isset($section_data['testimonials_style']) ? $section_data['testimonials_style'] : 'style-1';
    
    if ($style === 'style-2') {
        mthan_section_testimonials_html_2($section_data);
        return;
    }

    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $sec_desc     = isset($section_data['sec_desc']) ? $section_data['sec_desc'] : '';
    $testimonials = isset($section_data['testimonials_repeater']) ? $section_data['testimonials_repeater'] : array();
?>
<section class="testimonials-one alt-color">
    <div class="auto-container">
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
                        <div class="title-icon"><span class="icon"><img src="images/icons/leaf-four.png" alt="" title=""></span></div>
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
                <?php foreach($testimonials as $item): 
                    $img    = isset($item['image']) ? $item['image'] : '';
                    $name   = isset($item['name']) ? $item['name'] : '';
                    $region = isset($item['region']) ? $item['region'] : '';
                    $rating = isset($item['rating']) ? $item['rating'] : '5';
                    $text   = isset($item['text']) ? $item['text'] : '';
                ?>
                <!--Block-->
                <div class="testi-block">
                    <div class="inner-box">
                        <div class="content">
                            <div class="quote-icon"><span></span></div>
                            <div class="image"><img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>"></div>
                            <h6 class="name"><?php echo esc_html($name); ?></h6>
                            <div class="region"><?php echo esc_html($region); ?></div>
                            <div class="rating">
                                <?php 
                                    $full_stars = floor($rating);
                                    $has_half   = ($rating - $full_stars) >= 0.5;
                                    for($i=1; $i<=5; $i++){
                                        if($i <= $full_stars){
                                            echo '<span class="fa fa-star"></span>';
                                        } elseif($has_half && $i == $full_stars + 1){
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php 
}

/**
 * Render Style 2 (Split Layout)
 */
function mthan_section_testimonials_html_2($section_data) {
    $sec_title    = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $testimonials = isset($section_data['testimonials_repeater']) ? $section_data['testimonials_repeater'] : array();
    $decorative   = isset($section_data['decorative_thumbs']) ? $section_data['decorative_thumbs'] : array();
?>
<section class="testimonials-two">
    <div class="pattern-layer"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Column-->
            <div class="carousel-col col-lg-6 col-md-12 col-sm-12">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                    <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                    <h2><?php echo esc_html($sec_title); ?></h2>
                </div>
                <div class="carousel-box">
                    <div class="testimonial-carousel-two owl-theme owl-carousel">
                        <?php foreach($testimonials as $item): 
                            $name   = isset($item['name']) ? $item['name'] : '';
                            $region = isset($item['region']) ? $item['region'] : '';
                            $rating = isset($item['rating']) ? $item['rating'] : '5';
                            $title  = isset($item['title']) ? $item['title'] : '';
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
                                                $has_half   = ($rating - $full_stars) >= 0.5;
                                                for($i=1; $i<=5; $i++){
                                                    if($i <= $full_stars){
                                                        echo '<span class="fa fa-star"></span>';
                                                    } elseif($has_half && $i == $full_stars + 1){
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!--Column-->
            <div class="thumbs-col col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <?php foreach($decorative as $thumb): 
                        $img = isset($thumb['image']) ? $thumb['image'] : '';
                        if($img):
                    ?>
                    <div class="image-thumb">
                        <div class="image"><img src="<?php echo esc_url($img); ?>" alt="testimonial thumb"></div>
                        <div class="icon"><span class="fa fa-quote-left"></span></div>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
