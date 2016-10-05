<div ng-controller="CartController as cart">
	<div ng-hide="cart.products[0]">
		<p>Your cart is empty.</p>
	</div>

	<div class="row cart no-padding" ng-show="cart.products[0]">
		<div class="col-md-8"></div>
		<div class="col-md-2 cart-head text-center">Quantity</div>
		<div class="col-md-2 cart-head text-right">Price</div>
	</div>
	
	<div class="row cart" ng-repeat="product in cart.products track by $index" ng-class="cart.alternate($index)">
		<div class="col-md-2 col-xs-4 cart-img text-center">
			<a ng-href="{{ '<?php $_['SITE_URL']; ?>shop/' + product.category + '/' + product.subcategory + '/' + product.id }}">
				<img ng-src="{{ '<?php $_['SITE_URL']; ?>' + product.image}}">
			</a>
		</div>
		<div class="col-md-6 col-xs-8 cart-desc">
			<h4>{{product.name}}</h4>
			<p>{{product.size + ', ' + product.color}}</p>
		</div>
		<div class="col-md-2 col-xs-4 cart-items text-center">
				<button ng-click="product.quantity=(product.quantity-1);" class="update">&minus;</button>
				<input type="number" ng-model="product.quantity" class="update"/>
				<button ng-click="product.quantity=(product.quantity+1);" class="update">&plus;</button>
				
				<button type="submit" class="update" ng-click="cart.updateProduct($index,product.quantity);" ng-hide="product.quantity==quantity">Update</button><br>
				
				<button type="submit" class="btn btn-link remove" ng-click="cart.removeProduct($index);">
					<i class="fa fa-remove fw"></i> Remove
				</button>
			<form method="post" action="#"></form>
		</div>
		<div class="col-md-2 col-xs-8 cart-price text-right">
			<span class="small" ng-hide="product.quantity==1">
				{{ '$' + product.discount_price }} &times; {{ product.quantity }}<br>
			</span>
			<span class="price" ng-show="product.price==product.discount_price">
				{{ cart.cash(product.price * product.quantity) }}
			</span>
			<span class="discount" ng-hide="product.price==product.discount_price">
				{{ cart.cash(product.price * product.quantity) }}
			</span>
			<span class="price-red" ng-hide="product.price==product.discount_price">
				{{ cart.cash(product.discount_price * product.quantity) }}
			</span>
			<span class="small" ng-hide="product.amount_off==0">
				<br>{{ product.percent_off + ' Off' }}
				<br>{{ 'You save ' + cart.cash(product.amount_off * product.quantity) }}
			</span>
		</div>
	</div>
	
	<div ng-show="cart.products[0]">
		<form action="<?php echo $_['SITE_URL'].'cart/'; ?>">
			<button type="submit" onClick="localStorage.clear();">Empty Cart</button>
		</form>

		<div class="row cart no-padding">
			<div class="col-md-8"></div>
			<div class="col-md-4 cart-head text-right">Subtotal</div>
		</div>
		
		<div class="row cart text-right">
			<div class="col-md-7"></div>
			<div class="col-md-5 subtotal">
				{{ cart.cash(cart.subtotal) }}<br>
				<span class="small">
					{{ 'You save ' + cart.cash(cart.savings) + ' on ' + cart.quantity + ' item(s)' }}
				</span>
			</div>
		</div>
		
		<div class="row cart text-center no-padding">
			<div class="col-md-9"></div>
			<div class="col-md-3 cart-checkout">
				<form method="POST" action="<?php echo $_['SITE_URL'].'checkout'; ?>">
					<button type="submit" value="Checkout">Checkout</button>
				</form>
			</div>
		</div>
	</div>
		
</div>
</div>