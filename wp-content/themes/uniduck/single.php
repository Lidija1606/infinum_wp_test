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

    <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
    <?php endif; ?>
			
<?php get_footer(); ?>