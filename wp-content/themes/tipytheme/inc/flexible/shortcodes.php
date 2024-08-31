<?php
/**
 * 
 * Custom Shortcodes function
 *
 * @link https://codex.wordpress.org/Shortcode_API
 * 
 * @param ACF field $field - field with content to do excerpt
 *
 */

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

// Shortcode example:
add_shortcode( 'example', function () {
    return example_function();
} );

//Use: [example] - Will do example_function()