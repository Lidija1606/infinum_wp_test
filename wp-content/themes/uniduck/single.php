<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
    
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="hero-overlay">
                <h1 class="text-white text-center"><?php the_title(); ?></h1>
                <p class="author">
                    <img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-writer.svg" alt="Uniduck | Author" />
                    <span class="text-white"><?php echo get_the_author_meta('nickname'); ?></span>
                </p>
            </div>
            <a href="<?php echo home_url('/'); ?>" class="back-btn text-white">Back to blog</a>
        </section>

        <!-- Blog Post Page Content -->
        <section class="container section-padding">
            <?php the_content(); ?>
        </section>

        <!-- Related Posts Section -->
        <section class="container related-post section-padding">
            <h4>More Magic</h4>
            <?php
                $tags = wp_get_post_tags($post->ID);

                if ($tags) {
                    $first_tag = $tags[0]->term_id;
                    $args=array(
                    'tag__in' => array($first_tag),
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=>1,
                    'caller_get_posts'=>1
                    );
                    $my_query = new WP_Query($args);

                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="post-item">
                            <div class="image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="post-text">
                                <a href="<?php the_permalink(); ?>"><h3 class="last-post-title"><?php the_title(); ?></h3></a>                                
                                <p><?php echo wpuni_excerpt(11); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                    }
                    wp_reset_query();
                }
            ?>
        </section>

    <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
    <?php endif; ?>
			
<?php get_footer(); ?>