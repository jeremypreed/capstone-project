<?php
if (!$_SESSION['id']){ // If not active session
	redirect($_['SITE_URL'].'login'); // Redirect to login page
	die();
} else {
	if ($_SESSION['welcome']==true){
		alert('Welcome, '.$_SESSION['first_name'].'! You have logged in successfully.');
		$_SESSION['welcome'] = false;
	}
	if ($_SESSION['welcome_first']==true){
		alert('Welcome, '.$_SESSION['first_name'].'! Your account was successfully created.');
		$_SESSION['welcome_first'] = false;
	}
# Account Page ?>
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">
				<?php include_once('layout/account-panel.php'); ?>
			</div>			
			<div class="col-md-9 main-content">	
				<div class="container-fluid">
					<?php
					if ($p[1]=='profile'){ include_once('account/profile.php'); } // Profile
					else if ($p[1]=='orders'){ include_once('account/orders.php'); } // Orders	
					else if ($p[1]=='track'){ include_once('account/track.php'); } // Track
					else if ($p[1]=='wishlist'){ include_once('account/wishlist.php'); } // Wishlists
					else { redirect($_['SITE_URL'].'account/profile'); } // Redirect to profile	
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php }