<!-- Account Panel -->

<?php 
// Show if logged in
if ($_SESSION['id']){ ?>
<br>
<ul>
	<li class="name"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></li>
	<li><strong>0</strong> Reward Points</li>
</ul>
<hr>
<h3>My Account</h3>
<ul class="fa-ul">
<?php 
if ($page[1]=="profile") {
	// Profile Current Page
	echo '<li class="current-page"><i class="fa-li fa fa-angle-right"></i>Profile</li>'; } else {
	// Profile link
	echo '<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/account/profile">Profile</a></li>'; }
if ($page[0]=="cart") {
	// Cart Current Page
	echo '<li class="current-page"><i class="fa-li fa fa-angle-right"></i>Shopping Cart</li>'; } else {
	// Cart link
	echo '<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/cart">Shopping Cart</a></li>'; }
if ($page[1]=="orders") {
	// Order History Current Page
	echo '<li class="current-page"><i class="fa-li fa fa-angle-right"></i>Order History</li>'; } else {
	// Order History link
	echo '<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/account/orders">Order History</a></li>'; }
if ($page[1]=="track") {
	// Track Package Current Page
	echo '<li class="current-page"><i class="fa-li fa fa-angle-right"></i>Track Package</li>'; } else {
	// Track Package link
	echo '<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/account/track">Track Package</a></li>'; }
if ($page[1]=="wishlists") {
	// Wishlists Current Page
	echo '<li class="current-page"><i class="fa-li fa fa-angle-right"></i>Manage Wishlists</li>'; } else {
	// Wishlists link
	echo '<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/account/wishlists">Manage Wishlists</a></li>'; } ?>
	<li><i class="fa-li fa fa-angle-right"></i><a href="http://localhost/ecommerce/logout">Log out</a></li>
</ul>
<?php
	// Show if not logged in
	} else { ?>
<h3>Account Panel</h3>
<p><a href="http://localhost/ecommerce/register">Register</a> to save your cart, manage wishlists, and more.</p>
<p><a href="http://localhost/ecommerce/login">Log in</a>, if you already have an account.</p>
<?php } ?>