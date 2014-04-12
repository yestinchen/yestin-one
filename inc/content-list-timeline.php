
<div class="yestin-entry-list" id="post-<?php the_ID(); ?>" >
    <span class="updated"><?php echo get_the_date();?></span>
    <a class="title" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        
    <span class="right">
        <span class="vcard author">
            <a class="fn" href="http://www.iyestin.com/" title="Yestin" rel="author">Yestin</a>
            <a class="fn" href="https://plus.google.com/112304573807678812758?rel=author" title="+Yestin">+</a>
            <?php //echo the_author_posts_link(); ?>
        </span>
        <a class="link-comments" href="<?php  comments_link(); ?>">(<?php comments_number('0','1','%'); echo '/',get_post_views(get_the_ID());?>)</a>
    </span>
</div>