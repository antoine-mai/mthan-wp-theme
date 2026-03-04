<?php defined('ABSPATH') or die('Cheatin\' uh?');
$bg = !empty($section_data['page_banner_image']['url']) ? esc_url($section_data['page_banner_image']['url']) : get_template_directory_uri() . '/images/background/banner-image-1.jpg';
$title = !empty($section_data['page_banner_title']) ? $section_data['page_banner_title'] : get_the_title();
?>
<section class="page-banner">
    <div class="image-layer" style="background-image:url(<?php echo $bg; ?>);"></div>
    <div class="banner-bottom-pattern"></div>
    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>
                    <?php echo esc_html($title); ?>
                </h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><span class="fa fa-home"></span></a></li>
                        <li class="active">
                            <?php echo esc_html($title); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>