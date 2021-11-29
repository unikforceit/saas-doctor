<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-trending-post-content swiper-slide'); ?>>
    <div class="blog-single-item">
        <?php if (has_post_thumbnail()){?>
        <div class="postitem_img">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail([217, 149]); ?></a>
        </div>
        <?php }?>
        <div class="news-content">
            <div class="title">
                <h4><a href="<?php the_permalink();?>" rel="bookmark"><?php echo wp_trim_words(get_the_title(), 4, ''); ?></a></h4>
            </div>
            <div class="excerpt pera-content">
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </div>
</article>