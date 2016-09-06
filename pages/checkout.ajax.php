<?php
session_start();
# Address Information
$_SESSION['address'] = $_POST['address'];
$_SESSION['address_apt'] = $_POST['address_apt'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['state'] = $_POST['state'];
$_SESSION['zipcode'] = $_POST['zipcode'];
# Shipping Method
if ($_POST['ship']){
	switch ($_POST['ship']){
		case 3:
			echo "$30.00";
			$_SESSION['shipping_price'] = 30.00;
			break;
		case 2:
			echo "$15.00";
			$_SESSION['shipping_price'] = 15.00;
			break;
		default:
			echo "$7.00";
			$_SESSION['shipping_price'] = 7.00;
			break;
		
	}
}