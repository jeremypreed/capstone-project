<?php
// Set page via URI
$request = str_replace('/ecommerce/', '', $_SERVER['REQUEST_URI']);
$page = explode('/', $request);

error_reporting(E_ALL & ~E_NOTICE); // Report all errors
session_start(); // Start session cookies

// this isnt necessary yet
// Connect to DB if logged in
//if (isset($_SESSION['id'])) {
//	include_once('sql/connect.php');
//}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://localhost/ecommerce/css/style.css" /><!-- Custom stylesheet -->
	<link rel="stylesheet" href="http://localhost/ecommerce/css/bootstrap.min.css" /><!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:200italic,400,400italic,700,900' rel='stylesheet' type='text/css'><!-- Google Font Raleway -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,200' rel='stylesheet' type='text/css'><!-- Google Font Source Sans -->
	<script src="https://use.fontawesome.com/84aba4ed8a.js"></script> <!-- Font Awesome -->
	<script src="http://localhost/ecommerce/js/lib/jquery.min.js"></script><!-- jQuery -->
	<script src="http://localhost/ecommerce/js/javascript.js"></script><!-- Custom javascript -->
</head>
<body>
<?php 

// Header
include_once('pages/layout/header.php');

// Shopping Content
if ($page[0]=='home') {	include_once('pages/home.php'); } // Home 
else if ($page[0]=='shop') { include_once('pages/shop.php'); } // Shop
else if ($page[0]=='product') { include_once('pages/product.php'); } // Product
else if ($page[0]=='cart') { include_once('pages/cart.php'); } // Shopping Cart
//Account Content
else if ($page[0]=='login') { include_once('pages/login.php'); } // Login
else if ($page[0]=='logout') { 
	// Logout
	session_start(); // Resume session
	session_destroy(); // Destroy session data
	header('Location: home'); } // Redirect to home
else if ($page[0]=='account') { include_once('pages/account.php'); } // Account
else {
	// Redirect to home
	header('Location: http://localhost/ecommerce/home');
	die();
}

// Footer
include_once('pages/layout/footer.php');

?>
</body>
</html>