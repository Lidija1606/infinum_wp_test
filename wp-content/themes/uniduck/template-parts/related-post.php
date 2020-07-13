<div class="post-item">
    <div class="image col-12 col-sm-6 pl-sm-0">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="post-text col-12 col-sm-6 pr-sm-0">
        <a href="<?php the_permalink(); ?>"><h4 class="title"><?php the_title(); ?></h4></a>                                
        <p><?php echo wpuni_excerpt(11); ?></p>
    </div>
</div>