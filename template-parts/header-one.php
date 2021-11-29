<?php 
    $arg = [
        'cat' => '<span class="niotitle">'.esc_html__('Category','saas-doctor').'</span>',
        'tag' => '<span  class="niotitle">'.esc_html__('Tag','saas-doctor').'</span>',
        'author' => '<span  class="niotitle">'.esc_html__('Author','saas-doctor').'</span>',
        'year' => '<span  class="niotitle">'.esc_html__('Year','saas-doctor').'</span>',
        'notfound' => '<span  class="niotitle">'.esc_html__('Not found','saas-doctor').'</span>',
        'search' => '<span  class="niotitle">'.esc_html__('Search for','saas-doctor').'</span>',
        'marchive' => '<span  class="niotitle">'.esc_html__('Monthly archive','saas-doctor').'</span>',
        'yarchive' => '<span  class="niotitle">'.esc_html__('Yearly archive','saas-doctor').'</span>',
    ];

if (is_home() && get_option('page_for_posts')  ) {
    $title = 'Blog';
} elseif (is_front_page()){
    $title = 'Front Page';
}else {
    $title = get_the_title();
}
?>
<!-- Start of header section
	============================================= -->
<!--Header Navigation -->
<div id="main-header" class="main-header-area default-saasdoctor-header header-nav-style">
    <div class="container">
        <div class="header-main-menu  clearfix">
            <div class="site-logo float-left">
                <?php saasdoctor_logo();?>
            </div>
            <div class="main-header-menu-item float-right">
                <nav class="main-navigation-area clearfix ul-li">
                    <?php
                    echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'],
                        wp_nav_menu( array(
                                'container' => false,
                                'echo' => false,
                                'menu_id' => 'm-main-nav',
                                'theme_location' => 'primary',
                                'fallback_cb'=> 'saasdoctor_no_main_nav',
                                'items_wrap' => '<ul class="menu-navigation">%3$s</ul>',
                            )
                        ));
                    ?>
                </nav>
            </div>
        </div>
        <div class="str-mobile_menu relative-position">
            <div class="str-mobile_menu_button str-open_mobile_menu">
                <i class="fas fa-bars"></i>
            </div>
            <div class="str-mobile_menu_wrap">
                <div class="mobile_menu_overlay str-open_mobile_menu"></div>
                <div class="str-mobile_menu_content">
                    <div class="str-mobile_menu_close str-open_mobile_menu">
                        <span><i class="fas fa-times"></i></span>
                    </div>
                    <div class="m-brand-logo text-center">
                        <?php saasdoctor_logo();?>
                    </div>
                    <nav class="str-mobile-main-navigation  clearfix ul-li">
                        <?php
                        echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'],
                            wp_nav_menu( array(
                                    'container' => false,
                                    'echo' => false,
                                    'menu_id' => 'main-nav',
                                    'theme_location' => 'primary',
                                    'fallback_cb'=> 'saasdoctor_no_main_nav',
                                    'items_wrap' => '<ul class="navbar-nav text-capitalize clearfix">%3$s</ul>',
                                )
                            ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
        <!-- /mobile-menu -->
    </div>
</div>
<!-- End Header Section -->
<!-- Start of bredcrumb  section
	============================================= -->