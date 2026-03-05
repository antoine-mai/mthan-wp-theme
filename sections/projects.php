<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the projects section instance.
 * @return array
 */
function mthan_section_projects_options()
{
    return array(
        array(
            'id'      => 'style',
            'type'    => 'select',
            'title'   => 'Style',
            'options' => array(
                '1' => 'Style 1 (Carousel)',
                '2' => 'Style 2 (Masonry Grid)',
                '3' => 'Style 3 (Filtered Gallery)',
            ),
            'default' => '1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Projects',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Recent Gallery',
        ),
        array(
            'id'    => 'sec_text',
            'type'  => 'textarea',
            'title' => 'Description (Style 3 only)',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
            'dependency' => array('style', '==', '3'),
        ),
        // Filters for Style 3
        array(
            'id'     => 'filters_repeater',
            'type'   => 'group',
            'title'  => 'Filter Tabs (Style 3 only)',
            'dependency' => array('style', '==', '3'),
            'fields' => array(
                array(
                    'id'    => 'label',
                    'type'  => 'text',
                    'title' => 'Label',
                ),
                array(
                    'id'    => 'filter_class',
                    'type'  => 'text',
                    'title' => 'Filter Class (e.g. garden)',
                ),
            ),
            'default' => array(
                array('label' => 'Garden', 'filter_class' => 'garden'),
                array('label' => 'Landscape', 'filter_class' => 'landscape'),
                array('label' => 'Lawn Care', 'filter_class' => 'lawncare'),
            ),
        ),
        // Projects Repeater
        array(
            'id'     => 'projects_repeater',
            'type'   => 'group',
            'title'  => 'Projects List',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                ),
                array(
                    'id'    => 'cat_label',
                    'type'  => 'text',
                    'title' => 'Category Label',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'link',
                    'type'  => 'text',
                    'title' => 'Link',
                    'default' => '#',
                ),
                array(
                    'id'    => 'filter_classes',
                    'type'  => 'text',
                    'title' => 'Filter Classes (Style 3 only)',
                    'description' => 'Space separated classes (e.g. garden lawncare)',
                ),
                array(
                    'id'    => 'is_large',
                    'type'  => 'switcher',
                    'title' => 'Is Large Block? (Style 2 only)',
                ),
            ),
        ),
        array(
            'id'    => 'lower_text',
            'type'  => 'textarea',
            'title' => 'Lower Text (Style 1 only)',
            'default' => 'We give guarantee for healthy landscapes, You should never compromise with quality.',
            'dependency' => array('style', '==', '1'),
        ),
        array(
            'id'    => 'view_all_link',
            'type'  => 'text',
            'title' => 'View All/More Link',
            'default' => '#',
        ),
    );
}

/**
 * Render the projects section.
 */
function mthan_section_projects_html($section_data) {
    $style = isset($section_data['style']) ? $section_data['style'] : '1';
    
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
    $sec_title     = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Recent Gallery';
    $sec_subtitle  = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Projects';
    $repeater      = isset($section_data['projects_repeater']) ? $section_data['projects_repeater'] : array();
    $lower         = isset($section_data['lower_text']) ? $section_data['lower_text'] : '';
    $all_link      = isset($section_data['view_all_link']) ? $section_data['view_all_link'] : '#';
?>
<section class="projects-section">
        <div class="auto-container">
            <div class="sec-title">
                <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                <h2><?php echo esc_html($sec_title); ?></h2>
            </div>

            <div class="carousel-box">
                <div class="project-carousel owl-theme owl-carousel">
                    <?php foreach($repeater as $project): 
                        $img   = !empty($project['image']['url']) ? $project['image']['url'] : '';
                        $cat   = isset($project['cat_label']) ? $project['cat_label'] : '';
                        $title = isset($project['title']) ? $project['title'] : '';
                        $link  = isset($project['link']) ? $project['link'] : '#';
                    ?>
                    <!--Project Block-->
                    <div class="project-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
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
    $sec_title     = isset($section_data['sec_title']) ? $section_data['sec_title'] : '';
    $sec_subtitle  = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : '';
    $repeater      = isset($section_data['projects_repeater']) ? $section_data['projects_repeater'] : array();
    $all_link      = isset($section_data['view_all_link']) ? $section_data['view_all_link'] : '#';
?>
<section class="projects-two">
        <div class="auto-container">
            <div class="upper-box clearfix">
                <div class="sec-title">
                    <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
                    <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                    <h2><?php echo esc_html($sec_title); ?></h2>
                </div>
                <div class="link-box">
                    <a href="<?php echo esc_url($all_link); ?>" class="theme-btn btn-style-four"><span class="btn-title">View More <i class="arrow flaticon-play-button-1"></i></span></a>
                </div>
            </div>

            <div class="masonry-box">
                <div class="row masonry-container clearfix">
                    <?php foreach($repeater as $project): 
                        $img      = !empty($project['image']['url']) ? $project['image']['url'] : '';
                        $cat      = isset($project['cat_label']) ? $project['cat_label'] : '';
                        $title    = isset($project['title']) ? $project['title'] : '';
                        $link     = isset($project['link']) ? $project['link'] : '#';
                        $is_large = isset($project['is_large']) ? $project['is_large'] : false;
                        $col_cls  = $is_large ? 'col-lg-6 col-md-12 col-sm-12' : 'column-width col-lg-3 col-md-6 col-sm-12';
                    ?>
                    <!--Project Block-->
                    <div class="project-block-two masonry-item <?php echo esc_attr($col_cls); ?>">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
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
    $sec_title        = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Recent Gallery';
    $sec_subtitle     = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Projects';
    $sec_text         = isset($section_data['sec_text']) ? $section_data['sec_text'] : '';
    $filters_repeater = isset($section_data['filters_repeater']) ? $section_data['filters_repeater'] : array();
    $gallery_repeater = isset($section_data['projects_repeater']) ? $section_data['projects_repeater'] : array();
?>
<section class="gallery-section">
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
                            $label = isset($filter['label']) ? $filter['label'] : '';
                            $f_cls = isset($filter['filter_class']) ? $filter['filter_class'] : '';
                        ?>
                        <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($f_cls); ?>"><?php echo esc_html($label); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="filter-list row">
                    <?php foreach($gallery_repeater as $item): 
                        $img        = !empty($item['image']['url']) ? $item['image']['url'] : '';
                        $title      = isset($item['title']) ? $item['title'] : '';
                        $cat_label  = isset($item['cat_label']) ? $item['cat_label'] : '';
                        $link       = isset($item['link']) ? $item['link'] : '#';
                        $f_classes  = isset($item['filter_classes']) ? $item['filter_classes'] : '';
                    ?>
                    <!-- Gallery Item -->
                    <div class="gallery-item mix all <?php echo esc_attr($f_classes); ?> col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($title); ?>">
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
