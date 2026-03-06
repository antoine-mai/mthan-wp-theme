<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the project-feedback section instance.
 * @return array
 */
function mthan_section_project_feedback_options()
{
    return array(
        array(
            'id'    => 'feedback_bg',
            'type'  => 'media',
            'title' => 'Background Image',
            'library' => 'image',
        ),
        array(
            'id'    => 'feedback_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Get morethan we expected',
        ),
        array(
            'id'    => 'feedback_text',
            'type'  => 'textarea',
            'title' => 'Feedback Text',
            'default' => 'Thank you for our beautiful new front! Your crew was outstanding & very professional!.',
        ),
        array(
            'id'    => 'feedback_rating',
            'type'  => 'select',
            'title' => 'Rating',
            'options' => array(
                '1' => '1 Star',
                '2' => '2 Stars',
                '3' => '3 Stars',
                '4' => '4 Stars',
                '5' => '5 Stars',
            ),
            'default' => '5',
        ),
        array(
            'id'    => 'feedback_name',
            'type'  => 'text',
            'title' => 'Author Name',
            'default' => 'Louie Daxon,',
        ),
        array(
            'id'    => 'feedback_area',
            'type'  => 'text',
            'title' => 'Author Area',
            'default' => 'New Orleans, usa',
        ),
    );
}

/**
 * Render the project-feedback section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_project_feedback_html($section_data) {
    $bg      = !empty($section_data['feedback_bg']['url']) ? $section_data['feedback_bg']['url'] : get_template_directory_uri() . '/assets/images/background/quote-bg.jpg';
    $title   = !empty($section_data['feedback_title']) ? $section_data['feedback_title'] : 'Get morethan we expected';
    $text    = !empty($section_data['feedback_text']) ? $section_data['feedback_text'] : 'Thank you for our beautiful new front! Your crew was outstanding & very professional!.';
    $rating  = !empty($section_data['feedback_rating']) ? (int)$section_data['feedback_rating'] : 5;
    $name    = !empty($section_data['feedback_name']) ? $section_data['feedback_name'] : 'Louie Daxon,';
    $area    = !empty($section_data['feedback_area']) ? $section_data['feedback_area'] : 'New Orleans, usa';
?>
<section class="project-feedback">
    <div class="image-layer" style="background-image: url(<?php echo esc_url($bg); ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="quote">
                <div class="quote-icon"><span></span></div>
                <h4><?php echo esc_html($title); ?></h4>
                <div class="quote-text"><?php echo esc_html($text); ?></div>
                <div class="rating">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <span class="<?php echo ($i < $rating) ? 'fa fa-star' : 'far fa-star'; ?>"></span>
                    <?php endfor; ?>
                </div>
                <div class="info"><span class="name"><?php echo esc_html($name); ?></span> <span class="area"><?php echo esc_html($area); ?></span></div>
            </div>
        </div>
    </div>
</section>
<?php }
