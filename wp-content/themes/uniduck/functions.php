<?php

// Show Latest Post Shortcode
function latest_post() {
    $args = array(
        'posts_per_page' => 1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>  
        <div class="left col-6 pl-0">
            <?php the_post_thumbnail(); ?>
		</div>
		<div class="right col-6 pr-0">
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

// Change excerpt length
function wpuni_excerpt($limit) {
    $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( ' Read More', 'textdomain' )
    );

    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...'.$more;
    } else {
        $excerpt = implode(" ",$excerpt);
    }

    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
}
    
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...'.$more;
    } else {
        $content = implode(" ",$content);
    }

    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
    return $content;
}

function wpuni_theme_styles() {

    // Bootstrap CSS
    wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );

    // Main CSS
    wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpuni_theme_styles' );

function wpuni_theme_js() {

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'wpuni_theme_js' );

?>