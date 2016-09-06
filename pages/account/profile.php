<h2>Profile</h2>

<div class="row">
	<div class="col-md-12 info-row"><strong>Name:</strong> <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></div>

	<div class="col-md-12 info-row"><strong>E-Mail:</strong> <?php echo $_SESSION['email']; ?></div>

	<div class="col-md-12 info-row"><strong>Password:</strong> ********</div>
	
	<div class="col-md-12 info-row"><strong>Reward Points:</strong> <?php echo $_SESSION['reward_points']; ?></div>
	
	<div class="col-md-12 info-row">Member since <strong><?php echo date('F jS, Y', strtotime($_SESSION['register_date'])); ?></strong></div>
	
	
</div>
