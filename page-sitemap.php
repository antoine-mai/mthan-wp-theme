<?php defined('ABSPATH') or die('Cheatin\' uh?');
/**
 * Template Name: Sitemap Page
 * 
**/
get_header();

$layout_type = mthan_get_layout_type();
mthan_render_global_sections('before', $layout_type);
mthan_render_page_sections('before');
?>

<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="sitemap-inner">
                    <div class="row clearfix">
                        
                        <!-- Pages -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mthan-sitemap-column">
                            <h3 class="sitemap-title"><i class="fas fa-file-alt"></i> Pages</h3>
                            <ul class="sitemap-list">
                                <?php
                                wp_list_pages(array(
                                    'title_li' => '',
                                ));
                                ?>
                            </ul>
                        </div>

                        <!-- Posts by Category -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mthan-sitemap-column">
                            <h3 class="sitemap-title"><i class="fas fa-newspaper"></i> Blog Posts</h3>
                            <?php
                            $categories = get_categories();
                            foreach ($categories as $cat) {
                                echo '<h4 class="sitemap-sub-title">' . esc_html($cat->name) . '</h4>';
                                echo '<ul class="sitemap-list">';
                                $posts = get_posts(array('category' => $cat->term_id, 'numberposts' => -1));
                                foreach ($posts as $post) {
                                    setup_postdata($post);
                                    echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
                                }
                                echo '</ul>';
                                wp_reset_postdata();
                            }
                            ?>
                        </div>

                        <!-- Services & Projects -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mthan-sitemap-column">
                            <?php if (post_type_exists('mthan_service')) : ?>
                            <h3 class="sitemap-title"><i class="fas fa-concierge-bell"></i> Services</h3>
                            <ul class="sitemap-list">
                                <?php
                                $services = get_posts(array('post_type' => 'mthan_service', 'numberposts' => -1));
                                foreach ($services as $service) {
                                    echo '<li><a href="' . get_permalink($service->ID) . '">' . get_the_title($service->ID) . '</a></li>';
                                }
                                ?>
                            </ul>
                            <?php endif; ?>

                            <?php if (post_type_exists('mthan_project')) : ?>
                            <h3 class="sitemap-title" style="margin-top: 40px;"><i class="fas fa-tasks"></i> Projects</h3>
                            <ul class="sitemap-list">
                                <?php
                                $projects = get_posts(array('post_type' => 'mthan_project', 'numberposts' => -1));
                                foreach ($projects as $project) {
                                    echo '<li><a href="' . get_permalink($project->ID) . '">' . get_the_title($project->ID) . '</a></li>';
                                }
                                ?>
                            </ul>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.mthan-sitemap-column {
    margin-bottom: 50px;
}
.sitemap-title {
    font-size: 24px;
    font-weight: 700;
    color: #1a2e2f;
    margin-bottom: 25px;
    padding-bottom: 10px;
    border-bottom: 2px solid #24a77e;
    display: inline-block;
}
.sitemap-title i {
    color: #24a77e;
    margin-right: 10px;
}
.sitemap-sub-title {
    font-size: 18px;
    font-weight: 600;
    color: #24a77e;
    margin: 20px 0 10px;
}
.sitemap-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sitemap-list li {
    position: relative;
    padding-left: 20px;
    margin-bottom: 10px;
}
.sitemap-list li:before {
    content: "\f105";
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    position: absolute;
    left: 0;
    color: #24a77e;
}
.sitemap-list li a {
    color: #555;
    transition: all 0.3s ease;
}
.sitemap-list li a:hover {
    color: #24a77e;
    padding-left: 5px;
}
</style>

<?php 
mthan_render_page_sections('after');
mthan_render_global_sections('after', $layout_type);
get_footer(); 
?>

