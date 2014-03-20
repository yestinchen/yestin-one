<?php
/**
 * Footer section template.
 * @package WordPress
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<div class="clear"></div>
</div><!-- #page -->
<footer id="colophon" role="contentinfo">
	<div class="site-info">
		<div class="footercopy"><?php echo get_theme_mod( 'textarea_copy', 'custom footer text left' ); ?></div>
		<div class="footercredit"><?php echo get_theme_mod( 'custom_text_right', 'custom footer text right' ); ?></div>
		<div class="clear"></div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>