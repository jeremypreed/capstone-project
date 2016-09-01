// On Scroll
// -------------
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop(); // Scroll distance from top of window
	
	// Animate Carousel Headline
	$('#carousel .content').css({'transform':'translate(0px, '+scroll_position / 3+'%)'}); // Move Y of headline with scroll
	$('#carousel .content').css({'opacity': ''+(1-(scroll_position*.002))+''}); // Fade out/in with scroll
	
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
	// Carousel
	// -------------
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
	autoCloseMsg();

	
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
 
	// Checkout
	// -------------
	$('input[name=ship_method]').click(function(){
		sendData();
	});
	$(".checkout input").focusout(function(){
		sendData();
	});

	function recalculate(_shipping){
		document.getElementById('shippingTotal').innerHTML = _shipping;
		var subTotal = parseFloat(document.getElementById('subTotal').innerHTML.replace('$',''));
		var taxTotal = parseFloat(document.getElementById('taxTotal').innerHTML.replace('$',''));
		var shipTotal = parseFloat(document.getElementById('shippingTotal').innerHTML.replace('$',''));
		document.getElementById('actualTotal').innerHTML = '$'+eval(taxTotal+subTotal+shipTotal).toFixed(2);
		document.getElementById('paypal_total').value = '$'+eval(taxTotal+subTotal+shipTotal).toFixed(2);
	}

	// AJAX Send Form Data
	function sendData(){
		var fd = new FormData();
		fd.append("ship", $("input[name='ship_method']:checked"). val());
		fd.append("address", $("input[name='address']"). val());
		fd.append("address_apt", $("input[name='address_apt']"). val());
		fd.append("city", $("input[name='city']"). val());
		fd.append("state", $("input[name='state']"). val());
		fd.append("zipcode", $("input[name='zipcode']"). val());

		
		var ajax = new XMLHttpRequest();
		ajax.open("POST", "pages/checkout.ajax.php");
		ajax.onreadystatechange = function(){
			if (ajax.readyState == 4 && ajax.status == 200){
				//document.getElementById('message').innerHTML = ajax.responseText;
				recalculate(ajax.responseText);
			}
		}
		ajax.send(fd);
	}
	
});