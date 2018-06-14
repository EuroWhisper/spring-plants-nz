<?php
/**
 * The footer template.
 *
 * @package spring_plants
 */

?>

	</div><!-- #content -->
	</div><!-- Container -->
	
	<footer id="footer" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h5 class="font-weight-bold">Spring Plants NZ</h5>
				<p>Our spring bulbs have proven popular on TradeMe year after year. Now available for purchase directly from our website every August!</p>
			</div>
			<div class="col-lg-3">
			<h5 class="font-weight-bold">Explore</h5>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
				'container'      => false,
				'depth'          => 2,
				'menu_class'     => 'navbar-nav mr-auto font-weight-bold',
				'walker'         => new Bootstrap_NavWalker(),
				'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
			) );
			?>
			</div>
			<div class="col-lg-3">
				<div class="footer-contact">
					<h5 class="font-weight-bold">Contact</h5>
					<p>lornapaulinenz@gmail.com</p>
					<p>027 871 6974</p>
				</div>
			</div>
			<div class="col-lg-3">
				<h5 class="font-weight-bold">Get inspired!</h5>
				<form>
					<div class="input-group mb-3">
						<input type="email" class="form-control" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn" type="button" style="color: white; background-color: #AEC733;">Join</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p class="text-center">© 2018 Spring Plants NZ | Website created by Laurence Juden</p>
			</div>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
