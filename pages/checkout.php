<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-12 main-content">	
				<div class="container-fluid">
					<h2>Checkout</h2>
<?php				
# Checkout
if ($p[1]=='address') { // Address
	include_once('pages/checkout/address.php');
} else if ($p[1]=='shipping') { // Shipping
	include_once('pages/checkout/shipping.php');
} else if ($p[1]=='review') { // Review
	include_once('pages/checkout/review.php');
} else {
	redirect($_['SITE_URL'].'checkout/address');
}
?>
				</div>
			</div>
		</div>
	</section>
</div>