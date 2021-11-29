<?php
if ( saasdoctor_has_footer_customise('sidebar') ) {
	do_action('saasdoctor_sidebar');
} else {
	if ( is_active_sidebar('sidebar-1')){
		echo '<div class="blog-left-sidebar">';
			dynamic_sidebar('sidebar-1');
		echo '</div>';
	}
}
?>

