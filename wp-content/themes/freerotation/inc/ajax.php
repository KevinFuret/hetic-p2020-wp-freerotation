<?php

function ajax_artiste_description () {
	// You need to grab the data from $_POST variable
	// And must sanitize the data.
	$pid = intval($_POST['postid']);
	$the_query  = new WP_Query(array(

		'post_type'=>'artiste',
		'p' => $pid,
		'orderby' => 'title',
		'order' => 'ASC'
	));

	if ($the_query->have_posts()) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part( 'artiste' );
		}
	}
	else {
		// Since you're declared the $data variable before then assign the next value also in $data
		// And at the end just echo it.
		$data = '<div id="postdata">'.__('Didnt find anything', THEME_NAME).'</div>';
	}
	wp_reset_postdata();

	echo $data ;
	// And must die() the function
	die();
}
// The actual hook is wp_ajax_noprive_{$action} and wp_ajax_{$action}
// You action is my_load_ajax_content in JS. So your hook will be
add_action ( 'wp_ajax_nopriv_ajax_artiste_description', 'ajax_artiste_description' );
add_action ( 'wp_ajax_ajax_artiste_description', 'ajax_artiste_description' );

function ajax_filter_artiste () {
	// You need to grab the data from $_POST variable
	// And must sanitize the data.
	$pid = $_POST['term'];
	$pid = strtolower($pid);
	$the_query  = new WP_Query(array(

		'post_type'=>'artiste',
		'tax_query' => array(
			array(
				'taxonomy' => 'jour',
				'field'    => 'slug',
				'terms'    => $pid,
				'orderby' => 'title',
				'order' => 'ASC'
			),
		),
	));

	if ($the_query->have_posts()) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part( 'artistes' );
		}
	}
	else {
		// Since you're declared the $data variable before then assign the next value also in $data
		// And at the end just echo it.
		$data = '<div id="postdata">'.__('Didnt find anything', THEME_NAME).'</div>';
	}
	wp_reset_postdata();

	echo $data;
	// And must die() the function
	die();
}
// The actual hook is wp_ajax_noprive_{$action} and wp_ajax_{$action}
// You action is my_load_ajax_content in JS. So your hook will be
add_action ( 'wp_ajax_nopriv_ajax_filter_artiste', 'ajax_filter_artiste' );
add_action ( 'wp_ajax_ajax_filter_artiste', 'ajax_filter_artiste' );

function my_enqueue() {
	// First register script
	wp_register_script( 'ajax-script', get_template_directory_uri() . '/dist/js/index.js', array('jquery') );
	// Localize script
	wp_localize_script( 'ajax-script', 'my_ajax_object',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
	);
	// Then enqueue script
	wp_enqueue_script( 'ajax-script' );
}

add_action( 'wp_enqueue_scripts', 'my_enqueue' );