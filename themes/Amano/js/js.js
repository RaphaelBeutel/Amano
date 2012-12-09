$(document).ready(function() {
//Blog	
	var activeBlogPost = $('.open').attr('id');
	
	function set_browser_url(setUrlTo) {
		var title = $('#headline-'+setUrlTo).text();
		history.pushState( { page: 'blog' }, title, "/blog/"+setUrlTo);
	}
	
	function set_blog_post_class(clickedBlogPostID) {	
		$('#'+activeBlogPost).toggleClass('open').toggleClass('close');
		$('#'+clickedBlogPostID).toggleClass('close').toggleClass('open');
	}
	
	function set_blog_post_height(clickedBlogPostID) {
		clickedBlogPostHeigh = $("#content-"+clickedBlogPostID).height()+60+"px";
		
		$('#'+activeBlogPost).css({ 'height' : "40px" });
		$('#'+clickedBlogPostID).css({ 'height' : clickedBlogPostHeigh });
	}
	
	$(window).bind("popstate", function() {
  		url = location.pathname; 
  		url = url.split('/blog/');
  		
  		if ( url['1'] !=  null) {
	  		postName = url['1'].split('/');
	  		postName = postName['0'];
	  		
	  		pushToID = postName;
			
			set_blog_post_height(pushToID);
			set_blog_post_class(pushToID);
			
			activeBlogPost = pushToID;
		}
	});
	
	$('.title').click(function() { 
		clickedBlogPostID = $(this).parent('div').attr('id');
		
		set_blog_post_height(clickedBlogPostID);
		set_blog_post_class(clickedBlogPostID);
		set_browser_url(clickedBlogPostID);
		
		activeBlogPost = clickedBlogPostID;
	});
	
	set_blog_post_height(activeBlogPost);
	
	
//Home
	if( jQuery('#home').length > 0 ){
		var text = jQuery('p:first-child');
		color = jQuery(text[0]).children().css('color');
		
		jQuery('.outaborder').css('border-color', color);
		jQuery('.innerborder').css('border-color', color);
		if( jQuery('p').length > 1){
			jQuery('p:last-child').css('font-family', 'Marketing Script');
			jQuery('p:last-child').css('margin-top', '20px');
		}
	}
});