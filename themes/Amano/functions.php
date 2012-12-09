<?php

/** Returns ID of first blog Post **/
function get_first_blog_post() {
	$last = wp_get_recent_posts( '1');
	$last_id = $last['0']['ID'];
	
	return (string)$last_id;
}



/** Add query vars **/
function add_blog_more_query_var() {
    global $wp;
    $wp->add_query_var('blogpost');
}
add_filter('init', 'add_blog_more_query_var');

/** Add rewrite rules **/
function add_blog_more_rewrite_rule() {
    add_rewrite_rule('blog/([^/]+)/?$', 'index.php?page_id=10&blogpost=$matches[1]', 'top');
}
add_action('init','add_blog_more_rewrite_rule');



/** Use this to add buttons to wysiwyg editor **/
function enable_more_buttons($buttons) {
  $buttons[] = 'hr';

  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");


/** Enable Post thumbnails **/
add_theme_support( 'post-thumbnails', array( 'start' ) );


/** Hook Backend Pages **/
get_template_part( 'admin/start', 'admin/start' );
get_template_part( 'admin/movie', 'admin/movie' );
?>