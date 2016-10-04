var localCart = JSON.parse(localStorage.getItem('cart'));

if (!localCart) {
	localCart = {};
	localCart.products = [];
}
	
(function(){
	var app = angular.module('cw',[]);
	
	app.controller('CartController',function(){
		this.products = localCart.products;	
		
		this.alternate = function(x){
			if (x % 2 !== 0) {
				return 'alt';
			}
		}
		
		this.addCartItem = function(_product){
			
			var productExists = false;
			
			for (var i in localCart.products){
				var product = localCart.products[i];
				
				if (product['id'] == _product.id){
					console.log("Product already in cart. Updating");
					this.updateCartItem(i, product['quantity'] + 1);
					productExists = true;
				}
			}
			
			if (!productExists) {
				console.log("Product doesn't exist in cart. Adding");
				_product.quantity = 1;
				localCart.products.push(_product);
			}

			localStorage.setItem('cart', JSON.stringify(localCart));
		}
		
		this.updateCartItem = function(_index, _quantity){
			localCart.products[_index].quantity = _quantity;
			localStorage.setItem('cart', JSON.stringify(localCart));
		}

		this.removeCartItem = function(_index){
			localCart.products.splice(_index, 1);
			localStorage.setItem('cart', JSON.stringify(localCart));
		}
	});
	
})();