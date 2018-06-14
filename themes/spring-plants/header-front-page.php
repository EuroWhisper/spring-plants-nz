<?php
/**
 * This is the front page header template for the theme.
 *
 * @package spring_plants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/"><img class="img-fluid" style="max-height: 30px;" src="<?php echo get_template_directory_uri(); ?>/img/navbar-brand.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'depth'          => 2,
				'menu_class'     => 'navbar-nav mr-auto',
				'walker'         => new Bootstrap_NavWalker(),
				'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
			) );
			?>
		</div>
	</nav>
<header class="front-page-header">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="front-page-header-inner">
					<img class="header-logo img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/spring-plants-logo-4.png">
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div id="content" class="site-content">
