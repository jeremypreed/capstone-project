<?php
# Configurable variables
$_ = array (
	# General
	'SITE_TITLE' => 'Clothing Website',
	'SITE_URL' => 'http://localhost/clothingwebsite/',
	'SITE_PATH' => '/clothingwebsite/',
	'SITE_SH' => 'cw_',
	# Database login
	'DB_HOST' => 'localhost',
	'DB_USER' => 'root',
	'DB_PASS' => '',
	'DB_NAME' => 'clothing_website'
);

# Connect to DB
$dbc = mysqli_connect($_['DB_HOST'],$_['DB_USER'],$_['DB_PASS'],$_['DB_NAME']);
if (mysqli_connect_errno()) { echo $MSG['CONN_ERROR']; }

# Messages
$MSG = array(
	# Error messages
	'NOT_FOUND' => '<div class="error"><h2>Sorry!</h2><p>The page you are looking for does not exist or may have been moved.</p></div>',
	'NO_RESULTS' => '<div class="error"><h2>Sorry!</h2><p>Nothing was found.</p></div>',
	'SEARCH_EMPTY' => '<div class="error"><h2>Sorry!</h2><p>You must enter something into the search field.</p></div>',
	'CART_EMPTY' => '<p>Your cart is empty.</p>',
	'LOGIN' => '<p>You\'re not logged in.</p>',
	'LOGIN_TOADD' => '<p>You need to <a href="'.$_['SITE_URL'].'login">log in</a> to buy products.</p>',
	# General
	'REGISTER_LOGIN' => '<p><a href="'.$_['SITE_URL'].'register">Register</a> to save your cart, manage wishlists, and more.</p><p><a href="'.$_['SITE_URL'].'login">Log in</a>, if you already have an account.</p>'
);

# Messsage functions
function alert($m){
	# Display alert message at bottom of page
	$alert = '<div id="msg" class="open"><div class="alert"><div class="col-md-10">';
	$alert .= $m;
	$alert .= '</div><div class="col-md-2"><a>Close <i class="fa fa-remove fw"></i></a></div></div></div>';
	echo $alert;
}

function error($m){
	# Display error message at bottom of page
	$error = '<div id="msg" class="open"><div class="alert error"><div class="col-md-10">';
	$error .= $m;
	$error .= '</div><div class="col-md-2"><a>Close <i class="fa fa-remove fw"></i></a></div></div></div>';
	echo $error;
}

# General functions
function redirect($url){
	# Javascript redirect to $url
	echo '<script type="text/javascript">'.'window.location = "' . $url . '";'.'</script>';
}

function cash($x){
	# Convert $x to float in form ($)xx.xx
	return number_format((float)$x, 2, '.', '');
}