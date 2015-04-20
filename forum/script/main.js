$(document).ready(function(){
	$('.reply').on('click', function(event) {
	    //$("#blank").load("include/reply.php");
	    event.preventDefault();
		$('html, body').animate({
			scrollTop: $("#blank").offset().top
		}, 1000);
		
		$("#blank").delay(1000).removeClass('hide');
		$('#blank').stop(true, true).slideDown(slideDuration).fadeIn({ duration: slideDuration, queue: false });
	});
	
	$(".topic").each(function() {
		var $topic_height = $(this).height();
		$(this).find(".info_align_left").css("height"," "+$topic_height+"px");
	});
});
