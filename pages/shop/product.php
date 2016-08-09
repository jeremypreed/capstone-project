<?php
include_once('sql/connect.php'); // Connect to DB
# Select row from DB matching product id
$sql = 'SELECT * FROM inventory 
		WHERE id = '.$page[3].'
		AND category = '.array_search($page[1],$categories).'
		AND subcategory = '.array_search($page[2],$subcategories).'
		LIMIT 1';
$query = mysqli_query($dbconnect,$sql);
# Store row from DB into variables
if ($query) {
	$row = mysqli_fetch_row($query); // Array of row data
	$product_id = $row[0]; // Product ID
	$product_name = $row[3]; // Product Name
	$product_description = $row[4]; // Product Description
	$product_price = $row[7]; // Product Price
	$product_discount = $row[8]; // Product Discount
}

if (!$product_id) {
	# Page not found 
	echo $MSG['NOT_FOUND']; }
else {
	# Product Information
	?>
	<div id="content" class="product-view">
		<section class="content-wrapper-3 container-fluid">	
			<div class="row">
				<div class="col-md-6 column text-center">
					<img src="http://placehold.it/375x600">
				</div>
				<div class="col-md-6 column">
					<p class="title"><?php echo $product_name ?></p>
					<p class="price"><span class="discount">$<?php echo $product_price; ?></span> $<?php echo round($product_price-($product_price*$product_discount), 2); ?></p>
					
					<select>
						<option disabled>Size</option>
						<option value="small">S</option>
						<option value="medium">M</option>
						<option value="large">L</option>
					</select>

					<select>
						<option disabled>Color</option>
						<option value="white">White</option>
						<option value="black">Black</option>
					</select>

					<p class="product-details-head">Product details</p>
					<div class="product-details">
						<p><?php echo $product_description; ?></p>
					</div>
					<button>Add to cart</button>
					<button>Add to wishlist</button>
				</div>
			</div>
		</section>
	</div>
	<?php
	include_once('pages/layout/recommended.php');
}