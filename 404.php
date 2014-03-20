<?php
/*
 * Template for displaying 404 pages.
 * Yestin One displays the list of recent posts and search box for better user experience.
 * @package WordPress - Yestin
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php if (function_exists('yestin_breadcrumbs')) yestin_breadcrumbs(); ?>

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Here!', 'themonic' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Kindly search your topic below or browse the recent posts.', 'themonic' ); ?></p>
					<?php get_search_form(); ?>
							
<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>


				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>