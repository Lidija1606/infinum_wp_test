<?php get_header(); ?>

    <!-- Page Title Section -->
    <section class="title-section container section-padding">
        <h1 class="text-center">The Unicorn & a Duck</h1>
        <input id="search" class="form-control" type="search" placeholder="Search blog" aria-label="Search">
    </section>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

    <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
    <?php endif; ?>
			
<?php get_footer(); ?>