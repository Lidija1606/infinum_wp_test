<?php get_header(); ?>

    <!-- Page Title Section -->
    <section class="title-section container section-padding">
        <h1 class="text-center">The Unicorn & a Duck</h1>
        <input id="search" class="form-control" type="search" placeholder="Search blog" aria-label="Search">
    </section>

    <!-- Last Blog Post Section -->
    <section class="last-blog-post flex container section-padding">
        <?php echo do_shortcode('[lastest-post]'); ?>
    </section>

    <!-- Other Blog Posts Section -->
	<section class="other-blog-posts container section-padding">
		<div class="row">

        <?php 
			query_posts('posts_per_page=6&offset=1');
			if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>

            <!-- Blog Post Item -->
			<div class="col-4 post-item">
				<div class="image">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="post-text">
					<span class="date"><?php the_date(); ?></span>
					<a href="<?php the_permalink(); ?>"><h3 class="last-post-title"><?php the_title(); ?></h3></a>
					<?php the_tags( '<ul class="tags"><li class="tag">', '</li><li class="tag">', '</li></ul>' ); ?>
					
					<p><?php echo wpuni_excerpt(32); ?></p>
					<div class="post-engagement flex">
						<p class="likes"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-heart.svg" /><span>17 faves</span></p>
						<p class="comments"><img src="<?php bloginfo('template_url'); ?>/Assets/Icons/ic-comment.svg" /><span>22 comments</span></p>
					</div>
				</div>
			</div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
        <?php endif; ?>

        </div>
    </section>
			
<?php get_footer(); ?>