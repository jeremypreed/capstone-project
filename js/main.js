var app = angular.module('cw',['ngSanitize']);

// On Scroll
// -------------
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop(); // Scroll distance from top of window
	
	// Animate Carousel Headline
	$('#carousel .content .text').css({'transform':'translate(0px, '+scroll_position / 1.1+'%)'}); // Move Y of headline with scroll
	$('#carousel .content .text').css({'opacity': ''+(1-(scroll_position*.002))+''}); // Fade out/in with scroll
	
	// Fixed Nav
	if (scroll_position > 50 && $('#header').hasClass('normal')){
		$('#header').addClass('navbar-fixed-top');
		$('#content').css({'margin':'160px 0 0 0'});
	} else if (scroll_position > 500) {
		$('#header').addClass('navbar-fixed-top');
		$('#content').css({'margin':'600px 0 0 0'});		
	} else {
		$('#header').removeClass('navbar-fixed-top');	
		$('#content').css({'margin':'0 0 0 0'});
	}
});

$(document).ready(function(){
	// MSGs
	// -------------
	$('#msg a').click(function(){
		$('#msg').addClass('close');
	});
	
	function autoCloseMsg(){	
		setInterval(function(){
			$('#msg').addClass('close');
		},5000);
	}
	
	autoCloseMsg();
	
	// Search
	// -------------
	function search(){
		var url = 'http://localhost/clothingwebsite/search/'+$('input[name="search"]').val();
		window.location = url;
	}
	// Press search icon
	$('#search-bar a').click(function(){
		search();
	});
	// Press Enter while in search bar
	$('input[name="search"]').bind('searchBtn',function(e){
		search();
	});
	$('input[name="search"]').keyup(function(e){
		if(e.keyCode == 13)
		{
		  $(this).trigger('searchBtn');
		}
	});	
});