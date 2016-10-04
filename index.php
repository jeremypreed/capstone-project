<?php
include_once('config.php'); // Configuration
include_once('sql/inventory.class.php');  // Inventory Class
include_once('sql/cart.class.php');  // Cart Class
$request = str_replace($_['SITE_PATH'], '', $_SERVER['REQUEST_URI']); // Get current URI and remove root path
$p = array_filter(explode('/', $request)); // Separate each section of URI page array & remove empty values. P is short for Page
error_reporting(E_ALL & ~E_NOTICE); // Report all errors
session_start(); // Start/Resume session
$i = new Inventory(); // Create Inventory Object. I is short for Inventory
$c = new Cart($dbc); // Create Cart Object. C is short for Cart
?>
<!DOCTYPE HTML>
<html lang="en-US" ng-app="cw">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_['SITE_TITLE'].' / '.ucfirst($p[0]); ?></title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo $_['SITE_URL']; ?>css/style.css" /><!-- Custom stylesheet -->
	<link rel="stylesheet" href="<?php echo $_['SITE_URL']; ?>css/bootstrap.min.css" /><!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:200italic,400,400italic,700,900' rel='stylesheet' type='text/css'><!-- Google Font Raleway -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,200' rel='stylesheet' type='text/css'><!-- Google Font Source Sans -->
	<script src="https://use.fontawesome.com/84aba4ed8a.js"></script> <!-- Font Awesome -->
	<script src="<?php echo $_['SITE_URL']; ?>js/lib/jquery.min.js"></script><!-- jQuery -->
	<script src="<?php echo $_['SITE_URL']; ?>js/lib/angular.min.js"></script><!-- Angular -->
	<script src="<?php echo $_['SITE_URL']; ?>js/lib/angular-sanitize.min.js"></script><!-- Angular Sanitize -->
	<script src="<?php echo $_['SITE_URL']; ?>js/javascript.js"></script><!-- Javascript -->
	<script src="<?php echo $_['SITE_URL']; ?>js/carousel.js"></script><!-- Carousel -->
	<script src="<?php echo $_['SITE_URL']; ?>js/cart.js"></script><!-- Cart -->
</head>
<body>
<?php
# Header
include_once('pages/layout/header.php');
# Shopping Content
if ($p[0]=='home') {	include_once('pages/home.php'); } // Home 
else if ($p[0]=='search') { include_once('pages/shop/search.php'); } // Search
else if ($p[0]=='shop') { include_once('pages/shop.php'); } // Shop
else if ($p[0]=='cart') { include_once('pages/cart.php'); } // Shopping Cart
else if ($p[0]=='checkout') { include_once('pages/checkout.php'); } // Checkout
else if ($p[0]=='confirmation') { include_once('pages/confirm.php'); } // Checkout Successs
# Account Content
else if ($p[0]=='account') { include_once('pages/account.php'); } // Account
else if ($p[0]=='login') { include_once('pages/login.php'); } // Login
else if ($p[0]=='register') { include_once('pages/register.php'); } // Register
else if ($p[0]=='logout') { // Logout
	session_destroy(); // Destroy session data
	redirect($_['SITE_URL'].'home'); // Redirect to home
	die(); }
else { redirect($_['SITE_URL'].'home'); } // Redirect to home
# Footer
include_once('pages/layout/footer.php');
?>
</body>
</html>