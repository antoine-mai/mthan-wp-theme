<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the pricing section instance.
 * @return array
 */
function mthan_section_pricing_options()
{
    return array(
            array(
            'id' => 'sec_subtitle',
            'type' => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Solutions',
        ),
            array(
            'id' => 'sec_title',
            'type' => 'text',
            'title' => 'Title',
            'default' => 'Pricing Plans',
        ),
            array(
            'id' => 'sec_text',
            'type' => 'textarea',
            'title' => 'Description',
            'default' => 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.',
        ),
            array(
            'id' => 'pricing_repeater',
            'type' => 'group',
            'title' => 'Pricing Plans',
            'fields' => array(
                    array(
                    'id' => 'currency',
                    'type' => 'text',
                    'title' => 'Currency Symbol',
                    'default' => '$',
                ),
                    array(
                    'id' => 'price',
                    'type' => 'text',
                    'title' => 'Price',
                ),
                    array(
                    'id' => 'title',
                    'type' => 'text',
                    'title' => 'Title',
                ),
                    array(
                    'id' => 'frequency',
                    'type' => 'text',
                    'title' => 'Frequency',
                    'default' => 'Price Per Month',
                ),
                    array(
                    'id' => 'features',
                    'type' => 'group',
                    'title' => 'Features',
                    'fields' => array(
                            array(
                            'id' => 'label',
                            'type' => 'text',
                            'title' => 'Feature Label',
                        ),
                            array(
                            'id' => 'active',
                            'type' => 'switcher',
                            'title' => 'Active?',
                            'default' => true,
                        ),
                    ),
                ),
                    array(
                    'id' => 'link',
                    'type' => 'text',
                    'title' => 'Link',
                    'default' => '#',
                ),
            ),
        ),
    );
}

/**
 * Render the pricing section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_pricing_html($section_data)
{
    $slug = 'pricing';
    $sec_title = mthan_get_section_val($slug, $section_data, 'sec_title', 'Pricing Plans');
    $sec_subtitle = mthan_get_section_val($slug, $section_data, 'sec_subtitle', 'Our Solutions');
    $sec_text = mthan_get_section_val($slug, $section_data, 'sec_text', 'How to pursue pleasure rationally encounter consequences that painful again is there anyone who loves.');
    $pricing_repeater = mthan_get_section_val($slug, $section_data, 'repeater', array());
?>
<section class="pricing-section">
    <div class="auto-container">
        <div class="title-box">
            <div class="row clearfix">
                <div class="left-col col-xl-6 col-lg-12 col-md-12">
                    <div class="sec-title alternate">
                        <div class="title-icon"><span class="icon"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/leaf-four.png"
                                    alt="<?php echo esc_attr($sec_subtitle); ?>"
                                    title="<?php echo esc_attr($sec_subtitle); ?>"></span></div>
                        <div class="subtitle">
                            <?php echo esc_html($sec_subtitle); ?>
                        </div>
                        <h2>
                            <?php echo esc_html($sec_title); ?>
                        </h2>
                    </div>
                </div>
                <?php if ($sec_text): ?>
                <div class="right-col col-xl-6 col-lg-12 col-md-12">
                    <div class="text">
                        <?php echo esc_html($sec_text); ?>
                    </div>
                </div>
                <?php
    endif; ?>
            </div>
        </div>

        <div class="pricing">
            <div class="row clearfix">
                <?php foreach ($pricing_repeater as $plan):
        $currency = isset($plan['currency']) ? $plan['currency'] : '$';
        $price = isset($plan['price']) ? $plan['price'] : '';
        $title = isset($plan['title']) ? $plan['title'] : '';
        $freq = isset($plan['frequency']) ? $plan['frequency'] : '';
        $features = isset($plan['features']) ? $plan['features'] : array();
        $link = isset($plan['link']) ? $plan['link'] : '#';
?>
                <!--Price Block-->
                <div class="price-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="leaf"></div>
                        <div class="content">
                            <div class="price"><sup>
                                    <?php echo esc_html($currency); ?>
                                </sup>
                                <?php echo esc_html($price); ?>
                            </div>
                            <h6 class="plan-title">
                                <?php echo wp_kses_post($title); ?>
                            </h6>
                            <div class="frequency">
                                <?php echo esc_html($freq); ?>
                            </div>
                            <?php if (!empty($features)): ?>
                            <div class="features">
                                <ul>
                                    <?php foreach ($features as $feat):
                $f_label = isset($feat['label']) ? $feat['label'] : '';
                $f_active = isset($feat['active']) ? $feat['active'] : true;
                $icon_cls = $f_active ? 'fa-check' : 'fa-times';
?>
                                    <li><span class="icon fa <?php echo $icon_cls; ?>"></span>
                                        <?php echo esc_html($f_label); ?>
                                    </li>
                                    <?php
            endforeach; ?>
                                </ul>
                            </div>
                            <?php
        endif; ?>
                            <div class="link-box"><a href="<?php echo esc_url($link); ?>"
                                    class="theme-btn btn-style-six"><span class="btn-title">Get It Now <i
                                            class="arrow flaticon-play-button-1"></i></span></a></div>
                        </div>
                    </div>
                </div>
                <?php
    endforeach; ?>

            </div>
        </div>

    </div>
</section>
<?php
}