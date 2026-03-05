<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the projects section instance.
 * @return array
 */
function mthan_section_projects_options()
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
            ),
            'default' => array(
                array(
                    'title' => 'Communual Garden',
                    'cat_label' => 'Garden Care',
                ),
                array(
                    'title' => 'Sprinkler Irrigation',
                    'cat_label' => 'Lawn Care',
                ),
                array(
                    'title' => 'Rubbish Removal',
                    'cat_label' => 'Pathways',
                ),
            ),
        ),
        array(
            'id'    => 'lower_text',
            'type'  => 'textarea',
            'title' => 'Lower Text',
            'default' => 'We give guarantee for healthy landscapes, You should never compromise with quality.',
        ),
        array(
            'id'    => 'view_all_link',
            'type'  => 'text',
            'title' => 'View All Link',
            'default' => '#',
        ),
    );
}

/**
 * Render the projects section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_projects_html($section_data) { 
    $sec_title         = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Recent Gallery';
    $sec_subtitle      = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Projects';
    $projects_repeater = isset($section_data['projects_repeater']) ? $section_data['projects_repeater'] : array();
    $lower_text        = isset($section_data['lower_text']) ? $section_data['lower_text'] : '';
    $view_all_link     = isset($section_data['view_all_link']) ? $section_data['view_all_link'] : '#';
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
                    <?php foreach($projects_repeater as $project): 
                        $img   = isset($project['image']) ? $project['image'] : '';
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
            <div class="lower-text"><?php echo esc_html($lower_text); ?> <a href="<?php echo esc_url($view_all_link); ?>" class="theme-btn">View All Projects <i class="arrow flaticon-play-button-1"></i></a></div>
        </div>
    </section>
<?php }
