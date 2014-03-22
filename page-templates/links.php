<?php
/**
 * Template Name: Links
 *
 * Description: Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress - Yestin
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */

get_header(); ?>


    <div id="primary" class="site-content">
        <div id="content" role="main">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="article-content">
                            <ul class="p-links">
                                <?php wp_list_bookmarks(array()); ?>
                            </ul>
                            <?php the_content(); ?>
                        </article>
                <?php comments_template( '', true ); ?>
            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>