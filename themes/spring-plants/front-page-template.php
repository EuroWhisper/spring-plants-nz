<?php
/**
 * Template name: Front Page Template
 *
 * @package spring_plants
 */

get_header('front-page');
?>
	
	<main id="main" class="site-main">

        <div class="services-listing">
            <div class="row">
                <div class="col-md-4 col-sm-6 text-center">
                    <img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/img/spring-bulbs-promo.png">
                    <h4 class="text-center">Spring Bulbs</h4>
                    <p class="text-center">Our spring bulbs have proven popular on TradeMe year after year. Now available for purchase directly from us!</p>
                    <a href="/shop"><button class="service-button btn btn-outline-success btn-block">Buy Now</button></a>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/img/springtime-nursery-promo.png">
                    <h4 class="text-center">Springtime Nursery</h4>
                    <p class="text-center">In the springtime we open on select days for people to visit our nursery and purchase our products.</p>
                    <a href="/about"><button class="service-button btn btn-outline-success btn-block">View Dates</button></a>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/img/gardening-advice-promo.png">
                    <h4 class="text-center">Gardening Advice</h4>
                    <p class="text-center">We now maintain a gardening blog, providing expert advice on how to get the most out of our products!</p>
                    <a href="/blog"><button class="service-button btn btn-outline-success btn-block">Learn More</button></a>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-md-7">
				<div class="post-preview-list">
					<h2>Latest Posts</h2>
                    <hr style="color: #ACC14E !important;"></hr>
                    <?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
					<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
						<div class="post-preview">	
							<div class="row">
								<div class="col-md-4 text-center">
									<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-fluid text-center' ) ); ?>
								</div>
								<div class="col-md-8">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<h4 class="font-weight-bold"><?php the_title(); ?></h4></a>
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="col-md-4 offset-md-1">
				<div class="blog-page-sidebar-wrapper">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</main>

<?php

get_footer();
