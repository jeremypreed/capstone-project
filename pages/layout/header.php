<section id="header"<?php if($page[0]!=='home'){ echo(' class="normal"'); } ?>>
	<a href="<?php echo $_['SITE_URL']; ?>home">
		<img src="<?php echo $_['SITE_URL']; ?>img/logo.png" class="banner">
		<img src="<?php echo $_['SITE_URL']; ?>img/logo_sm.png" class="banner-small">
	</a>
		
	<div id="nav">	
		<nav>
			<ul>
				<li id="search-bar"><input type="text"><a href="#" class="search-icon"><i class="fa fa-search fw" aria-hidden="true"></i></a></li>
				<li>
					<a href="<?php echo $_['SITE_URL']; ?>shop">Shop</a>
					<ul class="menu">
						<li><a href="<?php echo $_['SITE_URL']; ?>shop/men">Men</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>shop/women">Women</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>shop/boys">Boys</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>shop/girls">Girls</a></li>
					</ul>
				</li>
				<li class="parent-menu">
					<a href="<?php echo $_['SITE_URL']; ?>cart">Cart 
						<span class="fa-stack fa-1x">
						  <i class="fa fa-shopping-cart fa-stack-1x"></i>
						  <strong class="fa-stack-1x cart-number"></strong>
						</span>
					</a>
					<ul class="menu">
						<li><a href="#" class="cart">No items.</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>cart/checkout">Checkout</a></li>
					</ul>
				</li>
				
				<li>
					<a href="<?php echo $_['SITE_URL']; ?>account">Account</a>
					
					<?php if ($_SESSION['id']) { // Menu to show if logged in ?>
					<ul class="menu">
						<li><a href="<?php echo $_['SITE_URL']; ?>account/orders">Orders</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>account/track">Track</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>account/wishlists">Wishlists</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>logout">Log out</a></li>
					</ul>					
					<?php } else { // Menu to show if not logged in ?>
					<ul class="menu">
						<li><a href="<?php echo $_['SITE_URL']; ?>login">Login</a></li>
						<li><a href="<?php echo $_['SITE_URL']; ?>register">Register</a></li>
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