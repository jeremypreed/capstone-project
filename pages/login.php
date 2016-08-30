<?php
if ($_SESSION['id']){
	# If active session, redirect to account page
	header('Location: '.$_['SITE_URL'].'account');
} else {
	# Runs when user submits form
	if ($_POST['submit']) {
		$email = $_POST['email']; // User submitted email
		$password = strip_tags($_POST['password']); // User submitted password
		# Select row from DB matching submitted email
		$sql = "SELECT * FROM customers WHERE email = '$email' AND active = '1' LIMIT 1";
		$query = mysqli_query($dbc,$sql);
		# Store row from DB into variables
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
		# Check user submitted email and password match DB
		if ($email == $user_email && $password == $user_password) {
			# Update last login to right now
			$sql = "UPDATE customers SET timestamp = NOW() WHERE id='$user_id'"; 
			$query = mysqli_query($dbc,$sql);
			# Set PHP session cookies
			$_SESSION['id'] = $user_id;
			$_SESSION['first_name'] = $user_first_name;
			$_SESSION['last_name'] = $user_last_name;
			$_SESSION['password'] = $user_password;
			$_SESSION['email'] = $user_email;
			$_SESSION['register_date'] = $user_register_date;
			$_SESSION['last_login'] = $user_last_login;
			$_SESSION['welcome'] = true;
			header('Location: '.$_['SITE_URL'].'account/profile');
		} else { 
			# User submitted email or password does not match DB
			error('Incorrect email or password'); 
		}
	}
}
# Login Page ?>
<div id="login">
	<section class="content-wrapper-1">
		<div class="container">
			<div class="login-box">
				<h2>Login</h2><br>
				<form method="post" action="<?php echo $_['SITE_URL']; ?>login">
					<input type="email" placeholder="E-mail" name="email" required> <br>
					<input type="password" placeholder="Password" name="password" required> <br>
					<input type="submit" value="Login" name="submit" class="submit">
				</form><br>
				<p>Don't have an account? <a href="<?php echo $_['SITE_URL']; ?>register">Register</a>!</p>
			</div>
		</div>
	</section>
</div>