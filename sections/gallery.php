<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the gallery section instance.
 * @return array
 */
function mthan_section_gallery_options()
{
    return array(
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
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
        array(
            'id'     => 'filters_repeater',
            'type'   => 'group',
            'title'  => 'Filter Tabs',
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
                    'description' => 'Used in data-filter (e.g. .garden)',
                ),
            ),
            'default' => array(
                array('label' => 'Garden', 'filter_class' => 'garden'),
                array('label' => 'Landscape', 'filter_class' => 'landscape'),
                array('label' => 'Lawn Care', 'filter_class' => 'lawncare'),
            ),
        ),
        array(
            'id'     => 'gallery_repeater',
            'type'   => 'group',
            'title'  => 'Gallery Items',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Image',
                ),
                array(
                    'id'    => 'title',
                    'type'  => 'text',
                    'title' => 'Title',
                ),
                array(
                    'id'    => 'cat_label',
                    'type'  => 'text',
                    'title' => 'Category Label',
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
                    'title' => 'Filter Classes',
                    'description' => 'Space separated classes (e.g. garden lawncare)',
                ),
            ),
        ),
    );
}

/**
 * Render the gallery section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_gallery_html($section_data) { 
    $sec_title        = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Recent Gallery';
    $sec_subtitle     = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Projects';
    $sec_text         = isset($section_data['sec_text']) ? $section_data['sec_text'] : '';
    $filters_repeater = isset($section_data['filters_repeater']) ? $section_data['filters_repeater'] : array();
    $gallery_repeater = isset($section_data['gallery_repeater']) ? $section_data['gallery_repeater'] : array();
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
                        $img        = isset($item['image']) ? $item['image'] : '';
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
<?php }
