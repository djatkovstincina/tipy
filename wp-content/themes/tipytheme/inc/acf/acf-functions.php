<?php
/**
 *
 * Random helpful functions for ACF
 *
 */

/**
 *
 * Insert acf.css into admin panel (in case some field need specific styling)
 *
 */

add_action('acf/input/admin_head', function () { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/acf/acf.css">
<?php
});

