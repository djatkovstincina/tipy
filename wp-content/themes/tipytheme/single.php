<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tipytheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			while ( have_posts() ) : the_post();

				/**
				 * If we have template part for post format and
				 * we are on post format single.
				 *
				 * WordPress will first look for for 'content-post_type.php'
				 */

				if ( post_type_exists( get_post_type() ) ) {
					get_template_part( 'template-parts/post/content', get_post_type() );
				}
				/**
				 * If, above doesn't apply
				 */
				else {
					get_template_part( 'template-parts/post/content' );
				}

				/**
				 * Get the comments list and form
				 * @link https://developer.wordpress.org/reference/functions/comments_template/
				 */
				comments_template( '', true );

			endwhile; // end of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();