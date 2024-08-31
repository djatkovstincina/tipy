<?php
/**
 *
 * Add Theme Options on Admin Panel
 *
 */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Social Settings',
		'menu_title'	=> 'Social Networks',
		'parent_slug'	=> 'theme-general-settings',
	));
}