<?php defined('ABSPATH') or die('Cheatin\' uh?');


/**
 * Render the page-banner section.
 *
 * @param array $section_data Per-instance CSF field values.
 */
function mthan_section_page_banner_html($section_data)
{
    $slug = 'page-banner';
    $bg = mthan_sec_img($slug, $section_data, 'image', get_template_directory_uri() . '/assets/images/background/banner-image-1.jpg');
    $title = mthan_get_section_val($slug, $section_data, 'title', get_the_title());
    $breadcrumb = mthan_get_section_val($slug, $section_data, 'breadcrumb_title', $title);
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
                            <?php echo esc_html($breadcrumb); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}