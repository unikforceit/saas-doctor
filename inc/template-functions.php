<?php

add_filter( 'body_class', 'saasdoctor_bodyclass_checker' );
function saasdoctor_bodyclass_checker( $classes ) {
    $classes[] = 'checkerbody';
    return $classes;   
}

function saasdoctor_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'saas-doctor' ); ?></h2>
		<div class="nav-links"> 
			<?php 
				if ( $prev_link = get_previous_comments_link( esc_attr_( 'Older Comments', 'saas-doctor' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr_( 'Newer Comments', 'saas-doctor' )) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

function saasdoctor_comment_callback($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr($tag);?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="article">
    <?php endif; ?>
  
        <div class="author-pic"><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 64 ); ?></div>
        <div class="details">
 		<div class="author-meta">
	        <?php printf( __( '<div class="name"><h4>%s</h4></div>','saas-doctor' ), get_comment_author_link() ); ?>
	        <div class="date"><span><?php printf( __('%1$s','saas-doctor'),get_comment_date()); ?></span></div>
		</div>
		    <?php if ( $comment->comment_approved == '0' ) : ?>
		         <em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.','saas-doctor' ); ?></em>
		    <?php endif; ?>    
	    	
	    	<?php comment_text(); ?>	        
		    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> 
	   
	</div>
       
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }


function saasdoctor_logo(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );

    if ( $custom_logo_id ) {
        echo '<a class="site-logo" href='.esc_url( home_url( '/' ) ).' rel="home">'.wp_get_attachment_image( $custom_logo_id, 'full' ).'</a>';
    } else {
        echo '<a class="site-logo" href='.esc_url( home_url( '/' ) ).' rel="home">'.get_bloginfo( 'name' ).'</a>';
    }
}

function saasdoctor_post_tag() {
	
	if ( 'post' == get_post_type() ) {
		
    $posttags = get_the_tags();
    $separator = ' ';
    $output = '';
    if ($posttags) {

        foreach($posttags as $tag) {
            $output .='<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>'.$separator;
        }

		$tags= trim($output, $separator);
		echo '<div class="blog-tags"><span>'.esc_attr__( 'Tags: ', 'saas-doctor' ).'</span>'.$tags.'</div>';
		echo '<div class="blog-social">
                    <span>'.esc_attr__( 'Share: ', 'saas-doctor' ).'</span>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>';
    }
	}
}


function saasdoctor_single_category($default = true) {

	if ( 'post' == get_post_type() ) {
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
	
				$output .= '<a class="cat-links" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;

			}
		$cat= trim($output, $separator);
		echo '<span class="post-cat leffect-1">'.$cat.'</span>';
		}
	}

}

/*Filter searchform button markup*/
add_filter( 'get_search_form','saasdoctor_modify_search_form');

function saasdoctor_modify_search_form( $form ) {
    $form = '<form class="password-form" role="search" method="get" id="search-form" action="' .esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_attr__( 'Search for:','saas-doctor' ) . '</label>
    <input type="text" placeholder="' . esc_attr__( 'Type and hit enter','saas-doctor' ) . '" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="dashicons dashicons-search"></i></button>
    </div>
    </form>';
 
    return $form;
}
 

/*Filter password form markup*/
add_filter( 'the_password_form', 'saasdoctor_password_form' );
function saasdoctor_password_form() {
	 global $post;
	 $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	 $o = '<form class="postpass-form" action="' .
    esc_url( site_url( 'wp-login.php?action=postpass',
                      'login_post' ) ) .
    '" method="post">
	 ' . esc_attr__( 'This post is password protected and this is what I want to say about that. To view it please enter your password below:','saas-doctor') . '
	 <input class="post-pass" name="post_password" placeholder="' . esc_attr__( 'Type and hit enter','saas-doctor' ) . '" id="' . $label . '" type="password" />
	 </form>
	 ';
	 return $o;
}

/*No main nav fallback*/
function saasdoctor_no_main_nav( $args ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    extract( $args );

    $link = $link_before.'<a href="' .esc_url(admin_url( 'nav-menus.php' )). '">' . $before . esc_attr__('Please assign PRIMARY menu location','saas-doctor') . $after . '</a>'. $link_after;

    if ( FALSE !== stripos( $items_wrap, '<ul' ) or FALSE !== stripos( $items_wrap, '<ol' ) ){
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) ){
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo ){
        echo saasdoctor_html($output);
    }

    return $output;
}

function saasdoctor_navigation(){

	if ( saasdoctor_has_footer_customise('enb_single_nav') ) {

		do_action('saasdoctor_single_navigation');

	} else { ?>
        <?php
        $prev = get_previous_post(true);
        $next = get_next_post(true);

        if ($prev) {?>
            <div class="col-md-6">
                <div class="blog-details-np-inner prev position-relative">
                    <div class="blog-np-icon">
                        <a href="<?php echo get_permalink( $prev->ID ); ?>">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>
                    </div>
                    <div class="blog-np-text">
                        <span><?php esc_html_e('Previous', 'saas-doctor');?></span>
                        <h5>
                            <a href="<?php echo get_permalink( $prev->ID ); ?>">
                                <?php echo get_the_title($prev->ID)?>
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        <?php } if ($next) {?>
            <div class="col-md-6">
                <div class="blog-details-np-inner next position-relative">
                    <div class="blog-np-text">
                        <span><?php esc_html_e('Next', 'saas-doctor');?></span>
                        <h5>
                            <a href="<?php echo get_permalink( $next->ID ); ?>">
                                <?php echo get_the_title($next->ID)?>
                            </a>
                        </h5>
                    </div>
                    <div class="blog-np-icon">
                        <a href="<?php echo get_permalink( $prev->ID ); ?>">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php }?>

    <?php }
}

function saasdoctor_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="blog-pagination ul-li">
								<ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-angle-double-left"></i>') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fas fa-angle-double-right"></i>') );

    echo '</ul></div>' . "\n";

}
function saasdoctor_pagination(){

	if ( saasdoctor_has_footer_customise('enb_pagination') ) {

		do_action('saasdoctor_pagination');

	} else {

        saasdoctor_numeric_posts_nav();

	}
}

function saasdoctor_share_tags(){

	if ( saasdoctor_has_footer_customise('enb_share_tag') ) {

		do_action('saasdoctor_share_tags');

	} else {
		
		saasdoctor_post_tag();
	}
}

function saasdoctor_related_post(){

	if ( saasdoctor_has_footer_customise('enb_rpost') ) {

		do_action('saasdoctor_related_post');

	}else {
        $id = $GLOBALS['post']->ID;
        $postcat = wp_get_post_categories( $id );
        $all_cat = implode(',' , $postcat);
        $args = array(
            'posts_per_page' => 3,
            'post__not_in' => array($id),
        );
        $args['cat'] = $all_cat;
        $wp_query = new WP_Query($args);

        ?>
        <h2><?php esc_html_e('You may also Like', 'saas-doctor');?></h2>
        <p><?php esc_html_e('Over the past decade, we’ve helped some of the world’s most influential startups and companies innovate and grow their businesses.', 'saas-doctor');?></p>
        <?php
        if ( $wp_query->have_posts() ) {
            echo '<div class="row justify-content-center">';
            while ($wp_query->have_posts()) : $wp_query->the_post();?>
                <div class="col-lg-4 col-md-6">
                    <div class="related_postitem">
                        <div class="postitem_img">
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full'); ?></a>
                        </div>
                        <div class="postitem_text pera-content">
                            <span class="blog-meta"><?php echo get_the_date('d M Y'); ?></span>
                            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            <div class="read-more">
                                <a href="<?php the_permalink();?>"><?php esc_html_e('Read More', 'saas-doctor');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata();
            echo '</div>';
        }
        ?>

        <?php
    }
 
}

function saasdoctor_authorbox(){

	if ( saasdoctor_has_footer_customise('enb_authbox') ) {

		do_action('saasdoctor_authorbox');
	}
 
}

function saasdoctor_dynamic_header(){
    $header_switch = get_meta_custom_thm('header_switch');
    $opt_header = saasdoctor_has_footer_customise('opt_header');
    $opt_page_header = saasdoctor_has_footer_customise('opt_page_header');

    if ($header_switch && class_exists('saasdoctor_theme_hooks')){
            $header = new saasdoctor_theme_hooks();
            $header = $header->saasdoctor_render_header();
        return $header;
    }
    else{
        if (!is_page_template('theme-builder.php') && $opt_page_header) {
            echo do_shortcode('[INSERT_ELEMENTOR id="'.$opt_page_header.'"]');
        }
        elseif (is_page_template('theme-builder.php') && $opt_header) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_header . '"]');
        }else{
            get_template_part('template-parts/header','one');
        }
    }
}
function saasdoctor_dynamic_footer(){
    $footer_switch = get_meta_custom_thm('footer_switch');
    $opt_footer = saasdoctor_has_footer_customise('opt_footer');

    if ($footer_switch && class_exists('saasdoctor_theme_hooks')){
        $footer = new saasdoctor_theme_hooks();
        $footer = $footer->saasdoctor_render_footer();

        return $footer;
    }
    else{
       if ($opt_footer) {
           echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_footer . '"]');
       }else{
           get_template_part('template-parts/footer','one');
       }
    }
}
function saasdoctor_post_view($postID){
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}