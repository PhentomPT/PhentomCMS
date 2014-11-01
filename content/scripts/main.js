$(document).ready(function() {
	var j = jQuery.noConflict();
	j(document).ready(function() {
		j(".chat").everyTime(1000, function(i) {
			j.ajax({
				url : "content/include/refresh_chat.php",
				cache : false,
				success : function(html) {
					j(".chat").html(html);
				}
			})
		})
	});
}); 