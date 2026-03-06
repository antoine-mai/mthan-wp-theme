<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the reviews section instance.
 * @return array
 */
function mthan_section_reviews_options()
{
    return array(
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Feedback',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Happy Customers',
        ),
        array(
            'id'    => 'review_form_title',
            'type'  => 'text',
            'title' => 'Form Title',
            'default' => 'We Happy to Hear Your Feedback',
        ),
        array(
            'id'    => 'review_form_text',
            'type'  => 'text',
            'title' => 'Form Text',
            'default' => 'Keep the feedback to 200 words or less.',
        ),
        array(
            'id'    => 'avg_rating',
            'type'  => 'text',
            'title' => 'Average Rating',
            'default' => '4.5',
        ),
        array(
            'id'    => 'review_count',
            'type'  => 'text',
            'title' => 'Review Count Text',
            'default' => '[24 Reviews]',
        ),
        array(
            'id'     => 'reviews_repeater',
            'type'   => 'group',
            'title'  => 'Reviews List',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'preview' => false,
                    'title' => 'Large Image',
                ),
                array(
                    'id'    => 'thumb',
                    'type'  => 'upload',
                    'preview' => false,
                    'title' => 'Author Thumbnail',
                ),
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'    => 'region',
                    'type'  => 'text',
                    'title' => 'Region',
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
                    'id'    => 'text',
                    'type'  => 'textarea',
                    'title' => 'Feedback Text',
                ),
                array(
                    'id'    => 'video_url',
                    'type'  => 'text',
                    'title' => 'Video URL (Optional)',
                ),
            ),
        ),
    );
}

/**
 * Render the reviews section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_reviews_html($section_data) { 
    $slug = 'reviews';
    $sec_title        = mthan_get_section_val($slug, $section_data, 'sec_title', 'Happy Customers');
    $sec_subtitle     = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Our Feedback');
    $form_title       = mthan_get_section_val($slug, $section_data, 'form_title', 'We Happy to Hear Your Feedback');
    $form_text        = mthan_get_section_val($slug, $section_data, 'form_text', 'Keep the feedback to 200 words or less.');
    $avg_rating       = mthan_get_section_val($slug, $section_data, 'avg_rating', '4.5');
    $review_count     = mthan_get_section_val($slug, $section_data, 'review_count', '[24 Reviews]');
    $reviews_repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="reviews-section">
        <div class="auto-container">

            <div class="form-container">
                <div class="inner">
                    <h5><?php echo esc_html($form_title); ?></h5>
                    <div class="text"><?php echo esc_html($form_text); ?></div>
                    <div class="review-form default-form">
                        <form method="post" action="#">
                            <div class="row clearfix">
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="name" value="" placeholder="Name *" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <div class="field-inner">
                                        <input type="text" name="city" value="" placeholder="City *" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                    <div class="rating clearfix">
                                        <a href="#"><span class="far fa-star"></span><span class="far fa-star"></span><span class="far fa-star"></span><span class="far fa-star"></span><span class="far fa-star"></span></a>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="field-inner">
                                        <textarea name="message" placeholder="Your Feedback ..." required></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="theme-btn"><span class="fa fa-paper-plane"></span></button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="title-box clearfix">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-two.png" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                    <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                    <h2><?php echo esc_html($sec_title); ?></h2>
                </div>
                <div class="review-info">
                    <div class="count"><?php echo esc_html($avg_rating); ?></div>
                    <div class="rating clearfix"><span class="txt"><?php echo esc_html($review_count); ?></span> 
                        <?php 
                        $full_stars = floor((float)$avg_rating);
                        $has_half   = ((float)$avg_rating - $full_stars) >= 0.5;
                        for($i=1; $i<=5; $i++){
                            if($i <= $full_stars) echo '<span class="fa fa-star"></span>';
                            elseif($i == $full_stars+1 && $has_half) echo '<span class="fa fa-star-half"></span>';
                            else echo '<span class="far fa-star"></span>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="reviews-container">
                <div class="masonry-container row clearfix">

                    <?php foreach($reviews_repeater as $rev): 
                        $img      = !empty($rev['image']) ? $rev['image'] : '';
                        $thumb    = !empty($rev['thumb']) ? $rev['thumb'] : '';
                        $name     = !empty($rev['name']) ? $rev['name'] : '';
                        $reg      = !empty($rev['region']) ? $rev['region'] : '';
                        $rat      = !empty($rev['rating']) ? (float)$rev['rating'] : 5;
                        $text     = !empty($rev['text']) ? $rev['text'] : '';
                        $vid      = !empty($rev['video_url']) ? $rev['video_url'] : '';
                        
                        $block_cls = $vid ? 'review-block-two' : 'review-block';
                    ?>
                    <!--Block-->
                    <div class="<?php echo $block_cls; ?> masonry-item column-width col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>" title="<?php echo esc_attr($name); ?>">
                                <?php if($vid): ?>
                                <a href="<?php echo esc_url($vid); ?>" class="vid-link lightbox-image"><span class="play-icon flaticon-play-button-1"></span></a>
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <div class="quote-icon"><span></span></div>
                                <?php if($thumb): ?>
                                <div class="image"><img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($name); ?>" title="<?php echo esc_attr($name); ?>"></div>
                                <?php endif; ?>
                                <h6 class="name"><?php echo esc_html($name); ?></h6>
                                <div class="region"><?php echo esc_html($reg); ?></div>
                                <div class="rating">
                                    <?php 
                                    $r_full = floor($rat);
                                    $r_half = ($rat - $r_full) >= 0.5;
                                    for($j=1; $j<=5; $j++){
                                        if($j <= $r_full) echo '<span class="fa fa-star"></span>';
                                        elseif($j == $r_full+1 && $r_half) echo '<span class="fa fa-star-half"></span>';
                                        else echo '<span class="far fa-star"></span>';
                                    }
                                    ?>
                                </div>
                                <?php if($text): ?>
                                <div class="text"><?php echo esc_html($text); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </section>
<?php }
