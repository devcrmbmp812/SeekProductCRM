$(document).ready(function(e){
	$(".toggle_menu").click(function(e){
		alert();
		$("nav ul").toggleClass("active");
	});
	$(".dropdown .btn_de,.dropdown_inner a").click(function(e){
		$(".dropdown_inner").slideToggle();
	});
	$(".video_icon").click(function(e){
		var thisUrl  = $(this).attr("data-id");
		$(".video").attr("src",thisUrl);
		$('.video').get(0).play()
	})
	$(".video_icon").click(function(e){
		var thisUrl  = $(this).attr("data-id");
		$(".video").attr("src",thisUrl);
		$('.video').get(0).play()
	});
	$("#popup_video .close").click(function(e){
		$(".video").attr("src","");
		$('.video').get(0).pause()
	})
});

