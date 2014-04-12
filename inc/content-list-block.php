<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="excerpt-thumb">
        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
            <a class="entry-yestin-img-cover" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'themonic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                <?php the_post_thumbnail('excerpt-thumbnail'); ?>
            </a>
        <?php endif;?>
    </div>

    <div class="post-entries-content">
        <header class="entry-header">
            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h1>            
        </header><!-- .entry-header -->
        <div class="entry-yestin-meta">
            <span><a class="link-comments" href="<?php  comments_link(); ?>"><?php comments_number(__('0 Comment','themonic'),__('1 Comment','themonic'),__('% Comments','themonic')); ?></a></span> 
            <span><?php echo get_post_views(get_the_ID());?>&nbsp;阅读</span>
            <span class="updated"><?php echo get_the_date();?></span>
            <span class="vcard author">
                <a class="fn" href="http://www.iyestin.com/" title="Yestin" rel="author">Yestin</a>
                <a class="fn" href="https://plus.google.com/112304573807678812758?rel=author" title="+Yestin">+</a>
                <?php //echo the_author_posts_link(); ?>
            </span>
            <div class="no-float"></div>
        </div>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

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

        <?php //Close div: post-entries-content?>
            </div>
            <div class="no-float"></div>
        </footer><!-- .entry-meta -->

</article><!-- #post -->