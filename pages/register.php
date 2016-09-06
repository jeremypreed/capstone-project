<?php
if ($_SESSION['id']){
	# If active session, redirect to account page
	redirect($_['SITE_URL'].'account');
} else {
	# Runs when user submits form
	if ($_POST['submit']) {
		$email = $_POST['email']; // User submitted email
		$email_confirm = $_POST['email_confirm']; // User submitted email confirm
		$password = strip_tags($_POST['password']); // User submitted password
		$password_confirm = strip_tags($_POST['password_confirm']); // User submitted password confirm
		
		if ($email !== $email_confirm){
			error('Emails do not match.');
		} else if ($password !== $password_confirm){
			error('Passwords do not match');
		} else if (strlen($password)<5){
			error('Password must at least 5 characters long.');
		} else {	
		
			# Check if email exists in database
			$sql = "SELECT * FROM customers WHERE email = '$email'";
			$query = mysqli_query($dbc,$sql);
			if (mysqli_num_rows($query)>0){
				error('The email "'.$email.'" already exists in the database.');
			} else {
				# Create account
				$first_name =  strip_tags($_POST['first_name']);
				$last_name =  strip_tags($_POST['last_name']);
				
				$sql = "INSERT INTO customers (first_name, last_name, password, email, active)
						VALUES ('$first_name', '$last_name', '$password', '$email', '1')";

				if (mysqli_query($dbc,$sql)) {		
					# Select row from DB matching new created criteria
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
						$user_reward_points= $row[8]; // User last login

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
						$_SESSION['reward_points'] = $user_reward_points;
						$_SESSION['shipping_price'] = 7.00;
						$_SESSION['welcome_first'] = true;
						redirect($_['SITE_URL'].'account/profile');
					}
				}
			}
		}
	}
}
# Register Page ?>
<div id="login">
	<section class="content-wrapper-1">
		<div class="container">
			<div class="login-box">
				<h2>Register</h2><br>
				<form method="post" action="<?php echo $_['SITE_URL']; ?>register">
					<input type="text" placeholder="First Name" name="first_name" required> <br>
					<input type="text" placeholder="Last Name" name="last_name"> <br>
					<input type="email" placeholder="E-mail" name="email" required> <br>
					<input type="email" placeholder="Confirm E-mail" name="email_confirm" required> <br>
					<input type="password" placeholder="Password" name="password" required> <br>
					<input type="password" placeholder="Confirm Password" name="password_confirm" required> <br>
					<input type="submit" value="Register" name="submit" class="submit">
				</form><br>
				<p>Already have an account? <a href="<?php echo $_['SITE_URL']; ?>login">Login</a>.</p>
			</div>
		</div>
	</section>
</div>