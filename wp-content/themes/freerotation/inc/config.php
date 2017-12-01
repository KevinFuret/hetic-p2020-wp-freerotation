<?php

function firstPixel_theme_support() {

    /**
     *  Set up the WordPress core custom background feature.
     */
    add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    /**
	 * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    /**
	 * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

	 /**
	  * Enable support for woocommerce on posts and pages.
      */
    add_theme_support( 'wooocommerce' );

    /**
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
}
add_action( 'after_setup_theme', 'firstPixel_theme_support' );

function thumbnails_theme_support(){
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'thumbnails_theme_support' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );