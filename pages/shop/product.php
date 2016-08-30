<?php
# Find ID in DB
$result = $i->query($dbc,$page[1], $page[2], $page[3], 'id', 1); // Query DB for row
$i->columns(mysqli_fetch_row($result)); // Fetch Column

if (!$i->id) {
	# Page not found 
	echo $MSG['NOT_FOUND']; }
else {
	# Product Information
	?>
	<div id="content" class="product-view">
		<section class="content-wrapper-3 container-fluid">	
			<div class="row">
				<div class="col-md-6 column text-center product-img">
					<img src="<?php echo $_['SITE_URL'].$i->image; ?>">
				</div>
				<div class="col-md-6 column">
					<p class="title"><?php echo $i->name ?></p>
					<p class="info">
					<?php
					if ($i->discount>0){
						echo '<span class="discount" title="'.$i->percent_off.' off">$'.$i->price.'</span>
						<span class="price-red">$'.$i->discount_price.'</span>';
					} else {
						echo '<span class="price">$'.$i->price.'</span>';			
					}
					?>
					</p>
					
					<select>
						<option disabled>Size</option>
						<option><?php echo $i->size; ?></option>
					</select>

					<select>
						<option disabled>Color</option>
						<option><?php echo $i->color; ?></option>
					</select>

					<p class="product-details-head">Product details</p>
					<div class="product-details">
						<p><?php echo $i->description; ?></p>
					</div>
					<form method="post" action="#">
						<input type="hidden" name="product_id" value="<?php echo $i->id; ?>" />
						<?php
						if ($_SESSION['id']){
						?>
						<button type="submit" name="add">Add to cart</button>
						<button>Add to wishlist</button>
						<?php
						} else {
							echo $MSG['LOGIN'].$MSG['LOGIN_TOADD'];
						}
						?>
					</form>
				</div>
			</div>
		</section>
	</div>
	<?php
	include_once('pages/layout/recommended.php');
}