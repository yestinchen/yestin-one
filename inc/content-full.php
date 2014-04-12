<?php 
/*Display full content,used for single.
 * @package WordPress - Yestin
 * @subpackage Yestin_One
 * @since Yestin One 1.0
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="below-title-meta">
                    <div class="adt">
                    <?php _e('By','themonic'); ?>
                    <span class="vcard author">
                        <a class="fn" href="http://www.iyestin.com/" title="Yestin" rel="author">Yestin</a>
                        <a class="fn" href="https://plus.google.com/112304573807678812758?rel=author" title="+Yestin">+</a>
                        <?php //echo the_author_posts_link(); ?>
                    </span>
                     <span class="meta-sep">|</span> 
                     <span class="date updated"><?php echo get_the_date(); ?> </span>
                     </div>
                     <div class="adt-comment">
                        <span><?php echo get_post_views(get_the_ID());?>&nbsp;阅读</span>
                        <span class="meta-sep">|</span> 
                        <a class="link-comments" href="<?php  comments_link(); ?>"><?php comments_number(__('0 Comment','themonic'),__('1 Comment'),__('% Comments')); ?></a></span> 
                     </div>       
                 </div><!-- below title meta end -->
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themonic' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'themonic' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
        <span>分类: <?php the_category(' '); ?></span> <span><?php the_tags(); ?></span> 
            <?php edit_post_link( __( 'Edit', 'themonic' ), '<span class="edit-link">', '</span>' ); ?>
            <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
                <div class="author-info">
                    <div class="author-avatar">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 68 ) ); ?>
                    </div><!-- .author-avatar -->
                    <div class="author-description">
                        <h2><?php printf( __( 'About %s', 'themonic' ), get_the_author() ); ?></h2>
                        <p><?php the_author_meta( 'description' ); ?></p>
                        <div class="author-link">
                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'themonic' ), get_the_author() ); ?>
                            </a>
                        </div><!-- .author-link -->
                    </div><!-- .author-description -->
                </div><!-- .author-info -->
            <?php endif; ?>
        </footer><!-- .entry-meta -->

    <?php require_once( get_template_directory() . '/inc/baidu-share.php' ); ?>
    <div class="clear"></div>
</article><!-- #post -->