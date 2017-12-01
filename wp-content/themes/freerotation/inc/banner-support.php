<?php

add_action( 'after_setup_theme', 'create_image_format' );
function create_image_format() {
	add_image_size( "big_home_image", 1440, 300, true );
	add_image_size( "actu-accueil", 686, 566, true );
	add_image_size( "actu-article", 1500, 344, true );
	add_image_size( "artiste-accueil", 610, 200, true );
	add_image_size( "artiste", 870, 230, true );
	add_image_size( "artiste-timeline", 350, 90, true );
	// TODO Revoir le format des actus d'accueil
	add_image_size( "logo-rs-footer", 30, 30, false );
	add_image_size( "liens-home", 520, 180, true );
}