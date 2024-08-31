<?php

/**
 * 
 * Custom Excerpt function for Advanced Custom Fields
 *
 * @param ACF field $field - field with content to do excerpt
 */

function get_tipytheme_excerpt($field, $count = '', $end = '') {
    global $post;

    if ( '' != $field ) {
        $field = strip_shortcodes( $field );
        $field = apply_filters('the_content', $field);
        $field = str_replace(']]&gt;', ']]&gt;', $field);
        //$excerpt_length = rand(22, 60); for randoming
        if( $count ) $excerpt_length = $count;
        else $excerpt_length = 60;

        if( $end ) $excerpt_more = apply_filters('excerpt_more', ' ' . $end);
        else $excerpt_more = apply_filters('excerpt_more', ' ' . '...');

        $field = wp_trim_words( $field, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $field);
}

/**
 * Social network function
 * 
 * Echo ustom Excerpt function for Advanced Custom Fields
 *
 * @param ACF field $field - field with content to do excerpt
 */

function the_tipytheme_excerpt($field, $count = '', $end = '') {
    
    echo get_tipytheme_excerpt($field, $count, $end);
}
