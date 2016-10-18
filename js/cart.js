(function(){
	app.service('LocalCartService',function(){
		var cart = JSON.parse(localStorage.getItem('cart'));

		if (!cart) {
			cart = {};
			cart.products = [];
		}
		
		return { cart: cart };
	});
	
	app.service('LocalCheckoutService',function(){
		var checkout = JSON.parse(localStorage.getItem('checkout'));

		if (!checkout) {
			checkout = {};
			checkout.s = {};
			checkout.b = {};
		}
		
		return { checkout: checkout };
	});
	
	app.controller('CartController',function(LocalCartService){
		this.products = LocalCartService.cart.products;
		this.json = JSON.stringify(LocalCartService.cart);
		
		this.addProduct = function(_product){
			
			var productExists = false;
			
			for (var i in LocalCartService.cart.products){
				var product = LocalCartService.cart.products[i];
				
				if (product['id'] == _product.id){
					this.updateProduct(i, product['quantity'] + 1);
					productExists = true;
				}
			}
			
			if (!productExists) {
				_product.quantity = 1;
				LocalCartService.cart.products.push(_product);
			}

			localStorage.setItem('cart', JSON.stringify(LocalCartService.cart));
			this.update();
		}
		
		this.updateProduct = function(_index, _quantity){
			if (_quantity>0&&Number.isInteger(_quantity)){
				LocalCartService.cart.products[_index].quantity = _quantity;
				localStorage.setItem('cart', JSON.stringify(LocalCartService.cart));
				this.update();
			}
		}

		this.removeProduct = function(_index){
			LocalCartService.cart.products.splice(_index, 1);
			localStorage.setItem('cart', JSON.stringify(LocalCartService.cart));
			this.update();
		}
		
		this.update = function(){
			this.subtotal = 0;
			this.savings = 0;
			this.quantity = 0;
			
			for (var i in LocalCartService.cart.products){
				var product = LocalCartService.cart.products[i];
				this.subtotal = Number(this.subtotal + (product['discount_price'] * product['quantity']));
				this.savings = Number(this.savings + (product['amount_off'] * product['quantity']));
				this.quantity = Number(this.quantity + product['quantity']);
			}			
		}
		
		this.update();
	});
	
	app.controller('CheckoutController',function($scope, LocalCheckoutService){
		this.s = LocalCheckoutService.checkout.s;
		this.b = LocalCheckoutService.checkout.b;
		this.shippingMethod = Number(LocalCheckoutService.checkout.sm);
		this.tax = 0.0925;
		
		this.update = function(){
			this.b = angular.copy(this.s);
			$scope.b = this.b;
		};
		
		this.submit = function(){
			LocalCheckoutService.checkout.s = this.s;
			LocalCheckoutService.checkout.b = this.b;
			LocalCheckoutService.checkout.sm = this.shippingMethod;
			localStorage.setItem('checkout', JSON.stringify(LocalCheckoutService.checkout));
		};
		
		this.calculateTotal = function(_st){
			return _st+(_st*this.tax)+this.shippingMethod;
		};
	});
})();