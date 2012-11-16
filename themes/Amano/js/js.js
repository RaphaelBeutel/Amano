$(document).ready(function() {
	
	var activeBlogPost = $('.open').attr('id');
	
	function set_browser_url(setUrlTo) {
		var title = $('#headline-'+setUrlTo).text();
		var stateObj = { foo: "bar" };
		history.pushState(stateObj, title, "/blog/"+setUrlTo); 
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
	
	$('.title').click(function() { 
		clickedBlogPostID = $(this).parent('div').attr('id');
		
		set_blog_post_height(clickedBlogPostID);
		set_blog_post_class(clickedBlogPostID);
		set_browser_url(clickedBlogPostID);
		
		activeBlogPost = clickedBlogPostID;
	});

	set_blog_post_height(activeBlogPost);
});