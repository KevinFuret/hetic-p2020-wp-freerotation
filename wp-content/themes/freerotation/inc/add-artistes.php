<?php
function ajout_custom_type_init() {
	$post_type = "artiste";
	$labels = array(
		'name'               => 'Artistes',
		'singular_name'      => 'Artiste',
		'all_items'          => 'Tous les artistes',
		'add_new'            => 'Ajouter un artiste',
		'add_new_item'       => 'Ajouter un nouvel artiste',
		'edit_item'          => "Editer l'artiste",
		'new_item'           => 'Nouvel artiste',
		'view_item'          => "Voir l'artiste",
		'search_items'       => 'Chercher un artiste',
		'not_found'          => 'Pas de résultat',
		'not_found_in_trash' => 'Pas de résultat',
		'parent_item_colon'  => 'Artiste parent :',
		'menu_name'          => 'Artistes',
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-users',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		/*'capabilities' => array(
						  'edit_post'          => 'edit_movie',
						  'read_post'          => 'read_movie',
						  'delete_post'        => 'delete_movie',
						  'edit_posts'         => 'edit_movies',
						  'edit_others_posts'  => 'edit_others_movies',
						  'publish_posts'      => 'publish_movies',
						  'read_private_posts' => 'read_private_movies',
						  'create_posts'       => 'edit_movies',
						),*/
		'rewrite'             => array( 'slug' => $post_type )
	);
	register_post_type($post_type, $args );
	$taxonomy="visibilite";
	$object_type = array("post");
	$args = array(
		'label' => __( 'Visibilité' ),
		'rewrite' => array( 'slug' => 'post' ),
		'hierarchical' => true,
	);
	register_taxonomy( $taxonomy, $object_type, $args );
	$taxonomy="emplacement";
	$object_type = array("artiste");
	$args = array(
		'label' => __( 'Emplacement' ),
		'rewrite' => array( 'slug' => 'post' ),
		'hierarchical' => true,
	);
	register_taxonomy( $taxonomy, $object_type, $args );
	$taxonomy="categorie";
	$object_type = array("post");
	$args = array(
		'label' => __( 'Catégorie' ),
		'rewrite' => array( 'slug' => 'post' ),
		'hierarchical' => true,
	);
	register_taxonomy( $taxonomy, $object_type, $args );
	$taxonomy="jour";
	$object_type = array("artiste");
	$args = array(
		'label' => __( 'Jour de passage' ),
		'rewrite' => array( 'slug' => 'post' ),
		'hierarchical' => true,
	);
	register_taxonomy( $taxonomy, $object_type, $args );

}
add_action( 'init', 'ajout_custom_type_init' );