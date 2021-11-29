<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post-details'); ?>>
    <?php saasdoctor_post_view(get_the_ID())?>
    <div class="post-header">
        <div class="details">
            <?php saasdoctor_single_category();?>
        </div>
        <div class="title">
            <h2><?php the_title() ?></h2>
        </div>
        <div class="excerpt pera-content">
            <?php the_excerpt();?>
        </div>
    </div>
    <?php if ( has_post_thumbnail() ) {;?>
    <div class="post-thumb">
        <?php the_post_thumbnail();?>
    </div>
    <?php } ?>
    <div class="blog-meta">
        <div class="author">
            <?php saasdoctor_post_author();?>
        </div>
        <div class="date">
           <?php saasdoctor_post_date();?>
        </div>
    </div>
    <div class="scnd-title">
        <h3><?php the_title() ?></h3>
    </div>
    <div class="pera-content">
        <?php the_content();?>
    </div>
    <div class="post-navigator">
        <div class="row">
            <?php saasdoctor_navigation()?>
        </div>
    </div>
</div>