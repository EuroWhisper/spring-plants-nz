<?php
/**
 * Functions file applies various filters, hooks various actions
 * and is responsible for loading all CSS/JS onto the page.
 *
 * @package spring_plants
 */

if ( ! function_exists( 'spring_plants_setup' ) ) :
	/**
	 * Enables various WordPress features.
	 */
	function spring_plants_setup() {
		
		/*
		 * Enable custom fields on posts and pages.
		 * 
		 */
		add_theme_support('custom-fields');

		/*
		 * Enable WordPress to dynamically load the title tag.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable feature images.
		 */
		add_theme_support( 'post-thumbnails' );

		// Image size for single posts
		add_image_size( 'single-post-thumbnail', 590, 180 );

		// Register header nav menu.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'spring-plants' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Enable the custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'spring_plants_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Enable selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add custom logo support.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add support for a Bootstrap Navwalker.
		 */
		require get_template_directory() . '/bootstrap-navwalker.php';
		register_nav_menus( array(
    	'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ), 'footer-menu' => esc_html__('Footer Menu', 'theme-textdomain'),
		) );

		


	}
endif;
add_action( 'after_setup_theme', 'spring_plants_setup' );
add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

/* 
*	Filter WooCommerce form fields to apply Bootstrap's form styling dynamically to the elements.
*/

add_filter('woocommerce_form_field_args','wc_form_field_args',10,3);

function wc_form_field_args( $args, $key, $value = null ) {

// Start field type switch case

switch ( $args['type'] ) {

    case "select" :  /* Targets all select input type elements, except the country and state select input types */
        $args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag  
        $args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
    break;

    case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
        $args['class'][] = 'form-group single-country';
        $args['label_class'] = array('control-label');
    break;

    case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
        $args['class'][] = 'form-group'; // Add class to the field's html element wrapper 
        $args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
        //$args['custom_attributes']['data-plugin'] = 'select2';
        $args['label_class'] = array('control-label');
        $args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
    break;


    case "password" :
    case "text" :
    case "email" :
    case "tel" :
    case "number" :
        $args['class'][] = 'form-group';
        //$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
    break;

    case 'textarea' :
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
    break;

    case 'checkbox' :  
    break;

    case 'radio' :
    break;

    default :
        $args['class'][] = 'form-group';
        $args['input_class'] = array('form-control', 'input-lg');
        $args['label_class'] = array('control-label');
    break;
    }

    return $args;
}

/**
 * Enqueue scripts and styles.
 */
function spring_plants_scripts() {
	wp_enqueue_style( 'spring-plants-style', get_stylesheet_uri() );
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.12/css/all.css');

	wp_register_script('recaptcha', 'https://www.google.com/recaptcha/api.js');
	wp_enqueue_script('recaptcha');
	wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', null, null, true);
	wp_enqueue_script('popper');
	
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery', 'popper'), null, true);
	wp_enqueue_script('bootstrap');

	wp_enqueue_style('bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
}

add_action( 'wp_enqueue_scripts', 'spring_plants_scripts' );

