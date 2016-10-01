<section id="header"<?php if($p[0]!=='home'){ echo(' class="normal"'); } ?>>
	<a href="<?php echo $_['SITE_URL']; ?>home">
		<img src="<?php echo $_['SITE_URL']; ?>img/logo.png" class="banner">
		<img src="<?php echo $_['SITE_URL']; ?>img/logo_sm.png" class="banner-small">
	</a>
		
	<div id="nav">	
		<nav>
			<ul>
				<li id="search-bar"><input type="search" name="search"><a href="#" class="search-icon"><i class="fa fa-search fw" aria-hidden="true"></i></a></li>
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
					
					<?php if ($_SESSION['id']) { // Menu to show if logged in ?>
					<ul class="menu">
						<?php
						$c->summary($dbc);
						if ($c->total_quantity) { ?>
						<li class="cart">
							<a href="<?php echo $_['SITE_URL']; ?>cart" class="cart"><?php echo '<strong>Total: $'.cash($c->discount_subtotal).'</strong>'; ?></a>
						</li>
						<li class="cart">
							<a href="<?php echo $_['SITE_URL']; ?>cart" class="cart"><?php echo '<strong>'.$c->total_quantity.' item(s)</strong>'; ?></a>
						</li>
						<li class="cart">
							<a href="<?php echo $_['SITE_URL']; ?>cart" class="cart"><?php echo 'You save <strong>$'.$c->savings.'</strong>'; ?></a>
						</li>
						<li class="checkout-logout">
							<a href="<?php echo $_['SITE_URL']; ?>checkout">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Checkout</a>
						</li><?php
						} else { ?>
						<li class="cart empty">
							<a href="#">Your cart is empty</a>
						</li><?php
						} ?>
					</ul>
					<?php } ?>
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
							<a href="<?php echo $_['SITE_URL']; ?>account/wishlist">
							<i class="fa fa-angle-right fa-lg fw"></i> &nbsp; Wishlist</a>
						</li>
						<li class="checkout-logout">
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

	<?php if($p[0]=='home'){ // Show carousel if on home page ?>	
	<carousel></carousel>
	<?php } else { // Show shopping info if not home page ?>
	<div id="nav-info">
		<ul>
			<li><?php echo mysqli_num_rows($i->query($dbc)).' products'; ?></li>
			<?php 
			if ($c->total_quantity) {
				echo '<li><strong>Total:</strong> $'.cash($c->discount_subtotal).'</li>';
			} else {
				echo '<li>Your cart is empty.</li>';
			}
			// If logged in show users name. If not, show guest.
			if ($_SESSION['id']){ echo "<li>".$_SESSION['first_name']." ".$_SESSION['last_name']."</li>"; } else { echo "<li>Guest</li>"; } ?>
		</ul>
	</div>
	<?php } ?>
</section>