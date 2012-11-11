<?php
function create_start_post_type() {
	
	register_post_type('start', array(
		'label' => __('Start'),
		'singular_label' => __('Start'),
		'public' => true,
		'show_ui' => true, // UI in admin panel
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => "start"), // Permalinks format
		'supports' => array('revisions', 'title', 'editor', 'thumbnail')
	));
}

add_action( 'init', 'create_start_post_type' );
?>