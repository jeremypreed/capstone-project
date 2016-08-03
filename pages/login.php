<?php

error_reporting(E_ALL & ~E_NOTICE); // Allow all error reporting
session_start(); // Create session

if ($_SESSION['id']){
	// If active session, redirect to account page
	header('Location: account');
} else {
	// Runs when user submits form
	if ($_POST['submit']) {
		include_once('sql/connect.php'); // Connect to DB
		$email = $_POST['email']; // User submitted email
		$password = strip_tags($_POST['password']); // User submitted password
		
		// Select row from DB matching submitted email
		$sql = "SELECT * FROM customers WHERE email = '$email' AND active = '1' LIMIT 1";
		$query = mysqli_query($dbconnect,$sql);
		
		// Store row from DB into variables
		if ($query) {
			$row = mysqli_fetch_row($query); // Array of row data
			$user_id = $row[0]; // User ID
			$user_first_name = $row[1]; // User First Name
			$user_last_name = $row[2]; // User Last Name
			$user_password = $row[3]; // User Password
			$user_email = $row[4]; // User Email
			$user_register_date = $row[6]; // Date user joined
			$user_last_login = $row[7]; // User last login
		}
		
		// Check user submitted email and password match DB
		if ($email == $user_email && $password == $user_password) {
			// Update last login to right now
			$sql = "UPDATE customers SET timestamp = NOW() WHERE id='$user_id'"; 
			$query = mysqli_query($dbconnect,$sql);

			// Set PHP session cookies
			$_SESSION['id'] = $user_id;
			$_SESSION['first_name'] = $user_first_name;
			$_SESSION['last_name'] = $user_last_name;
			$_SESSION['password'] = $user_password;
			$_SESSION['email'] = $user_email;
			$_SESSION['register_date'] = $user_register_date;
			$_SESSION['last_login'] = $user_last_login;
			header('Location: account');
		} else { 
			// User submitted email or password does not match DB
			echo "<div id=\"error\">Incorrect username or password.</div>"; 
		}
	}
}

?>
<!-- Login -->
<div id="login">
	<section class="content-wrapper-1">
		<div class="container">
			<div class="login-box">
			
			<h2>Login</h2><br>
			
			<form method="post" action="http://localhost/ecommerce/login">
				<input type="email" placeholder="E-mail" name="email" /> <br />
				<input type="password" placeholder="Password" name="password" /> <br />
				<input type="submit" value="Login" name="submit" class="submit" />
			</form><br>
			
			<p>Don't have an account? <a href="http://localhost/ecommerce/register">Register now!</a> It's quick, easy, and makes shopping easier.</p>
			
			</div>
		</div>
	</section>
</div>