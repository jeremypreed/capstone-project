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
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>shop/men">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Men</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>shop/women">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Women</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>shop/boys">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Boys</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>shop/girls">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Girls</a>
						</li>
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
						<li>
							<a href="#" class="cart">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; No items.</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>cart/checkout">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Checkout</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="<?php echo $_['SITE_URL']; ?>account/profile">Account</a>
					
					<?php if ($_SESSION['id']) { // Menu to show if logged in ?>
					<ul class="menu">
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>account/orders">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Orders</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>account/track">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Track</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>account/wishlists">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Wishlists</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>logout">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Log out</a>
						</li>
					</ul>					
					<?php } else { // Menu to show if not logged in ?>
					<ul class="menu">
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>login">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Login</a>
						</li>
						<li>
							<a href="<?php echo $_['SITE_URL']; ?>register">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Register</a>
						</li>
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
		<div class="tabs">
			<a href="#" data-tab="1"></a>
			<a href="#" data-tab="2"></a>
			<a href="#" data-tab="3"></a>
			<a href="#" data-tab="4"></a>
		</div>
		
		<div class="content text-left" data-tab="1">
			<span><strong>Hundreds</strong> of shirts in stock!</span><br>
			<span><i>Shop</i> til you <i>drop!</i></span>
		</div>
		
		<div class="content text-center" data-tab="2">
			<span><strong>Summer Collection!</strong></span><br>
			<span>Buy a T-Shirt</span><br>
			<span><i>Made with <strong>100%</strong> cotton</i></span>
		</div>
		
		<div class="content text-right" data-tab="3">
			<span><strong>Fantastic, Great Stuff!</strong></span><br>
			<span>Everything is <strong>high</strong> quality.</span><br>
		</div>
		
		<div class="content text-center" data-tab="4">
			<span><strong>Jeans Jubilee!</strong></span><br>
			<span>Take <strong>20% off</strong> all jeans.</span><br>
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