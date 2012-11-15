$(document).ready(function() {
	$(".title").click(function() { 
		
		var postID = $(this).parent('div').attr("id"); 
		var curClass = $("#"+postID).attr("class");
		postHeight = $("#content-"+postID).height();
		
		$("#"+postID).toggleClass(function() {
		  if ( curClass.indexOf("close") != -1 ) {
		  	return "open";
		  }else{
		  	return "close";
		  }
		});
	});
});