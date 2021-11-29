<?php
/*
Template Name: Saas Right Sidebar
*/

get_header();
if ( is_active_sidebar( 'sidebar-1' ) ) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-12';
    $sidebar = 'col-lg-12';
}
?>
<section class="blog-details">
    <div class="container">
        <div class="row">
                <div class="<?php echo esc_attr($main);?>">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div>
                <div class="<?php echo esc_attr($sidebar);?>">
                    <?php get_template_part( 'layouts/sidebar', 'right' ); ?>
                </div>
        </div>
    </div> <!-- end container -->
</section>

<?php get_footer();