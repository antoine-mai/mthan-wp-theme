<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Returns the CSF field definitions for the team section instance.
 * @return array
 */
function mthan_section_team_options()
{
    return array(
        array(
            'id'    => 'team_style',
            'type'  => 'select',
            'title' => 'Team Style',
            'options' => array(
                'style-1' => 'Style 1 (Grid)',
                'style-2' => 'Style 2 (Carousel)',
            ),
            'default' => 'style-1',
        ),
        array(
            'id'    => 'sec_subtitle',
            'type'  => 'text',
            'title' => 'Subtitle',
            'default' => 'Our Gardeners',
        ),
        array(
            'id'    => 'sec_title',
            'type'  => 'text',
            'title' => 'Title',
            'default' => 'Professional Team',
        ),
        array(
            'id'    => 'btn_text',
            'type'  => 'text',
            'title' => 'Button Text (Style 1)',
            'default' => 'All Members',
            'dependency' => array('team_style', '==', 'style-1'),
        ),
        array(
            'id'    => 'btn_link',
            'type'  => 'text',
            'title' => 'Button Link (Style 1)',
            'default' => '#',
            'dependency' => array('team_style', '==', 'style-1'),
        ),
        array(
            'id'     => 'team_repeater',
            'type'   => 'group',
            'title'  => 'Team Members',
            'fields' => array(
                array(
                    'id'    => 'image',
                    'type'  => 'upload',
                    'title' => 'Member Image',
                ),
                array(
                    'id'    => 'name',
                    'type'  => 'text',
                    'title' => 'Name',
                ),
                array(
                    'id'    => 'designation',
                    'type'  => 'text',
                    'title' => 'Designation',
                ),
                array(
                    'id'    => 'phone',
                    'type'  => 'text',
                    'title' => 'Phone/Email',
                ),
                array(
                    'id'    => 'facebook',
                    'type'  => 'text',
                    'title' => 'Facebook Link',
                ),
                array(
                    'id'    => 'twitter',
                    'type'  => 'text',
                    'title' => 'Twitter Link',
                ),
                array(
                    'id'    => 'instagram',
                    'type'  => 'text',
                    'title' => 'Instagram Link',
                ),
            ),
        ),
    );
}

/**
 * Render the team section.
 *
 * @param array $section_data Per-instance CSF field values.
 **/
function mthan_section_team_html($section_data) {
    $style         = isset($section_data['team_style']) ? $section_data['team_style'] : 'style-1';
    $sec_title     = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Professional Team';
    $sec_subtitle  = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Gardeners';
    $btn_text      = isset($section_data['btn_text']) ? $section_data['btn_text'] : '';
    $btn_link      = isset($section_data['btn_link']) ? $section_data['btn_link'] : '';
    $team_repeater = isset($section_data['team_repeater']) ? $section_data['team_repeater'] : array();

    if ($style === 'style-2') {
        mthan_section_team_html_2($section_data);
        return;
    }
?>
<section class="team-section">
    <div class="left-leaf"><img src="images/resource/leaf-2.png" alt="" title=""></div>
    <div class="right-leaf"><img src="images/resource/leaf-3.png" alt="" title=""></div>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <div class="title-icon">
                    <span class="icon">
                        <img src="images/icons/leaf-two.png" alt="" title="">
                    </span>
                </div>
                <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
                <h2><?php echo esc_html($sec_title); ?></h2>
            </div>
            <?php if ($btn_text): ?>
            <div class="link-box">
                <a href="<?php echo esc_url($btn_link); ?>" class="theme-btn btn-style-four"><span class="btn-title"><?php echo esc_html($btn_text); ?> <i class="arrow flaticon-play-button-1"></i></span></a>
            </div>
            <?php endif; ?>
        </div>

        <div class="team-box">
            <div class="row clearfix">
                <?php foreach($team_repeater as $member): 
                    $img   = isset($member['image']) ? $member['image'] : '';
                    $name  = isset($member['name']) ? $member['name'] : '';
                    $des   = isset($member['designation']) ? $member['designation'] : '';
                    $phone = isset($member['phone']) ? $member['phone'] : '';
                ?>
                <!--Team block-->
                <div class="team-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
                            </div>
                        </div>
                        <div class="lower">
                            <?php if ($phone): ?>
                            <div class="phone">
                                <a href="#"><span class="icon flaticon-headphones"></span>Phone: <?php echo esc_html($phone); ?></a>
                            </div>
                            <?php endif; ?>
                            <h5><a href="#"><?php echo esc_html($name); ?></a></h5>
                            <div class="designation"><?php echo esc_html($des); ?></div>
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
 * Render Style 2 (Carousel)
 */
function mthan_section_team_html_2($section_data) {
    $sec_title     = isset($section_data['sec_title']) ? $section_data['sec_title'] : 'Professional Team';
    $sec_subtitle  = isset($section_data['sec_subtitle']) ? $section_data['sec_subtitle'] : 'Our Gardeners';
    $team_repeater = isset($section_data['team_repeater']) ? $section_data['team_repeater'] : array();
?>
<section class="team-two">  
    <div class="auto-container">
        <div class="sec-title">
            <div class="title-icon"><span class="icon"><img src="images/icons/leaf-two.png" alt="" title=""></span></div>
            <div class="subtitle"><?php echo esc_html($sec_subtitle); ?></div>
            <h2><?php echo esc_html($sec_title); ?></h2>
        </div>
    
        <div class="team-box">
            <div class="team-carousel owl-theme owl-carousel">
                <?php foreach($team_repeater as $member): 
                    $img   = isset($member['image']) ? $member['image'] : '';
                    $name  = isset($member['name']) ? $member['name'] : '';
                    $des   = isset($member['designation']) ? $member['designation'] : '';
                    $phone = isset($member['phone']) ? $member['phone'] : '';
                    $fb    = isset($member['facebook']) ? $member['facebook'] : '';
                    $tw    = isset($member['twitter']) ? $member['twitter'] : '';
                    $inst  = isset($member['instagram']) ? $member['instagram'] : '';
                ?>
                <!--Team block-->
                <div class="team-block-two">
                    <div class="inner-box">
                        <div class="upper">
                            <div class="image-box">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($name); ?>">
                            </div>
                        </div>
                        <div class="lower">
                            <div class="designation"><?php echo esc_html($des); ?></div>
                            <h5><a href="#"><?php echo esc_html($name); ?></a></h5>
                            <div class="phone-box">
                                <?php if ($phone): ?>
                                <a href="#" class="phone">
                                    <span class="icon <?php echo (strpos($phone, '@') !== false) ? 'flaticon-envelope-1' : 'flaticon-headphones'; ?>"></span>
                                    <?php echo esc_html($phone); ?>
                                </a>
                                <?php endif; ?>
                                <div class="share-it">
                                    <span class="theme-btn share-icon flaticon-share-1"></span>
                                    <div class="share-list">
                                        <ul class="clearfix">
                                            <?php if($fb): ?><li><a href="<?php echo esc_url($fb); ?>"><span class="fab fa-facebook-f"></span></a></li><?php endif; ?>
                                            <?php if($tw): ?><li><a href="<?php echo esc_url($tw); ?>"><span class="fab fa-twitter"></span></a></li><?php endif; ?>
                                            <?php if($inst): ?><li><a href="<?php echo esc_url($inst); ?>"><span class="fab fa-instagram"></span></a></li><?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php }
