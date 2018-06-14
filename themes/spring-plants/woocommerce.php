<?php
/**
 * Dynamically loads WooCommerce content onto the page.
 */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php woocommerce_content(); ?>

		</main>
	</div>

<?php
get_footer();
