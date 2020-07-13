<?php

add_theme_support( 'post-thumbnails' );
add_theme_support('html5',array('search-form'));

// Including shortcodes.php file
include('shortcodes.php');



// Blog Post Page top widget with title & search bar
function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>'
	));

}
wpt_create_widget( 'Blog Page Sidebar', 'blog', 'Displays on the top of the Blog Post Page' );

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
    // Register the script
    wp_register_script( 'loadmore_script', get_stylesheet_directory_uri(). '/js/loadMoreAjax.js', array('jquery'), false, true );

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );
    wp_localize_script( 'loadmore_script', 'blog', $script_data_array );
    
    // Enqueued script with localized data.
    wp_enqueue_script( 'loadmore_script' );

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), '', true );

    // Main JS
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'wpuni_theme_js' );

// Load More Posts with WP Ajax
function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '6',
        'paged' => $paged,
    );
    $blog_posts = new WP_Query( $args );
    ?>
 
    <?php if ( $blog_posts->have_posts() ) : ?>
        <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
        
            <!-- Blog Post Item -->
            <?php get_template_part( 'template-parts/blog-post-item' ); ?>

        <?php endwhile; ?>
        <?php
    endif;
 
    wp_die();
}

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

?>
