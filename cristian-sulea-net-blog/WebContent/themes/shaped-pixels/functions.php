<?php
/**
 * Shaped Pixels functions and definitions
 *
 * @package Shaped Pixels
 */



	
	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'shaped_pixels_setup' ) ) :
function shaped_pixels_setup() {
	
	
/**
 * Set the content width based on the theme's design and stylesheet.
 * This theme gives you up to 1320 pixels of content width.
 */
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 980;
	
	function shaped_pixels_content_width() {
		if ( is_page_template( 'full-width.php' ) || is_attachment() ) {
			global $content_width;
			$content_width = 1320;
		}
	}
	add_action( 'template_redirect', 'shaped_pixels_content_width' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Shaped Pixels, use a find and replace
	 * to change 'shaped-pixels' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'shaped-pixels', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();

	/**
	 * Add support for shortcodes in the default text widget
	 * @see http://codex.wordpress.org/Function_Reference/do_shortcode
	 */	
	add_filter('widget_text', 'do_shortcode');	
		
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wps_nav_menu() in three locations.

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'shaped-pixels' ),
		'footer'  => __( 'Footer Menu', 'shaped-pixels' ),
		'social'  => __( 'Social Menu', 'shaped-pixels' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'quote', 'link', 'status',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', 
	apply_filters( 'shaped_pixels_custom_background_args', array(
		'default-color' => '4f5357',
		'default-image' => get_stylesheet_directory_uri() . '/images/scanlines.png',
		'default-attachment' => 'fixed',
	) ) );
}
endif; // shaped_pixels_setup
add_action( 'after_setup_theme', 'shaped_pixels_setup' );


/**
 * Enqueue styles and scripts.
 */
function shaped_pixels_scripts() {
	// Add Google Fonts, used in the main stylesheet.
	wp_enqueue_style('shaped-pixels-googleFonts', '//fonts.googleapis.com/css?family=Raleway:400,600');
	
	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'shaped-pixels-genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.3' );
	
	// Load our responsive stylesheet based on Bootstrap
	wp_enqueue_style( 'shaped-pixels-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array( ), '3.2.1' );
	
	// Load our main stylesheet	
	wp_enqueue_style( 'shaped-pixels-style', get_stylesheet_uri() );
	
	// Load our mobile navigation script
	wp_enqueue_script( 'shaped-pixels-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );

	// Load our skip-link-focus-fix script
	wp_enqueue_script( 'shaped-pixels-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Load our comments when viewing the single post or page
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shaped_pixels_scripts' );

/**
 * Implement the Custom Header feature.
 * Reserved for a future version of this theme. 
 * You can implement this if you require it now.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load widget positions.
 */
require get_template_directory() . '/inc/widgets.php';