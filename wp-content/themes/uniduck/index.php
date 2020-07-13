<?php get_header(); ?>

	<!-- Page Title Section -->
	<section class="title-section container section-padding">
		<h1 class="text-center">The Unicorn & a Duck</h1>
		<?php get_sidebar( 'blog' ); ?>
	</section>

    <!-- Last Blog Post Section -->
    <section class="last-blog-post flex container section-padding">
        <?php echo do_shortcode('[lastest-post]'); ?>
    </section>

	<!-- Other Blog Posts Section -->
	<section class="other-blog-posts container section-padding">
		<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => '6',
				'paged' => 1,
				'offset' => 1
			);
			
			$blog_posts = new WP_Query( $args );
		?>
	
		<?php if ( $blog_posts->have_posts() ) : ?>
			<div class="blog-posts row">
				<?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
				
				<!-- Blog Post Item -->
				<?php get_template_part( 'template-parts/blog-post-item' ); ?>

				<?php endwhile; ?>
			</div>
			<button class="load-more-btn">Load More</button>

		<?php else : ?>
            <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
        <?php endif; ?> 
			
<?php get_footer(); ?>