<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the projects section.
 */
function mthan_section_projects_html($section_data) {
    $slug  = 'projects';
    $style = mthan_get_section_val($slug, $section_data, 'section_style', '1');
    
    if ($style === '2') {
        mthan_section_projects_html_2($section_data);
    } elseif ($style === '3') {
        mthan_section_projects_html_3($section_data);
    } else {
        mthan_section_projects_html_1($section_data);
    }
}

/**
 * Style 1 Rendering (Carousel)
 */
function mthan_section_projects_html_1($section_data) {
    $slug = 'projects';
    $sec_title     = mthan_get_section_val($slug, $section_data, 'sec_title', 'Recent Gallery');
    $sec_subtitle  = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Our Projects');
    $sec_sub_icon  = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $repeater      = mthan_get_section_val($slug, $section_data, 'projects_repeater', array());
    $lower         = mthan_get_section_val($slug, $section_data, 'lower_text', 'We give guarantee for healthy landscapes, You should never compromise with quality.');
    $all_link      = mthan_get_section_val($slug, $section_data, 'view_all_link', '#');
    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/featured-image-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-3.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-4.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-5.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-6.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-7.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-8.jpg',
    );
?>
<section class="projects-section">
        <div class="auto-container">
            <div class="sec-title">
                <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                <h2><?php echo esc_html($sec_title); ?></h2>
            </div>

            <div class="carousel-box">
                <div class="project-carousel owl-theme owl-carousel">
                    <?php foreach($repeater as $i => $project): 
                        $img   = !empty($project['image']['url']) ? $project['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                        $cat   = !empty($project['cat_label']) ? $project['cat_label'] : '';
                        $title = !empty($project['title']) ? $project['title'] : '';
                        $link  = !empty($project['link']) ? $project['link'] : '#';
                    ?>
                    <!--Project Block-->
                    <div class="project-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                            </div>
                            <div class="hover-box">
                                <div class="hvr-content">
                                    <div class="cat"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($cat); ?></a></div>
                                    <h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h5>
                                </div>
                            </div>
                            <div class="link-box"><a href="<?php echo esc_url($link); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="lower-text"><?php echo esc_html($lower); ?> <a href="<?php echo esc_url($all_link); ?>" class="theme-btn">View All Projects <i class="arrow flaticon-play-button-1"></i></a></div>
        </div>
    </section>
<?php
}

/**
 * Style 2 Rendering (Masonry Grid)
 */
function mthan_section_projects_html_2($section_data) {
    $slug = 'projects';
    $sec_title     = mthan_get_section_val($slug, $section_data, 'sec_title', 'Recent Gallery');
    $sec_subtitle  = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Our Projects');
    $sec_sub_icon  = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-two.png');
    $repeater      = mthan_get_section_val($slug, $section_data, 'projects_repeater', array());
    $all_link      = mthan_get_section_val($slug, $section_data, 'view_all_link', '#');
    $fallback_imgs = array(
        get_template_directory_uri() . '/assets/images/resource/featured-image-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-3.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-4.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-5.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-6.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-7.jpg',
    );
?>
<section class="projects-two">
        <div class="auto-container">
            <div class="upper-box clearfix">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                    <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                    <h2><?php echo esc_html($sec_title); ?></h2>
                </div>
                <div class="link-box">
                    <a href="<?php echo esc_url($all_link); ?>" class="theme-btn btn-style-four"><span class="btn-title">View More <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>

            <div class="masonry-box">
                <div class="row masonry-container clearfix">
                    <?php foreach($repeater as $i => $project): 
                        $img      = !empty($project['image']['url']) ? $project['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                        $cat      = !empty($project['cat_label']) ? $project['cat_label'] : '';
                        $title    = !empty($project['title']) ? $project['title'] : '';
                        $link     = !empty($project['link']) ? $project['link'] : '#';
                        $is_large = !empty($project['is_large']) ? $project['is_large'] : false;
                        $col_cls  = $is_large ? 'col-lg-6 col-md-12 col-sm-12' : 'column-width col-lg-3 col-md-6 col-sm-12';
                    ?>
                    <!--Project Block-->
                    <div class="project-block-two masonry-item <?php echo esc_attr($col_cls); ?>">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                            </div>
                            <div class="hover-box">
                                <div class="hvr-content">
                                    <div class="cat"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($cat); ?></a></div>
                                    <h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h5>
                                </div>
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
 * Style 3 Rendering (Filtered Gallery)
 */
function mthan_section_projects_html_3($section_data) {
    $slug      = 'projects';
    $sec_title        = mthan_get_section_val($slug, $section_data, 'sec_title', 'Recent Gallery');
    $sec_subtitle     = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Our Projects');
    $sec_sub_icon     = mthan_sec_img($slug, $section_data, 'sec_subtitle_icon', get_template_directory_uri() . '/assets/images/icons/leaf-four.png');
    $sec_text         = mthan_get_section_val($slug, $section_data, 'sec_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $filters_repeater = mthan_get_section_val($slug, $section_data, 'filters_repeater', array());
    $gallery_repeater = mthan_get_section_val($slug, $section_data, 'projects_repeater', array());
    $fallback_imgs    = array(
        get_template_directory_uri() . '/assets/images/resource/featured-image-1.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-2.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-3.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-4.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-5.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-6.jpg',
        get_template_directory_uri() . '/assets/images/resource/featured-image-7.jpg',
    );
?>
<section class="gallery-section">
        <div class="auto-container">
            <div class="title-box">
                <div class="row clearfix">
                    <div class="left-col col-xl-6 col-lg-12 col-md-12">
                        <div class="sec-title alternate">
                            <div class="title-icon"><span class="icon"><img src="<?php echo esc_url($sec_sub_icon); ?>" alt="<?php echo esc_attr($sec_subtitle); ?>" title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                            <h2><?php echo esc_html($sec_title); ?></h2>
                        </div>
                    </div>
                    <?php if($sec_text): ?>
                    <div class="right-col col-xl-6 col-lg-12 col-md-12">
                        <div class="text"><?php echo esc_html($sec_text); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">
                <!--Filter-->
                <div class="gallery-filters centered clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">All</li>
                        <?php foreach($filters_repeater as $filter): 
                            $label = !empty($filter['label']) ? $filter['label'] : '';
                            $f_cls = !empty($filter['filter_class']) ? $filter['filter_class'] : '';
                        ?>
                        <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($f_cls); ?>"><?php echo esc_html($label); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="filter-list row">
                    <?php foreach($gallery_repeater as $i => $item): 
                        $img        = !empty($item['image']['url']) ? $item['image']['url'] : $fallback_imgs[$i % count($fallback_imgs)];
                        $title      = !empty($item['title']) ? $item['title'] : '';
                        $cat_label  = !empty($item['cat_label']) ? $item['cat_label'] : '';
                        $link       = !empty($item['link']) ? $item['link'] : '#';
                        $f_classes  = !empty($item['filter_classes']) ? $item['filter_classes'] : '';
                    ?>
                    <!-- Gallery Item -->
                    <div class="gallery-item mix all <?php echo esc_attr($f_classes); ?> col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                            </div>
                            <div class="hover-box">
                                <div class="hvr-content">
                                    <div class="cat"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($cat_label); ?></a></div>
                                    <h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h5>
                                    <div class="link-box"><a href="<?php echo esc_url($link); ?>"><span class="icon flaticon-right-arrow-1"></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="more-box">
                    <a class="theme-btn btn-style-four" href="#"><span class="btn-title">lOAD mORE <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>
        </div>
    </section>
<?php
}
