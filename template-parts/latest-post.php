<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-latest-post-content'); ?>>
    <div class="row">
        <div class="col-lg-6 col-md-7">
            <div class="latest-left-content">
                <h3 class="block-title"><?php saasdoctor_single_category(); ?></h3>
                <div class="news-content">
                    <div class="title">
                        <?php the_title('<h3><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
                    </div>
                    <div class="pera-text">
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-5">
            <?php if (has_post_thumbnail()) : ?>
                <div class="img-container">
                    <div class="thumb">
                        <a href="<?php echo esc_url(get_permalink()) ?>">
                            <?php the_post_thumbnail('full'); ?>
                        </a>
                    </div>
                    <div class="news-bottom">
                        <a href="<?php echo esc_url(get_permalink()) ?>"
                           class="readmore-btn"><?php esc_html_e('Continue Reading', 'saas-doctor') ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>
