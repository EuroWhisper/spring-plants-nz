<?php
/**
 * The template for displaying all single posts
 *
 * @package spring_plants
 */

get_header();
?>

	<section>
		<div class="row">
			<div class="col-md-8">
				<div class="single-post">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="post-feature-image">	
							<div class="row">
								<div class="col-md-12">
									<?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p><?php the_content(); ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-post-siderbar-wrapper">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
get_sidebar();
get_footer();
?>