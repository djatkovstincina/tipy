<?php
/**
 * Enqueue newer jquery on pages (not admin panel)
 */

if (!is_admin()) add_action("wp_enqueue_scripts", function () {
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/src/js/src/jquery-3.1.1.min.js', false, null);
	wp_enqueue_script('jquery');
}, 11);

/**
 * Enqueue scripts and styles.
 */
function tipytheme_scripts() {
	wp_enqueue_style( 'tipytheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tipytheme-slick', get_template_directory_uri() . '/src/js/src/slick.min.js', array('jquery'), true );

	wp_enqueue_script( 'tipytheme-script', get_template_directory_uri() . '/src/js/src/script.min.js', array('jquery'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'tipytheme_scripts' );