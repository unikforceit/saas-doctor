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

$latest_cat = saasdoctor_has_footer_customise('latest_post_cat');
$latest_id = saasdoctor_has_footer_customise('latest_post_id');

$popular_cat = saasdoctor_has_footer_customise('popular_post_cat');
$popular_id = saasdoctor_has_footer_customise('popular_post_id');

$trending_cat = saasdoctor_has_footer_customise('trending_post_cat');
$trending_id = saasdoctor_has_footer_customise('trending_post_id');
$t_post_per_page = saasdoctor_has_footer_customise('t_post_per_page');
?>
<section class="blog-section">
    <div class="container">
        <div class="blog-feed-wrapper">
            <div class="blog-latest-popular">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-index-latest-post">
                            <?php if (have_posts()) :
                            if ($latest_cat) {
                                $latest = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 1,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => $latest_cat,
                                        ),
                                    )
                                ];
                            } elseif ($latest_id) {
                                $latest = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 1,
                                    'post__in' => $latest_id,
                                    'orderby' => 'post__in'
                                ];
                            } else {
                                $latest = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 1,
                                ];
                            }
                            $latest_posts = new WP_Query($latest);

                            if ($latest_posts->have_posts()) :
                                while ($latest_posts->have_posts()) : $latest_posts->the_post();
                                    get_template_part('template-parts/latest', 'post');
                                    wp_reset_query();
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog-index-popular-post">
                            <h3 class="block-title"><?php esc_html_e('Popular Blog', 'saas-doctor'); ?></h3>
                            <?php
                            if ($popular_cat) {
                                $popular = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field' => 'term_id',
                                            'terms' => $popular_cat,
                                        ),
                                    )
                                ];
                            } elseif ($popular_id) {
                                $popular = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'post__in' => $popular_id,
                                    'orderby' => 'post__in'
                                ];
                            } else {
                                $popular = [
                                    'post_type' => 'post',
                                    'posts_per_page' => 3
                                ];
                            }
                            $popular_posts = new WP_Query($popular);

                            if ($popular_posts->have_posts()) :
                                while ($popular_posts->have_posts()) : $popular_posts->the_post();
                                    get_template_part('template-parts/popular', 'post');
                                    wp_reset_query();
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trending-blog-post">
                <h3 class="trending-title"><?php esc_html_e('Trending Blog', 'saas-doctor'); ?></h3>
                <div class="trending-nav">
                    <div class="swiper-button-next"><i class="fas fa-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="fas fa-arrow-left"></i></div>
                </div>
                <div class="swiper-container trending-slider">
                    <div class="swiper-wrapper">
                        <?php
                        if ($trending_cat) {
                            $trending = [
                                'post_type' => 'post',
                                'posts_per_page' => $t_post_per_page,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => $trending_cat,
                                    ),
                                )
                            ];
                        } elseif ($trending_id) {
                            $trending = [
                                'post_type' => 'post',
                                'posts_per_page' => $t_post_per_page,
                                'post__in' => $trending_id,
                                'orderby' => 'post__in'
                            ];
                        } else {
                            $trending = [
                                'post_type' => 'post',
                                'posts_per_page' => 12
                            ];
                        }
                        $trending_posts = new WP_Query($trending);

                        if ($trending_posts->have_posts()) :
                            while ($trending_posts->have_posts()) : $trending_posts->the_post();
                                get_template_part('template-parts/trending', 'post');
                                wp_reset_query();
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="blog-view-post">
                <h3 class="viewed-title"><?php esc_html_e('Most Viewed Blog', 'saas-doctor'); ?></h3>
                <div class="row">
                    <?php
                    $viewed = [
                        'posts_per_page' => 3,
                        'meta_key' => 'post_views_count',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                    ];
                    $viewed_post = new WP_Query($viewed);
                    if ($viewed_post->have_posts()) :
                        while ($viewed_post->have_posts()) : $viewed_post->the_post();
                            get_template_part('template-parts/viewed', 'post');
                        endwhile; endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <?php
            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
