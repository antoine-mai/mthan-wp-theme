<?php
/**
 * Page Layout: Service List
 */
?>
<section class="service-details">
    <div class="services-content">
        <?php
        mthan_render_post_sections('before');
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        mthan_render_post_sections('after');
        ?>
    </div>
</section>
