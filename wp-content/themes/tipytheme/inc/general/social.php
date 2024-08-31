<?php
/**
 * Social networking
 *
 * Custom functionality for social networking
 *
 * @package WordPress
 */

/**
 * Social network function
 * 
 * Echo social networks from custom fields in Theme General Settings / Social Network
 *
 * @param string $wrapper_class - class name for wrapper if there is any
 */

function social_network( $wrapper_class = '' ) {

	// Open wrapper div if there is any
	if( $wrapper_class ) echo '<div class="' . $wrapper_class . '">';

	if( have_rows('socials', 'options') ): ?>
		<ul class="social">
			<?php
			while( have_rows('socials', 'options') ): the_row();
				$social = get_sub_field('social');
				$link = get_sub_field('link');
				$tumb = get_sub_field('tumb');
				$vim = get_sub_field('vim');
				$face = get_sub_field('face');
				$twit = get_sub_field('twit');
				$goo = get_sub_field('goo');
				$you = get_sub_field('you');
				$insta = get_sub_field('insta');
				$pint = get_sub_field('pint');
				$skype = get_sub_field('skype');
				$xing = get_sub_field('xing'); ?>

				
		        <?php
		        if ($social == 'Linkedin'): ?>
		            <li>
		                <a href="<?php echo $link; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Tumblr'): ?>
		            <li>
		                <a href="<?php echo $tumb; ?>" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Vimeo'): ?>
		            <li>
		                <a href="<?php echo $vim; ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Facebook'): ?>
		            <li>
		                <a href="<?php echo $face; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Twitter'): ?>
		            <li>
		                <a href="<?php echo $twit; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Google +'): ?>
		            <li>
		                <a href="<?php echo $goo; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Youtube'): ?>
		            <li>
		                <a href="<?php echo $you; ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Instagram'): ?>
		            <li>
		                <a href="<?php echo $insta; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Pinterest'): ?>
		            <li>
		                <a href="<?php echo $pint; ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Skype'): ?>
		            <li>
		                <a href="<?php echo $skype; ?>" target="_blank"><i class="fa fa-skype" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif;
		        if ($social == 'Xing'): ?>
		            <li>
		                <a href="<?php echo $xing; ?>" target="_blank"><i class="fa fa-xing" aria-hidden="true"></i></a>
		            </li>
		        <?php
		        endif; ?>
			<?php	
			endwhile; ?>

		</ul>
	<?php	
	endif;
	// Close wrapper div if there is any
	if( $wrapper_class ) echo '</div>';
}

/**
 * Get the sharing link
 *
 * Helper function for share links
 *
 * @param  string $network   Network to share to, will be used for svg icon as well
 * @param  string $link      Considering this is one pager, link is just id of element we want to link to
 * @param  string $text      Some networks allow extra text (Twitter)
 * @param  string $hashtags  Hashatgs (Twitter)
 * @return string            Returns share link markup
 */
function get_share_link( $network = '', $icon = false, $hashtags = '', $text = '') {
	$print_name = '';
	$link = get_permalink();
	if( !$text ) $text = get_the_title();
	if ( $network == 'twitter' ) {
		/**
         * Example usage: share_link('facebook', true); or share_link('twitter', false, 'lol,hi,hashtag', 'Custom Text For Twitter') ...
		 */
		$href = 'http://twitter.com/share?text=' . $text . ' - ' . '&url=' . $link . '&hashtags=' . $hashtags;
		if( !$icon ) $print_name = 'Twitter'; else $print_name = '<i class="fa fa-twitter" aria-hidden="true"></i>';
		
	} elseif ( $network == 'facebook' ) {
		$href = 'http://www.facebook.com/sharer/sharer.php?u=' . $link;
		if( !$icon ) $print_name = 'Facebook'; else $print_name = '<i class="fa fa-facebook" aria-hidden="true"></i>';
	} elseif ( $network == 'google' ) {
		$href = 'https://plus.google.com/share?url=' . $link;
		if( !$icon ) $print_name = 'Google +'; else $print_name = '<i class="fa fa-google-plus" aria-hidden="true"></i>';
	} elseif ( $network == 'linkedin' ) {
		$href = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $link . '&title=' . $text . '&summary=&source=';
		if( !$icon ) $print_name = 'Linkedin'; else $print_name = '<i class="fa fa-linkedin" aria-hidden="true"></i>'; 
	} else {
		return;
	}

	$output = '<a href="' . $href . '"';

	$output .= ' onclick="javascript:window.open(this.href, \'\',\'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=650,centerscreen=yes\');return false;"';

	$output .= '>';
	$output .= $print_name;

	$output .= '</a>';

	return $output;
}
/**
 * Share link
 *
 * Echo share link
 *
 * @param  string $network   Network to share to, will be used for svg icon as well
 * @param  string $link      Considering this is one pager, link is just id of element we want to link to
 * @param  string $text      Some networks allow extra text (Twitter)
 * @param  string $hashtags  Hashatgs (Twitter)
 * @return string            Echoes share link markup
 */
function share_link( $network = '', $link = '', $text = '', $hashtags = '' ) {
	echo get_share_link( $network, $link, $text, $hashtags );
}
