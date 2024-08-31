<?php
/**
 *
 * This functions are dependency functions for the theme
 *
 */

if ( ! function_exists( 'tipytheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tipytheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tipytheme, use a find and replace
	 * to change 'tipytheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tipytheme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'tipytheme' ),
		'menu-2' => esc_html__( 'Secondary', 'tipytheme' ),
	) );

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
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tipytheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'tipytheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tipytheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tipytheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'tipytheme_content_width', 0 );

/**
 * Global variables
 * The most used WordPress core functions.
 * @example echo $globalSite['theme_url']
 */
function tipy_global_site() {
    $site = array(
        'home' 					=> esc_url( home_url( '/' ) ),
        'name'					=> get_bloginfo( 'name' ),
        'description'			=> get_bloginfo( 'description' ),
        'language'				=> get_bloginfo( 'language' ),
        // this is the only way to get title for blog page ( index.php )
        'blog' 					=> get_option( 'page_for_posts', true ),
        'posts_per_page'        => get_option( 'posts_per_page' ),

        'wpurl'					=> get_bloginfo( 'wpurl' ),
        'url'					=> get_bloginfo( 'url' ),
        'rss_url'				=> get_bloginfo( 'rss_url' ),
        'rss2_url'				=> get_bloginfo( 'rss2_url' ),

        'template_url' 			=> get_bloginfo( 'template_url' ),
        'stylesheet_url'		=> get_bloginfo( 'stylesheet_url' ),
        'stylesheet_directory'	=> get_bloginfo( 'stylesheet_directory' ),
        'theme_url' 			=> get_template_directory_uri(),
        'upload_dir' 			=> wp_upload_dir(),

        'admin' 				=> admin_url(),
        'admin_email'			=> get_bloginfo( 'admin_email' ),
        'admin_profile' 		=> admin_url( 'profile.php' ),

        'version' 				=> get_bloginfo( 'version' )
    );
    return apply_filters( 'tipy_global_site_filter', $site );
}
$globalSite = tipy_global_site();
global $globalSite;