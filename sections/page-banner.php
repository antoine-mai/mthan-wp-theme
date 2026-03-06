<?php defined('ABSPATH') or die('Cheatin\' uh?');

/**
 * Returns the CSF field definitions for the page-banner section instance.
 * @return array
 */
function mthan_section_page_banner_options()
{
    return array(
        array(
            'id'      => 'page_banner_image',
            'type'    => 'media',
            'library' => 'image',
            'title'   => 'Background Image',
        ),
        array(
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'title' => 'Page Title (H1)',
        ),
        array(
            'id'    => 'page_banner_breadcrumb_title',
            'type'  => 'text',
            'title' => 'Breadcrumb Title',
            'desc'  => 'Leave empty to use the Page Title',
        ),
    );
}

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