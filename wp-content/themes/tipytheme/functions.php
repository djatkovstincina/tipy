<?php
/**
 * tipytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tipytheme
 */


/**
 * Implement custom includes
 */
// Include default custom options from _u
require get_template_directory() . '/inc/default_u/index.php';

// include general content functions
include( get_template_directory() . '/inc/general/index.php' );

// include meta content functions
include( get_template_directory() . '/inc/meta/index.php' );

// Include acf functions
include( get_template_directory() . '/inc/acf/index.php' );

// include flexible content functions -> Always keep at bottom
include( get_template_directory() . '/inc/flexible/index.php' );