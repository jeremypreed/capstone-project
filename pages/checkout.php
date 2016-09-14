<!-- Checkout -->
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-12 main-content">	
				<div class="container-fluid">
					<h2>Checkout</h2>
<?php 
if ($_SESSION['id']){
	$result = $c->query($dbc);
	$cartx = 0;
	if (mysqli_num_rows($result)>0){

$c->summary($dbc);
# Checkout Form ?>
<p>Please fill out all the required fields below.</p>
	<div class="row cart no-padding">
		<div class="col-md-12 cart-head">Shipping Information</div>
	</div>
	
	<div class="row cart">
		<div class="col-md-12 checkout">
			<div class="col-md-6">
				<!-- First Name -->
				<div class="col-md-4 head">First Name:</div>
				<div class="col-md-8">
					<input type="text" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" />
				</div>
			</div>
			<div class="col-md-6">
				<!-- Last Name -->
				<div class="col-md-4 head">Last Name:</div>
				<div class="col-md-8">
					<input type="text" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" />
				</div>
			</div>
			
			<div class="col-md-12">&nbsp;</div>
			
			<div class="col-md-12">
				<!-- Address -->
				<div class="col-md-2 head">Address:</div>
				<div class="col-md-6">
					<input type="text" name="address" value="<?php echo $_SESSION['address']; ?>">
				</div>
			</div>
			<div class="col-md-12">
				<!-- Apt # -->
				<div class="col-md-2 head">Apt #:</div>
				<div class="col-md-6">
					<input type="text" name="address_apt" value="<?php echo $_SESSION['address_apt']; ?>">
				</div>
			</div>

			<div class="col-md-12">&nbsp;</div>
			
			<div class="col-md-6">
				<!-- City -->
				<div class="col-md-4 head">City:</div>
				<div class="col-md-8">
					<input type="text" name="city" value="<?php echo $_SESSION['city']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<!-- State -->
				<div class="col-md-4 head">State:</div>
				<div class="col-md-8">
					<input type="text" name="state" value="<?php echo $_SESSION['state']; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<!-- Zip Code -->
				<div class="col-md-4 head">Zip Code:</div>
				<div class="col-md-8">
					<input type="text" name="zipcode" value="<?php echo $_SESSION['zipcode']; ?>">
				</div>
			</div>
			<div class="col-md-6">
			</div>
			
			<div class="col-md-12">&nbsp;</div>
			
			<div class="col-md-12">
				<!-- Email Address -->
				<div class="col-md-2 head">E-Mail:</div>
				<div class="col-md-6">
					<input type="text" name="email" value="<?php echo $_SESSION['email']; ?>" />
				</div>
			</div>
			
			<div class="col-md-12"><hr></div>
			
			<div class="col-md-12">
				<!-- Shipping Method -->
				<div class="col-md-12 ship-method">
					<strong>Shipping Method:</strong><br><br>
<?php
switch ($_SESSION['shipping_price']){
	case 30.00:
		$ship3 = 'checked';
		break;
	case 15.00:
		$ship2 = 'checked';
	default:
		$ship1 = 'checked';
}

echo '<input type="radio" name="ship_method" value="1" '.$ship1.'/> $7 - Standard - 4-9 Business Days<br>';
echo '<input type="radio" name="ship_method" value="2" '.$ship2.'/> $15 - Expedited - 2 Business Days<br>';
echo '<input type="radio" name="ship_method" value="3" '.$ship3.'/> $30 - Overnight - 1 Business Day<br>';
?>
				</div>
			</div>
		</div>
	</div>

	<div class="row cart no-padding">
		<div class="col-md-12 cart-head">Order Summary</div>
	</div>
	
<?php $c->summary($dbc); ?>	

	<div class="row cart">
		<div class="col-md-12 checkout">
			<div class="col-md-12">
					<!-- Subtotal -->
					<div class="col-md-2 head">Subtotal:</div>
					<div class="col-md-6" id="subTotal">
						<?php echo '$'.cash($c->discount_subtotal); ?>	
					</div>			
			</div>

			<div class="col-md-12">
					<!-- Tax -->
					<div class="col-md-2 head">
						<?php echo 'Tax ('.($c->tax_rate*100).'%):'; ?>
					</div>
					<div class="col-md-6" id="taxTotal">
						<?php echo '$'.$c->tax($c->discount_subtotal); ?>	
					</div>			
			</div>

			<div class="col-md-12">
					<!-- Shipping -->
					<div class="col-md-2 head">Shipping:</div>
					<div class="col-md-6" id="shippingTotal">
						<?php
						if (isset($_SESSION['shipping_price'])){
							echo '$'.cash($_SESSION['shipping_price']);
						} else {
							echo '$7.00';
						}
						?>
					</div>			
			</div>
			
			<div class="col-md-12"><hr></div>

			<div class="col-md-12">
					<!-- Total -->
					<div class="col-md-2 head">Total:</div>
					<div class="col-md-6" id="actualTotal">
						<?php echo '$'.cash($_SESSION['purchase_total']); ?>	
					</div>			
			</div>
			
			<div class="col-md-12">&nbsp;</div>
			
			<div class="col-md-12">
				<!-- Paypal -->
				<div class="col-md-12 paypal">
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="business" value="jeremy.p.reed-facilitator@gmail.com">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="return" value="<?php echo $_['SITE_URL'].'confirmation/' ?>">
						<input type="hidden" name="cancel_return" value="<?php echo $_['SITE_URL'].'checkout' ?>">
						<!-- Order Information -->
						<input type="hidden" name="item_name" value="Clothing Website Purchase">
						<input type="hidden" name="amount" value="<?php echo $_SESSION['purchase_total']; ?>" id="paypal_total">
						<input type="hidden" name="currency_code" value="USD">
						
						<button type="submit" name="submit">
							<img src="img/checkout-logo-large.png">
						</button>
						
						<br><br>
						<p>(Paypal Account &mdash; <strong>Email:</strong> username@website.com <strong>Password:</strong> 12345678)</p>
					</form>
				</div>
			</div>
			
			
		</div>
	</div>

</div>
</form>
<?php
	} else { echo $MSG['CART_EMPTY']; }
} else { echo $MSG['LOGIN']; }
?>
			
			</div>
		</div>
	</section>
</div>