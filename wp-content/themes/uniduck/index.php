<?php get_header(); ?>

    <!-- Page Title Section -->
    <section class="title-section container section-padding">
        <h1 class="text-center">The Unicorn & a Duck</h1>
        <input id="search" class="form-control" type="search" placeholder="Search blog" aria-label="Search">
    </section>

    <!-- Last Blog Post Section -->
    <section class="last-blog-post flex container section-padding">
        <div class="left col-6 pl-0">
            <img class="adapt-img" src="Assets/Images/img-unicorn.png" alt="Uniduck | The Unicorn" />
        </div>
        <div class="right col-6 pr-0">
            <span class="date">November 4, 2016</span>
            <h2 class="last-post-title">The Legend of the Unicorn - Myths and Legends</h2>
            <div class="tags">
                <span class="tag">Unicorn</span>
                <span class="tag">Pinky</span>
                <span class="tag">Magic</span>
                <span class="tag">Love</span>
            </div>
            <p class="blog-post-excerpt">
                Once upon a time in kingdom far-far-away in the lands of the never-ending 
                spring, a king sat in his golden throne and ruled his kingdom in perfect harmony.
                A person can feel nothing but exuberance at the sight of...
                <a href="#" class="read-more-btn">Read more</a>
            </p>
            <div class="post-engagement flex">
                <p class="likes"><img src="Assets/Icons/ic-heart.svg" /><span>17 faves</span></p>
                <p class="comments"><img src="Assets/Icons/ic-comment.svg" /><span>22 comments</span></p>
            </div>
        </div>
    </section>

    <!-- Other Blog Posts Section -->
	<section class="other-blog-posts container section-padding">
		<div class="row">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

            <!-- Blog Post Item -->
            <div class="col-4 post-item">
                <div class="image">
                    <img class="adapt-img" src="Assets/Images/img-unicorn2.png" alt="Uniduck | " />
                </div>
                <div class="post-text">
                    <span class="date">November 4, 2016</span>
                    <h3 class="last-post-title">The Unicorn were voted "Consistently Excellent" Pub of the Year</h3>
                    <div class="tags">
                        <span class="tag">Unicorn</span>
                        <span class="tag">Pinky</span>
                        <span class="tag">Magic</span>
                        <span class="tag">Love</span>
                    </div>
                    <p class="blog-post-excerpt">
                        Once upon a time in kingdom far-far-away in the lands of the never-ending 
                        spring, a king sat in his golden throne and ruled his kingdom in perfect harmony.
                        A person can...
                        <a href="#" class="read-more-btn">Read more</a>
                    </p>
                    <div class="post-engagement flex">
                        <p class="likes"><img src="Assets/Icons/ic-heart.svg" /><span>17 faves</span></p>
                        <p class="comments"><img src="Assets/Icons/ic-comment.svg" /><span>22 comments</span></p>
                    </div>
                </div>
            </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no pages found.' ); ?></p>
        <?php endif; ?>

        </div>
    </section>
			
<?php get_footer(); ?>