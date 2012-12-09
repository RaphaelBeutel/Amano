<?php
function add_movie_post_type() {
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
add_action( 'init', 'add_movie_post_type' );

function add_movie_meta_box() {
	add_meta_box( 
		'headline',
		'Video',
		'add_movie_embed_box',
		'movie',
		"side", 
		"high"
	);
}
add_action( 'add_meta_boxes', 'add_movie_meta_box' );

function add_movie_embed_box() {
	global $post;
	wp_nonce_field( __FILE__, 'video_meta_box_nonce_field');
	
	$link = get_post_meta( $post->ID, 'movie_link', true );
	?>
	<br>
	<?php if( $link ) { ?>
		<a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a><br><br>
	<?php } ?>
	<label><b>Link</b> Vimeo oder YouTube: </label><br>
	<input id="movie_link" type="text" autocomplete="off" value="<?php echo $link; ?>" tabindex="1" size="45" name="movie_link">
	<br><br>
	<?php
}

function save_movie_embed_box() {
	global $post;
	
	$postID = (string)$post->ID;
	
	if ( !wp_verify_nonce( $_POST [ 'video_meta_box_nonce_field' ], __FILE__ ) ) {	
		return $postID; 
	}
	
	if ( !current_user_can( 'edit_post' , $postID )) {
		return $postID; 
	} 
	
	if ( $_POST['movie_link'] != "" ) {
		$link = $_POST['movie_link'];
		$embedCode = '';
		$error = false;
		
		if ( strpos( $link, 'youtube' ) ){
			
			$linkExplode = explode( 'watch?v=', $link);
			$linkExplode = explode( '&', $linkExplode[1] );
			$videoID = $linkExplode[0];
			
			$embedCode = '<iframe width="540" height="300" src="http://www.youtube.com/embed/'.$videoID.'" frameborder="0" allowfullscreen></iframe>';
			
		}elseif ( strpos( $link, 'vimeo' ) ){
			
			$linkExplode = explode( 'vimeo.com/', $link);
			$videoID = $linkExplode[1];
			
			$embedCode = '<iframe src="http://player.vimeo.com/video/'.$videoID.'?badge=0" width="540" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
	
		}else{
			$error = true;
		}
		
		$fields['movie_link' ] = $link;
		$fields['movie_embed_code' ] = $embedCode;
	}

	if( $error == false ){
		foreach ( $fields as $key => $value ) {
			$value = implode( ',' , ( array ) $value );
	        if (get_post_meta( $postID, $key , FALSE)) {
	        	update_post_meta( $postID, $key , $value ); 
	        } else { 
	            add_post_meta( $postID, $key , $value ); 
			} 
	    	if (! $value ) {
				delete_post_meta( $postID, $key ); 
			}
		}
	}
}
add_action( 'save_post', 'save_movie_embed_box' );
?>