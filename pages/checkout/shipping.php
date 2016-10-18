<div class="row cart no-padding">
	<div class="col-md-12 cart-head">
		Step 1: Address &mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/address">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
	</div>
	<div class="col-md-12 cart-head">Step 2: Shipping Method</div>
</div>

<div ng-controller="CheckoutController as checkout">
	<div class="row cart">
		<div class="col-md-12 checkout">

		<!-- Shipping Method -->
		<div class="col-md-12 ship-method">
			<strong>Shipping Method:</strong><br><br>

			<input type="radio" ng-model="checkout.shippingMethod" value="7"/> $7 - Standard - 4-9 Business Days<br>
			<input type="radio" ng-model="checkout.shippingMethod" value="15"/> $15 - Expedited - 2 Business Days<br>
			<input type="radio" ng-model="checkout.shippingMethod" value="30"/> $30 - Overnight - 1 Business Day<br>
		</div>
		
		<div class="col-md-12">&nbsp;</div>
			
		<div class="col-md-12">
			<a href="<?php echo $_['SITE_URL']; ?>checkout/review" class="btn btn-info" ng-click="checkout.submit()" ng-disabled="!checkout.shippingMethod">Next Step: Review & Pay</a>
		</div>
		
		</div>
	</div>

	<div class="row cart no-padding" ng-controller="CheckoutController as checkout">
		<div class="col-sm-12 cart-head">
			Step 3: Review & Pay
			<span ng-if="checkout.shippingMethod">&mdash; <a href="<?php echo $_['SITE_URL']; ?>checkout/review">Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></span>
		</div>
	</div>
</div>

