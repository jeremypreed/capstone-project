<?php
$dbconnect = mysqli_connect($_['DB_HOST'],$_['DB_USER'],$_['DB_PASS'],$_['DB_NAME']); // Conects to the database
if (mysqli_connect_errno()) { // If error connecting
	echo '<div id="error">Failed to connect: '.mysqli_connect_errno().'</div>'; // Display error message
}