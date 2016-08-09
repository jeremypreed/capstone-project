<?php
if (!$_SESSION['id']){ // If not active session
	header('Location: '.$_['SITE_URL'].'login'); // Redirect to login page
	die();
} else { 
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
					if ($page[1]=='profile'){ include_once('account/profile.php'); } // Profile
					else if ($page[1]=='orders'){ include_once('account/orders.php'); } // Orders	
					else if ($page[1]=='track'){ include_once('account/track.php'); } // Track
					else if ($page[1]=='wishlists'){ include_once('account/wishlists.php'); } // Wishlists
					else { header('Location: '.$_['SITE_URL'].'account/profile'); } // Redirect to profile	
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php }