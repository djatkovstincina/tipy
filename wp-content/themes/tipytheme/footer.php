<?php
/**
 * @package tipytheme
 */
$footer_logo = get_field('footer_logo', 'option');
$copyright_year = get_field('copyright_year', 'option');
$copyright_link = get_field('copyright_link', 'option');
$footer_copy = get_field('footer_copy', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="footer" role="contentinfo">
		<div class="wrapper">
			<div class="wrap">
				<div class="md-12">
					<img class="footer-logo" src="<?php
					if ($footer_logo): echo $footer_logo; endif; ?>" alt="Tipy">
				</div>
			</div>
			<div class="wrap">
				<div class="md-8">
					<nav id="footer-navigation" class="footer-navigation" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'footer-menu' ) ); ?>
					</nav>
				</div>
				<div class="md-4">
					<div class="footer-social">
						<?php social_network(); ?>
					</div>
				</div>
			</div>
			<div class="wrap footer-bottom">
				<div class="md-8">
					<p class="footer-copy">© <?php echo $copyright_year; ?> <a href="<?php echo $copyright_link; ?>">Tipy</a> – All Rights Reserved</p>
				</div>
				<div class="md-4">
					<p class="footer-privacy"><a href="<?php echo $footer_copy['url']; ?>"><?php echo $footer_copy['title']; ?></a></p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
