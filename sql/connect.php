<?php

// Database login data
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "clothing_website";
$dbconnect = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname); // Conects to the database

if (mysqli_connect_errno()) {
	echo "<div id=\"error\">Failed to connect: " . mysqli_connect_errno() . "</div>";
}

?>