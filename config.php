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

# Messages
$MSG = array(
	# Error messages
	'NOT_FOUND' => '<div class="error"><h2>Sorry!</h2><p>The page you are looking for does not exist or may have been moved.</p></div>',
	'NO_RESULTS' => '<div class="error"><h2>Sorry!</h2><p>Nothing was found.</p></div>',
	'WRONG_USERPASS' => '<div class="error">Incorrect username or password.</div>',
	'CONN_ERROR' => '<div id="error">Failed to connect: '.mysqli_connect_errno().'</div>'
);

# Connect to DB
$dbc = mysqli_connect($_['DB_HOST'],$_['DB_USER'],$_['DB_PASS'],$_['DB_NAME']);
if (mysqli_connect_errno()) { echo $MSG['CONN_ERROR']; }