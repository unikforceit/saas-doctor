<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'saasdoctor_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function saasdoctor_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'saas-doctor' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'saas-doctor', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
 
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array(
            'gallery',
            'quote',
            'video',
            'aside',
            'image',
            'link',
            'status',
            'audio',
        ) );
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'saas-doctor' ),
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		) );
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'saasdoctor_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'saasdoctor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saasdoctor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saasdoctor_content_width', 640 );
}
add_action( 'after_setup_theme', 'saasdoctor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saasdoctor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'saas-doctor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'saas-doctor' ),
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'saas-doctor' ),
		'id'            => 'footer-widget',
		'description'   => esc_html__( 'Add footer widgets here.', 'saas-doctor' ),
		'before_widget' => '<div class="col-lg-6"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'saasdoctor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saasdoctor_scripts() {

	wp_enqueue_style('saasdoctor-poppins',  'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
	wp_enqueue_style('saasdoctor-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('saasdoctor-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
    wp_enqueue_style('saasdoctor-animate', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('saasdoctor-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('saasdoctor-swipper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('saasdoctor-default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('saasdoctor-saas', get_template_directory_uri() . '/assets/scss/saas.css');
	wp_enqueue_style('saasdoctor-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
	wp_enqueue_script('saasdoctor-bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), saasdoctor_theme_version(), true);
	wp_enqueue_script('saasdoctor-jquery-magnific-popup',get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), saasdoctor_theme_version(), true);
	wp_enqueue_script('saasdoctor-owl-swipper',get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), saasdoctor_theme_version(), true);
	wp_enqueue_script('saasdoctor-wow',get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), saasdoctor_theme_version(), true);
	wp_enqueue_script('saasdoctor-script',get_template_directory_uri() . '/assets/js/unit.js', array('jquery'), saasdoctor_theme_version(), true);
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'saasdoctor_scripts', 5);

function saasdoctor_admin_css() {
    wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'saasdoctor_admin_css' );

function saasdoctor_theme_version(){
    $saasdoctortheme = wp_get_theme();
    $saasdoctor_version = esc_html($saasdoctortheme->get( 'Version' ));
    return $saasdoctor_version;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which loaded from plugin.
 */
require get_template_directory() . '/inc/plug-dependent.php';

/**
 * Load plugin recommendation.
 */
 
require_once get_template_directory() . '/inc/plugin-recommendations.php';

