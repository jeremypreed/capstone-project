<?php
include_once('config.php'); // Configuration
include_once('sql/inventory.php');  // Inventory Class
include_once('sql/cart.php');  // Cart Class
$request = str_replace($_['SITE_PATH'], '', $_SERVER['REQUEST_URI']); // Get current URI and remove root path
$page = array_filter(explode('/', $request)); // Separate each section of URI page array & remove empty values
error_reporting(E_ALL & ~E_NOTICE); // Report all errors
session_start(); // Start/Resume session
$i = new Inventory(); // Create Inventory Object
$msg = new Message(); // Create Message Object
$cart = new Cart($dbc); // Create Cart Object
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_['SITE_TITLE'].' / '.ucfirst($page[0]); ?></title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo $_['SITE_URL']; ?>css/style.css" /><!-- Custom stylesheet -->
	<link rel="stylesheet" href="<?php echo $_['SITE_URL']; ?>css/bootstrap.min.css" /><!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:200italic,400,400italic,700,900' rel='stylesheet' type='text/css'><!-- Google Font Raleway -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,200' rel='stylesheet' type='text/css'><!-- Google Font Source Sans -->
	<script src="https://use.fontawesome.com/84aba4ed8a.js"></script> <!-- Font Awesome -->
	<script src="<?php echo $_['SITE_URL']; ?>js/lib/jquery.min.js"></script><!-- jQuery -->
	<script src="<?php echo $_['SITE_URL']; ?>js/javascript.js"></script><!-- Custom javascript -->
</head>
<body>
<?php
# Header
include_once('pages/layout/header.php');
# Shopping Content
if ($page[0]=='home') {	include_once('pages/home.php'); } // Home 
else if ($page[0]=='shop') { include_once('pages/shop.php'); } // Shop
else if ($page[0]=='cart') { include_once('pages/cart.php'); } // Shopping Cart
# Account Content
else if ($page[0]=='account') { include_once('pages/account.php'); } // Account
else if ($page[0]=='login') { include_once('pages/login.php'); } // Login
else if ($page[0]=='register') { include_once('pages/register.php'); } // Register
else if ($page[0]=='logout') { 
	# Logout
	session_destroy(); // Destroy session data
	header('Location: '.$_['SITE_URL'].'home'); } // Redirect to home
# Inventory Management
else if ($page[0]=='test') { include_once('test.php'); } // page for testing
else {
	# Redirect to home
	header('Location: '.$_['SITE_URL'].'home');
	die(); }
# Footer
include_once('pages/layout/footer.php');
?>
</body>
</html>