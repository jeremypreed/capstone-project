<?php
// Set page via URI
$request = str_replace('/ecommerce/', '', $_SERVER['REQUEST_URI']);
$page = explode('/', $request);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/style.css" /><!-- Custom stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.min.css" /><!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Raleway:200italic,400,400italic,700,900' rel='stylesheet' type='text/css'><!-- Google Font Raleway -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,200' rel='stylesheet' type='text/css'><!-- Google Font Source Sans -->
	<script src="https://use.fontawesome.com/84aba4ed8a.js"></script> <!-- Font Awesome -->
	<script src="js/lib/jquery.min.js"></script><!-- jQuery -->
	<script src="js/javascript.js"></script><!-- Custom javascript -->
</head>
<body>
<?php 

// Header
include_once('pages/layout/header.php');

// Content
if ($page[0]=='home') {	include_once('pages/home.php'); } // Home 
else if ($page[0]=='shop') { include_once('pages/shop.php'); } // Shop
else if ($page[0]=='product') { include_once('pages/product.php'); } // Product
else if ($page[0]=='cart') { include_once('pages/cart.php'); } // Shopping Cart
else {
	// Redirect to home
	header('Location: home');
	die();
}

// Footer
include_once('pages/layout/footer.php');

?>
</body>
</html>