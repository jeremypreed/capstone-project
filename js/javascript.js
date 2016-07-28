// On Scroll Animations
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop();

	// Animate Carousel Headline
	$('#carousel .content').css({'transform':'translate(0px, '+scroll_position / 3+'%)'}); // Move Y of headline with scroll
	$('#carousel .content').css({'opacity': ''+(1-(scroll_position*.002))+''}); // Fade out/in with scroll
	
	// fade banner
	//$('#header .banner').css({'opacity': ''+(1-(scroll_position*.003))+''}); // Fade out/in with scroll
	
	// Fixed Nav
	if (scroll_position > 50 && $('#header').hasClass('normal')){
		$('#header').addClass('navbar-fixed-top');
		$('#content').css({'margin':'160px 0 0 0'});
		$('#accordion').addClass('fixed');
	} else if (scroll_position > 500) {
		$('#header').addClass('navbar-fixed-top');
		$('#content').css({'margin':'600px 0 0 0'});		
	} else {
		$('#header').removeClass('navbar-fixed-top');	
		$('#content').css({'margin':'0 0 0 0'});
		$('#accordion').removeClass('fixed');
	}
	
	// Animate clothing image
	if (scroll_position > $('section').offset().top - ($(window).height() / 1.1)){ // If scroll position matches
		$('.item').each(function(i){										// top of clothing item minus 10% window height
			setTimeout(function(){ // Set wait time for when to run function
				$('section .item').eq(i).addClass('visible'); // Add visible class to clothing item
			}, 150 * (i+1)); // wait 150ms times number of clothing item
		});					 // example: first time waits 150ms, second waits 300, third waits 450 etc
	}						 // this way each animation doesn't show at the same time
});