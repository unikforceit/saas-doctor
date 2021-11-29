<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-6'); ?>>
        <div class="related_postitem">
            <div class="postitem_img">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
            <div class="postitem_text pera-content">
                <span class="blog-meta"><?php the_date('d M Y'); ?></span>
                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                <div class="read-more">
                    <a href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'saas-doctor');?></a>
                </div>
            </div>
        </div>
</article>