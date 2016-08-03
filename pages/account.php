<?php
if (!$_SESSION['id']){
	// If not active session, redirect to login page
	header('Location: http://localhost/ecommerce/login');
	die();
} else { ?>

<!-- Account -->
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">

			<?php include_once('layout/account-panel.php'); ?>
		
			</div>			
			<div class="col-md-9 main-content">	
				<div class="container-fluid">
					
				<?php
				
				if ($page[1]=='profile'){ include_once('profile.php'); } // Profile
				else if ($page[1]=='orders'){ include_once('orders.php'); } // Orders	
				else if ($page[1]=='track'){ include_once('track.php'); } // Track
				else if ($page[1]=='wishlists'){ include_once('wishlists.php'); } // Wishlists
				else { header('Location: http://localhost/ecommerce/account/profile'); } // Redirect to home page	
				
				?>
					
				</div>
			</div>
		</div>
	</section>
</div>

<?php } ?>