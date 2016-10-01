// On Scroll
// -------------
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop(); // Scroll distance from top of window
	
	// Animate Carousel Headline
	$('#carousel .content .text').css({'transform':'translate(0px, '+scroll_position / 3+'%)'}); // Move Y of headline with scroll
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