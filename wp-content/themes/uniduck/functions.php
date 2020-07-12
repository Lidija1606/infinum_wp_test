<?php

// Change excerpt lenght
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