<?php
/**
 * Clean the front end from unnecessaries functions. Changeable : false
 * @version     0.5.1
 * @package     WordPress
 * @subpackage  Freerotation
 * @since       0.1
 */

	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );

	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );

	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// WP version
	remove_action( 'wp_head', 'wp_generator' );

	// Disable XML RPC
    add_filter('xmlrpc_enabled', '__return_false');
