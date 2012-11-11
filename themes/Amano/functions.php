<?php

/** Use this to add buttons to wysiwyg editor **/
function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
  
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");


/** Enable Post thumbnails **/
add_theme_support( 'post-thumbnails', array( 'start', 'movie' ) );


/** Hook Backend Pages **/
get_template_part( 'admin/start', 'admin/start' );
?>