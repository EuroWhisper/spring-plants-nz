<?php
/**
 * The sidebar containing the main widget area
 *
 * @package spring_plants
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php get_search_form(); ?>
	<div class="blog-categories">
		<div class="blog-categories-list">
			<h5 class="font-weight-bold">Categories</h5>
			<?php wp_list_categories(array('title_li' => '', 'style' => 'list', 'depth' => 2)); ?>
		</div>
	</div>
	<div class="spring-bulbs-ad text-center">
		<a href="/shop"><img src="<?php echo get_template_directory_uri(); ?>/img/bulbs-ad.png" class="img img-fluid"></img></a>
	</div>
	<div class="sidebar-mailing-list-form">
		<h5 class="font-weight-bold">Get Inspired</h5>
		<div class="input-group mb-3">
			<input type="email" class="form-control" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn" type="button" style="color: white; background-color: #AEC733;">Join</button>
			</div>
		</div>
	</div>
</aside>
