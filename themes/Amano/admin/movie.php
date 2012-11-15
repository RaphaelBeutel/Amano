<?php
function create_movie_post_type() {
	
	register_post_type('movie', array(
		'label' => __('Film'),
		'singular_label' => __('Film'),
		'public' => true,
		'show_ui' => true, // UI in admin panel
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => "movie"), // Permalinks format
		'supports' => array('revisions', 'title', 'editor', 'thumbnail')
	));
}

add_action( 'init', 'create_movie_post_type' );
?>