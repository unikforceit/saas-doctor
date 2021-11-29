<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header();

if (is_active_sidebar('sidebar-1')) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-12';
    $sidebar = 'col-lg-12';
}

?>
    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($main); ?>">
                    <div class="blog-feed-wrapper">
                        <div class="archive-header">
                            <?php
                            the_archive_title('<h1>', '</h1>');
                            the_archive_description('<p>', '</p>');
                            ?>
                        </div>
                        <div class="row">
                            <?php if (have_posts()) :

                                /* Start the Loop */
                                while (have_posts()) : the_post();

                                    get_template_part('template-parts/content');

                                endwhile;

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif; ?>

                        </div>
                    </div>
                    <?php saasdoctor_pagination(); ?>
                </div>
                <div class="<?php echo esc_attr($sidebar); ?>">
                    <?php get_template_part('layouts/sidebar', 'right'); ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();