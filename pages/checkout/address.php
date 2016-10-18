<div class="row cart no-padding">
	<div class="col-sm-12 cart-head">Step 1: Address</div>
</div>

<p>Please fill out all the required fields below.</p>

<div class="row cart" ng-controller="CheckoutController as checkout">
	<div class="col-sm-10 checkout form-group has-success has-feedback">

		<p><strong>Shipping Address:</strong></p>
		
		<form name="shippingAddress">
		<div class="col-sm-6">
			<!-- First Name -->
			<label class="col-sm-4">First Name:</label>
			<div class="col-sm-8">
				<input type="text" name="first_name" ng-model="checkout.s.first_name" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.first_name.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- Last Name -->
			<label class="col-sm-4">Last Name:</label>
			<div class="col-sm-8">
				<input type="text" name="last_name" ng-model="checkout.s.last_name" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.last_name.$valid"></span>
			</div>
		</div>
		
		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-12">
			<!-- Address -->
			<label class="col-sm-2">Address:</label>
			<div class="col-sm-6">
				<input type="text" name="address" ng-model="checkout.s.address" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.address.$valid"></span>
			</div>
		</div>
		<div class="col-sm-12">
			<!-- Apt # -->
			<label class="col-sm-2">Apt #:</label>
			<div class="col-sm-6">
				<input type="text" name="address_apt" ng-model="checkout.s.address_apt">
			</div>
		</div>

		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-6">
			<!-- City -->
			<label class="col-sm-4">City:</label>
			<div class="col-sm-8">
				<input type="text" name="city" ng-model="checkout.s.city" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.city.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- State -->
			<label class="col-sm-4">State:</label>
			<div class="col-sm-8">
				<input type="text" name="state" ng-model="checkout.s.state" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.state.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- Zip Code -->
			<label class="col-sm-4">Zip Code:</label>
			<div class="col-sm-8">
				<input type="text" name="zipcode" ng-model="checkout.s.zipcode" class="form-control" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="shippingAddress.zipcode.$valid"></span>
			</div>
		</div>

		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-12">
			<div class="alert alert-warning" role="alert" ng-if="shippingAddress.$invalid">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Warning:</span>
				Your shipping address is incomplete
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.first_name.$invalid&&shippingAddress.first_name.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid first name
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.last_name.$invalid&&shippingAddress.last_name.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid last name
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.address.$invalid&&shippingAddress.address.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid address
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.city.$invalid&&shippingAddress.city.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid city
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.state.$invalid&&shippingAddress.state.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid state
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="shippingAddress.zipcode.$invalid&&shippingAddress.zipcode.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid zip code
			</div>
			</form>
		</div>
	</div>

	<div class="col-sm-10 checkout form-group has-success has-feedback" ng-if="shippingAddress.$valid">
	
		<p><strong>Billing Address:</strong></p>
		
		<p><input type="checkbox" ng-model="sameAs" ng-change="checkout.update()" class="same_as">Same as shipping address</p>
	
		<form name="billingAddress">
		<div class="col-sm-6">
			<!-- First Name -->
			<label class="col-sm-4">First Name:</label>
			<div class="col-sm-8">
				<input type="text" name="first_name" ng-model="checkout.b.first_name" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.first_name.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- Last Name -->
			<label class="col-sm-4">Last Name:</label>
			<div class="col-sm-8">
				<input type="text" name="last_name" ng-model="checkout.b.last_name" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.last_name.$valid"></span>
			</div>
		</div>
		
		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-12">
			<!-- Address -->
			<label class="col-sm-2">Address:</label>
			<div class="col-sm-6">
				<input type="text" name="address" ng-model="checkout.b.address" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.address.$valid"></span>
			</div>
		</div>
		<div class="col-sm-12">
			<!-- Apt # -->
			<label class="col-sm-2">Apt #:</label>
			<div class="col-sm-6">
				<input type="text" name="address_apt" ng-model="checkout.b.address_apt" ng-disabled="sameAs">
			</div>
		</div>

		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-6">
			<!-- City -->
			<label class="col-sm-4">City:</label>
			<div class="col-sm-8">
				<input type="text" name="city" ng-model="checkout.b.city" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.city.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- State -->
			<label class="col-sm-4">State:</label>
			<div class="col-sm-8">
				<input type="text" name="state" ng-model="checkout.b.state" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.state.$valid"></span>
			</div>
		</div>
		<div class="col-sm-6">
			<!-- Zip Code -->
			<label class="col-sm-4">Zip Code:</label>
			<div class="col-sm-8">
				<input type="text" name="zipcode" ng-model="checkout.b.zipcode" class="form-control" ng-disabled="sameAs" required>
				<span class="glyphicon glyphicon-ok form-control-feedback" ng-if="billingAddress.zipcode.$valid"></span>
			</div>
		</div>
		
		<div class="col-sm-12">&nbsp;</div>
		
		<div class="col-sm-12">
			<div class="alert alert-warning" role="alert" ng-if="billingAddress.$invalid">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Warning:</span>
				Your billing address is incomplete
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.first_name.$invalid&&billingAddress.first_name.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid first name
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.last_name.$invalid&&billingAddress.last_name.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid last name
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.address.$invalid&&billingAddress.address.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid address
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.city.$invalid&&billingAddress.city.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid city
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.state.$invalid&&billingAddress.state.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid state
			</div>
			
			<div class="alert alert-danger" role="alert" ng-if="billingAddress.zipcode.$invalid&&billingAddress.zipcode.$dirty">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Enter a valid zip code
			</div>

			<a href="<?php echo $_['SITE_URL']; ?>checkout/shipping" class="btn btn-info" ng-disabled="billingAddress.$invalid" ng-click="checkout.submit()">Next Step: Shipping Method</a>
			</form>
		</div>
	</div>
</div>


<div class="row cart no-padding" ng-controller="CheckoutController as checkout">
	<div class="col-sm-12 cart-head">
		Step 2: Shipping Method
		<span ng-if="checkout.shippingMethod">&mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/shipping">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></span>
	</div>
	<div class="col-sm-12 cart-head">
		Step 3: Review & Pay
		<span ng-if="checkout.shippingMethod">&mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/review">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></span>
	</div>
</div>