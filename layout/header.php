<section id="header"<?php if($page[0]!=='home'){ echo(' class="normal"'); } ?>>
	<a href="http://localhost/ecommerce/home">
		<img src="http://localhost/ecommerce/img/logo.png" class="banner">
		<img src="http://localhost/ecommerce/img/logo_sm.png" class="banner-small">
	</a>
		
	<div id="nav">	
		<nav>
			<ul>
				<li id="search-bar"><input type="text"><a href="#" class="search-icon"><i class="fa fa-search fw" aria-hidden="true"></i></a></li>
				<li>
					<a href="http://localhost/ecommerce/shop">Shop</a>
					<ul class="menu">
						<li><a href="http://localhost/ecommerce/shop/men">Men</a></li>
						<li><a href="http://localhost/ecommerce/shop/women">Women</a></li>
						<li><a href="http://localhost/ecommerce/shop/boys">Boys</a></li>
						<li><a href="http://localhost/ecommerce/shop/girls">Girls</a></li>
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
						<li><a href="http://localhost/ecommerce/cart/checkout">Checkout</a></li>
					</ul>
				</li>
				
				<li>
					<a href="http://localhost/ecommerce/account">Account</a>
					
					<?php if (isset($_SESSION['id'])) { // Menu to show if logged in ?>
					<ul class="menu">
						<li><a href="http://localhost/ecommerce/account/orders">Orders</a></li>
						<li><a href="http://localhost/ecommerce/account/track">Track</a></li>
						<li><a href="http://localhost/ecommerce/account/wishlists">Wishlists</a></li>
						<li><a href="http://localhost/ecommerce/logout">Log out</a></li>
					</ul>					
					<?php } else { // Menu to show if not logged in ?>
					<ul class="menu">
						<li><a href="http://localhost/ecommerce/login">Login</a></li>
						<li><a href="http://localhost/ecommerce/register">Register</a></li>
					</ul>
					<?php } ?>
				</li>
				
			</ul>
		</nav>
	</div>

	<?php if($page[0]=='home'){ // Show carousel if on home page ?>	
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
	<?php } else { // Show shopping info if not home page ?>
	<div id="nav-info">
		<ul>
			<li>&nbsp;</li>
			<li>$0.00 (0 items)</li>
			<?php // If logged in show users name. If not, show guest.
			if ($_SESSION['id']){ echo "<li>".$_SESSION['first_name']." ".$_SESSION['last_name']."</li>"; } else { echo "<li>Guest</li>"; } ?>
		</ul>
	</div>
	<?php } ?>
</section>