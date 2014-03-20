<?php
/*
 * Content display template, used for both single and index/category/search pages.
 * Iconic One uses custom excerpts on search, home, category and tag pages.
 * @package WordPress - Yestin
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */
?>
<?php
	if (is_single()):
		require( get_template_directory() . '/inc/content-full.php' );
	elseif (is_search() || is_home() || is_tag()) :
		require( get_template_directory() . '/inc/content-list-block.php' );
	else :
		require (get_template_directory() . '/inc/content-list-timeline.php');
?>
<?php endif;?>