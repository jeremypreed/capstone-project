<section id="header"<?php if($page[0]!=='home'){ echo(' class="normal"'); } ?>>
	<a href="http://localhost/ecommerce/home"><img src="http://placehold.it/400x200" class="banner"></a>
		
	<div id="nav">	
		<nav>
			<ul>
				<li id="search-bar"><input type="text"><a href="#" class="search-icon"><i class="fa fa-search fw" aria-hidden="true"></i></a></li>
				<li>
					<a href="http://localhost/ecommerce/shop">Shop</a>
					<ul class="menu">
						<li><a href="#">Men</a></li>
						<li><a href="#">Women</a></li>
						<li><a href="#">Boys</a></li>
						<li><a href="#">Girls</a></li>
					</ul>
				</li>
				<li>
					<a href="http://localhost/ecommerce/cart">Cart 
						<span class="fa-stack fa-1x">
						  <i class="fa fa-shopping-cart fa-stack-1x"></i>
						  <strong class="fa-stack-1x cart-number"></strong>
						</span>
					</a>
					<ul class="menu">
						<li><a href="#" class="cart">No items.</a></li>
						<li><a href="#">Checkout</a></li>
					</ul>
				</li>
				<li>
					<a href="http://localhost/ecommerce/account">Account</a>
					<ul class="menu">
						<li><a href="#">Login</a></li>
						<li><a href="#">Register</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
	
	<div id="nav-info">
		<ul>
			<li>&nbsp;</li>
			<li>$0.00 (0 items)</li>
			<li>Guest</li>
		</ul>
	</div>
	
	<div id="carousel">
		<div class="left-arrow text-center"><a href="#"><i class="fa fa-angle-left fa-lg fw" aria-hidden="true"></i></a></div>
		<div class="right-arrow text-center"><a href="#"><i class="fa fa-angle-right fa-lg fw" aria-hidden="true"></i></a></div>
		<div class="tabs text-center">
			<a href="#"><i class="fa fa-circle-thin fa-lg fw" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-circle fa-lg fw" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-circle-thin fa-lg fw" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-circle-thin fa-lg fw" aria-hidden="true"></i></a>
		</div>
		<div class="content">
			<span><strong>Cashmere Collection!</strong></span><br>
			<span>Take <strong>20% off</strong> all winter scarves.</span><br>
			<span><i>Limited Time Only!</i></span>
		</div>
	</div>
</section>