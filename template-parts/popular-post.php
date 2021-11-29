<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-popular-post-content'); ?>>
    <div class="blog-single-item">
        <div class="news-content">
            <div class="title">
                <?php the_title('<h4><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>'); ?>
            </div>
            <div class="date">
                <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>">
                    <?php echo get_the_time('M j, Y'); ?>
                </a>
            </div>
            <div class="news-bottom">
                <a href="<?php echo esc_url(get_permalink()) ?>"
                   class="readmore-btn"><i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</article>