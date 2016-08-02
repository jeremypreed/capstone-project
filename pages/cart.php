<!-- Shopping Cart -->
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">

				<?php include_once('layout/account-panel.php'); ?>
			
			</div>
			
			<div class="col-md-9 main-content">	
			
				<div class="container-fluid">
					<h2>Shopping Cart</h2>

					<div class="row cart no-padding">
						<div class="col-md-7"></div>
						<div class="col-md-2 cart-head text-center">Quantity</div>
						<div class="col-md-3 cart-head text-right">Price</div>
					</div>
					
					<div class="row cart">
						<div class="col-md-2 col-xs-4 cart-img text-center"><img src="http://placehold.it/250x400" S></div>
						<div class="col-md-5 col-xs-8 cart-desc">
							<h4>This is an item</h4>
							<p>This is the items description</p>
						</div>
						<div class="col-md-2 col-xs-4 cart-items text-center">
							<select>
								<option disabled>Quantity</option>
								<option value="1" selected>1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-3 col-xs-8 cart-price text-right">$8.99</div>
					</div>
					
					<div class="row cart alt">
						<div class="col-md-2 col-xs-4 cart-img text-center"><img src="http://placehold.it/250x400" S></div>
						<div class="col-md-5 col-xs-8 cart-desc">
							<h4>This is an item</h4>
							<p>This is the items description</p>
						</div>
						<div class="col-md-2 col-xs-4 cart-items text-center">
							<select>
								<option disabled>Quantity</option>
								<option value="1" selected>1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-3 col-xs-8 cart-price text-right">$8.99</div>
					</div>

					<div class="row cart">
						<div class="col-md-2 col-xs-4 cart-img text-center"><img src="http://placehold.it/250x400" S></div>
						<div class="col-md-5 col-xs-8 cart-desc">
							<h4>This is an item</h4>
							<p>This is the items description</p>
						</div>
						<div class="col-md-2 col-xs-4 cart-items text-center">
							<select>
								<option disabled>Quantity</option>
								<option value="1" selected>1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-3 col-xs-8 cart-price text-right">$8.99</div>
					</div>

					<div class="row cart no-padding">
						<div class="col-md-9"></div>
						<div class="col-md-3 cart-head text-right">Subtotal</div>
					</div>
					
					<div class="row cart text-center">
						<div class="col-md-9"></div>
						<div class="col-md-3 cart-subtotal">(3 items) $50.82</div>
					</div>
					
					<div class="row cart text-center no-padding">
						<div class="col-md-9"></div>
						<div class="col-md-3 cart-checkout"><button>Checkout</button></div>
					</div>
				</div>
			
			</div>
		</div>
	</section>
</div>
<?php
include_once('layout/recommended.php');