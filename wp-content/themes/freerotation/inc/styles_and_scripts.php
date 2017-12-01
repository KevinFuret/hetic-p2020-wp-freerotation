<?php

add_action( 'wp_enqueue_scripts', 'ajout_scripts' );
function ajout_scripts() {
// enregistrement d'un nouveau script
	wp_register_script('foundation_script', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js', array('jquery'),'1.1', true);
	wp_enqueue_script('foundation_script');
	wp_register_script('main_js', JS_URL.'/index.js', array('jquery'),'1.1', true);
	wp_enqueue_script('main_js');
	wp_register_script('main_js', JS_URL.'/index.js', array('jquery'),'1.1', true);
	wp_enqueue_script('main_js');
// enregistrement des fonts
	wp_register_style( 'google_font', 'https://fonts.googleapis.com/css?family=Roboto:400,700,900|Righteous' );
	wp_enqueue_style( 'google_font' );
// enregistrement des styles
	wp_register_style( 'main_style', CSS_URL.'/main.css' );
	wp_enqueue_style( 'main_style' );
}