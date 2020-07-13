<div class="col-12 col-sm-6 col-lg-4 post-item">
    <div class="image">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="post-text">
        <span class="date"><?php the_time('F j, Y'); ?></span>
        <a href="<?php the_permalink(); ?>"><h3 class="last-post-title"><?php the_title(); ?></h3></a>
        <?php the_tags( '<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
        
        <p><?php echo wpuni_excerpt(32); ?></p>
        <div class="post-engagement flex">
            <p class="likes"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-heart.svg" /><span>17 faves</span></p>
            <p class="comments"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-comment.svg" /><span>22 comments</span></p>
        </div>
    </div>
</div>