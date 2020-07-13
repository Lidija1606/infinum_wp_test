<?php get_header(); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
    
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <?php the_post_thumbnail('full'); ?>
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
        <section class="container section-padding blog-post-content flex">
            <?php the_content(); ?>
            <?php the_tags( '<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
        </section>

        <section class="container related-post">

            <?php
                $tags = wp_get_post_tags($post->ID);

                if ($tags) {
                    $first_tag = $tags[0]->term_id;
                    $tagname = $tags[0]->name; 
                    $args=array(
                    'tag__in' => array($first_tag),
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=>1,
                    'caller_get_posts'=>1
                    );
                    $related_post = new WP_Query($args);

                    if( $related_post->have_posts() ) {
                    while ($related_post->have_posts()) : $related_post->the_post(); ?>
                        <h4>More <?php echo $tagname ?></h4>
                        <!-- Related Post Item -->
                        <?php get_template_part( 'template-parts/related-post' ); ?>

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