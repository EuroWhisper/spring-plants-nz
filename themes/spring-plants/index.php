<?php
/**
 * Blog page template.
 *
 * @package spring_plants
 */

get_header();
?>
	
	<main id="main" class="site-main">
		<div class="row">
			<div class="col-md-7">
				<div class="post-preview-list">
					<h2>Latest Posts</h2>
					<hr style="color: #ACC14E !important;"></hr>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="post-preview">	
							<div class="row">
								<div class="col-md-4">
									<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-fluid text-center' ) ); ?>
								</div>
								<div class="col-md-8">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<h4 class="font-weight-bold"><?php the_title(); ?></h4></a>
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						</div>
					<?php endwhile; endif; ?>
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php if( get_next_posts_link() ) :
								echo '<li class="page-item page-link">'; echo next_posts_link( "Older posts" ) . '</li>';
								endif;?>
							<?php if( get_previous_posts_link() ) :
								echo '<li class="page-item page-link">'; echo previous_posts_link( 'Newer entries' ) . '</li>';
								endif;?>
						</ul>
               		</nav>
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
