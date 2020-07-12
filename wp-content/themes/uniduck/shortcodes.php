<?php

// Quote Shortcode [quote][/quote] 
function shortcode_quote($params = array(), $content) {

    extract(shortcode_atts(array(
      'type' => ''
    ), $params));
  
    return
      '<blockquote class="quote"' .
      ($type ? " class=\"$type\"" : '') .
      '>' .
      do_shortcode($content) .
      '</blockquote>';
}

add_shortcode('quote', 'shortcode_quote');

// Show Latest Post Shortcode
function latest_post() {
    $args = array(
        'posts_per_page' => 1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>  
        <div class="left col-12 col-md pl-md-0">
            <?php the_post_thumbnail(); ?>
		</div>
		<div class="right col-12 col-md pr-md-0">
			<span class="date"><?php the_time('F j, Y'); ?></span>
			<a href="<?php the_permalink(); ?>"><h2 class="last-post-title"><?php the_title(); ?></h2></a>
			<?php the_tags( '<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
			<p><?php echo wpuni_excerpt(40); ?></p>
			<div class="post-engagement flex">
				<p class="likes"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-heart.svg" /><span>17 faves</span></p>
				<p class="comments"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-comment.svg" /><span>22 comments</span></p>
			</div>
		</div>
            
    <?php endwhile; endif; 
}
add_shortcode('lastest-post', 'latest_post');
  
?>