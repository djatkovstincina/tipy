<?php
/**
 * @package tipytheme
 */

 global $globalSite;
 $site_logo = get_field('site_logo', 'option');
 ?><!DOCTYPE html>
 <html <?php language_attributes(); ?>>
 <head>
	 <meta charset="<?php bloginfo( 'charset' ); ?>">
	 <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	 <link rel="profile" href="http://gmpg.org/xfn/11">
	 <link rel="icon" href="<?php echo get_template_directory_uri() . '/src/images/favicon.ico'; ?>" type="image/x-icon" />
	 <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?>>
 <div id="page" class="site">
	 <div class="m-overlay"></div>
	 <header class="site-header" role="banner">
		 <div class="wrapper">
			 <a href="<?php _e( home_url( '/' ) ); ?>" id="brand" class="site-logo">
				 <img src="<?php
				 if ($site_logo): echo $site_logo; endif; ?>" alt="Tipy">
			 </a>
			<nav id="site-navigation" class="site-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<div class="login">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'secondary-menu' ) ); ?>
			</div>
		 </div>
	 </header>
 