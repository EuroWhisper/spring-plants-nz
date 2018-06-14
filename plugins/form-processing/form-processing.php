<?php

/*
Plugin Name: Form Processing
Description: Form processing plugin.
Version: 1.0
Author: Laurence Juden
*/

include_once('form.php');
include_once('contact-form.php');

wp_enqueue_script( 'form-ajax', plugins_url( 'form-ajax.js', __FILE__ ), array('jquery') );
wp_localize_script( 'form-ajax', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 
                'plugin_folder' => plugins_url()));

add_action( 'wp_ajax_process_form', 'process_form' );
add_action('wp_ajax_nopriv_process_form', 'process_form');

function process_form() {
    $form = new ContactForm();
    $form->processForm();
    
    wp_die();
}
?>