// On Scroll Animations
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop(); // Scroll distance from top of window
	
	// Animate Carousel Headline
	$('#carousel .content').css({'transform':'translate(0px, '+scroll_position / 3+'%)'}); // Move Y of headline with scroll
	$('#carousel .content').css({'opacity': ''+(1-(scroll_position*.002))+''}); // Fade out/in with scroll
	
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
	
	// Animate product listing
	if (scroll_position > $('section').offset().top - ($(window).height() / 1.1)){ // If scroll position matches
		$('.item').each(function(i){										// top of clothing item minus 10% window height
			setTimeout(function(){ // Set wait time for when to run function
				$('section .item').eq(i).addClass('visible'); // Add visible class to clothing item
			}, 150 * (i+1)); // wait 150ms times number of clothing item
		});					 // example: first time waits 150ms, second waits 300, third waits 450 etc
	}						 // this way each animation doesn't show at the same time
});

// Carousel
$(document).ready(function(){
	var switchSpeed = 8000 // Milliseconds before switching to next tab
	var lastTab, currentTab = 1; // Currently selected tab & first visible tab 
	var tabsAmount = $('.tabs').children().length; // Amount of tabs
	var tabBG = 	["image1.jpg",
					"image2.jpeg",
					"image3.jpg",
					"image4.jpeg"];
	
	// Elements
	var carousel = $('#carousel'); // The whole carousel
	var content = $('#carousel .content'); // Content of tab
	var leftArrow = $('#carousel .left-arrow a'); // Previous tab
	var rightArrow = $('#carousel .right-arrow a'); // Next tab
	var tabs = $('#carousel .tabs a'); // Tab select links

	// Function: makes current tab visible
	function goToTab(tab){
		if (currentTab>tabsAmount){ currentTab = 1; } // If tab goes past end, go to beginning 
		else if (currentTab<1){ currentTab = tabsAmount; } // If tab goes before beginning, go to end
		
		$('*[data-tab="' + lastTab + '"]').removeClass('current-tab');
		$('.content*[data-tab="' + lastTab + '"]').fadeOut(500);
		carousel.css("background","url(img/carousel/"+tabBG[currentTab-1]+") center center");
		$('*[data-tab="' + currentTab + '"]').delay(800).addClass('current-tab').fadeIn(500); // add current-tab class to current tab
	};
	
	// Buttons to select tab
	leftArrow.click(function(){
		event.preventDefault(); // prevent link from linking
		lastTab = currentTab; // current tab becomes previous tab
		currentTab--; // minus 1 currentTab
		goToTab(currentTab); // go to new current tab
	});
	rightArrow.click(function(){
		event.preventDefault(); // prevent link from linking
		lastTab = currentTab; // current tab becomes previous tab
		currentTab++; // plus 1 currentTab
		goToTab(currentTab); // go to new current tab
	});
	
	tabs.click(function(){
		event.preventDefault(); // prevent link from linking
		lastTab = currentTab; // current tab becomes previous tab
		currentTab = $(this).attr('data-tab'); // makes currentTab data-tab value of link clicked
		goToTab(currentTab); // go to new current tab
	});

	// Function: moves to next tab automatically
	function autoSwitch(){	
		setInterval(function(){
			lastTab = currentTab; // current tab becomes previous tab
			currentTab++;
			goToTab(currentTab);
		},switchSpeed);
	}
	
	goToTab(currentTab);
	autoSwitch();
});