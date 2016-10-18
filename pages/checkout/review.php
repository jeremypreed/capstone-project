<div class="row cart no-padding">
	<div class="col-md-12 cart-head">
		Step 1: Address &mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/address">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	</div>
	<div class="col-md-12 cart-head">
		Step 2: Shipping Method &mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/shipping">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	</div>
	<div class="col-md-12 cart-head">Step 3: Review & Pay</div>
</div>

<div class="row cart" ng-controller="CartController as cart">
	<div class="col-md-12 checkout" ng-controller="CheckoutController as checkout">
		<div>
			<div class="col-sm-6">
				<h3>Shipping Address </h3>
				<strong>First Name:</strong> {{ checkout.s.first_name }} <br />
				<strong>Last Name:</strong> {{ checkout.s.last_name }} <br />
				<strong>Address:</strong> {{ checkout.s.address }} <br />
				<strong>Apt #:</strong> {{ checkout.s.address_apt }} <br />
				<strong>City:</strong> {{ checkout.s.city }} <br />
				<strong>State:</strong> {{ checkout.s.state }} <br />
				<strong>Zipcode:</strong> {{ checkout.s.zipcode }}
			</div>
			
			<div class="col-sm-6">
				<h3>Billing Address</h3>
				<strong>First Name:</strong> {{ checkout.b.first_name }} <br />
				<strong>Last Name:</strong> {{ checkout.b.last_name }} <br />
				<strong>Address:</strong> {{ checkout.b.address }} <br />
				<strong>Apt #:</strong> {{ checkout.b.address_apt }} <br />
				<strong>City:</strong> {{ checkout.b.city }} <br />
				<strong>State:</strong> {{ checkout.b.state }} <br />
				<strong>Zipcode:</strong> {{ checkout.b.zipcode }}
			</div>
			
			<div class="col-sm-12">
				<h4><a href="<?php echo $_['SITE_URL']; ?>checkout/address">Edit Address</a></h4>
				<hr class="space" />
			</div>
			
			<div class="col-sm-12">
				<h3>Shipping Method</h3>
				<p ng-if="checkout.shippingMethod===7">$7 - Standard - 4-9 Business Days</p>
				<p ng-if="checkout.shippingMethod===15">$15 - Expedited - 2 Business Days</p>
				<p ng-if="checkout.shippingMethod===30">$30 - Overnight - 1 Business Day</p>
				<h4><a href="<?php echo $_['SITE_URL']; ?>checkout/shipping">Edit Shipping Method</a></h4>
				<hr class="space" />
			</div>
<?php
if (!$_SESSION['id']){ // Guest Checkout ?>
			<div class="col-sm-12">
				<h3>Products</h3>
				<div ng-repeat="product in cart.products track by $index">
					<strong>Product:</strong> {{ product.name }} &mdash; 
					<strong>Quantity:</strong> {{ product.quantity }} &mdash;
					<strong>Price:</strong> {{ product.discount_price * product.quantity | currency }}
				</div>
				<h4><a href="<?php echo $_['SITE_URL']; ?>cart">Edit Cart</a></h4>
			</div>
			
			<div class="col-sm-12 summary">
				<h2>Summary</h2>
				<p><strong>Item(s):</strong> {{ cart.quantity }}</p>
				<p><strong>Subtotal:</strong> {{ cart.subtotal | currency }}</p>
				<p><strong>Tax (9.25%)</strong> {{ (cart.subtotal * 0.0925) | currency }}</p>
				<p><strong>Shipping:</strong> {{ checkout.shippingMethod | currency }}</p>
				<p class="total"><strong>Total:</strong> {{ checkout.calculateTotal(cart.subtotal) | currency }}</p>
			</div>			
		</div>

		<div class="col-md-12 paypal">
			<!-- Paypal -->
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="business" value="jeremy.p.reed-facilitator@gmail.com">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="return" value="<?php echo $_['SITE_URL'].'confirmation/' ?>">
				<input type="hidden" name="cancel_return" value="<?php echo $_['SITE_URL'].'checkout/review' ?>">
				<!-- Order Information -->
				<input type="hidden" name="item_name" value="Clothing Website Purchase">
				<input type="hidden" name="amount" ng-value="checkout.calculateTotal(cart.subtotal) | currency" id="paypal_total">
				<input type="hidden" name="currency_code" value="USD">
				
				<button type="submit" name="submit">
					<img src="<?php echo $_['SITE_URL']; ?>img/checkout-logo-large.png">
				</button>
				
				<br><br>
				<p>(Paypal Account &mdash; <strong>Email:</strong> username@website.com <strong>Password:</strong> 12345678)</p>
			</form>
		</div>
<?php
} else { // User Checkout ?>
			<div class="col-sm-12">
				<h3>Products</h3>
<?php
	$r = $c->query($dbc);
	while ($row = mysqli_fetch_row($r)){
		$c->columns($row);
		$pr = $i->query($dbc,-1, -1, $c->product_id); // Query DB for row
		$i->columns(mysqli_fetch_row($pr)); // Fetch Column ?>

				<div>
					<strong>Product:</strong> <?php echo $i->name; ?> &mdash; 
					<strong>Quantity:</strong> <?php echo $c->quantity; ?> &mdash;
					<strong>Price:</strong> <?php echo '$'.cash($i->discount_price*$c->quantity); ?>
				</div>
<?php
	}
	$c->summary($dbc);
?>
				<h4><a href="<?php echo $_['SITE_URL']; ?>cart">Edit Cart</a></h4>
			</div>

			<div class="col-sm-12 summary">
				<h2>Summary</h2>
				<p><strong>Item(s):</strong> <?php echo $c->total_quantity; ?></p>
				<p><strong>Subtotal:</strong> <?php echo '$'.cash($c->discount_subtotal); ?></p>
				<p><strong>Tax (9.25%)</strong> <?php echo '$'.$c->tax($c->discount_subtotal); ?></p>
				<p><strong>Shipping:</strong> {{ checkout.shippingMethod | currency }}</p>
				<?php echo '<input type="hidden" ng-model="total_tax" ng-init="total_tax='.(cash($c->discount_subtotal)+$c->tax($c->discount_subtotal)).'"/>'; ?>
				<p class="total"><strong>Total:</strong> {{ total_tax + checkout.shippingMethod | currency }}</p>
			</div>
		</div>

		<div class="col-md-12 paypal">
			<!-- Paypal -->
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
				<input type="hidden" name="business" value="jeremy.p.reed-facilitator@gmail.com">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="return" value="<?php echo $_['SITE_URL'].'confirmation/' ?>">
				<input type="hidden" name="cancel_return" value="<?php echo $_['SITE_URL'].'checkout/review' ?>">
				<!-- Order Information -->
				<input type="hidden" name="item_name" value="Clothing Website Purchase">
				<input type="hidden" name="amount" ng-value="(total_tax+checkout.shippingMethod) | currency" id="paypal_total">
				<input type="hidden" name="currency_code" value="USD">
				
				<button type="submit" name="submit">
					<img src="<?php echo $_['SITE_URL']; ?>img/checkout-logo-large.png">
				</button>
				
				<br><br>
				<p>(Paypal Account &mdash; <strong>Email:</strong> username@website.com <strong>Password:</strong> 12345678)</p>
			</form>
		</div>			
	<?php
}?>	
	</div>
</div>