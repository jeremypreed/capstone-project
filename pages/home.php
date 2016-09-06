<!-- Home Page -->
<div id="content">
	<section class="content-wrapper-1">
		<div class="container">
			<h1><span>New Arrivals</span></h1><br>
			<div class="row">	
<?php // Display 4 newest men's shirts
$result = $i->query($dbc, -1, -1, -1, 'id', 4, true);
while ($row = mysqli_fetch_row($result)){
	$i->columns($row);
# Display Product	?>
<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
	<a href="<?php echo $_['SITE_URL'].'shop/'.$i->category.'/'.$i->subcategory.'/'.$i->id; ?>">
		<div class="img">
			<img src="<?php echo $_['SITE_URL'].$i->image; ?>" class="img-responsive">
			<div class="info">
				<span class="title"><?php echo $i->name; ?></span><br>
				<?php
				if ($i->discount>0){
					echo '<span class="discount" title="'.$i->percent_off.' off">$'.$i->price.'</span>
					<span class="price-red">$'.$i->discount_price.'</span>';
				} else {
					echo '<span class="price">$'.$i->price.'</span>';			
				}
				?>
			</div>
		</div>
	</a>
</div>				
<?php # End Display Product
}
?>
			</div>
		</div>
	</section>
	<!-- Most Popular -->
	<section class="content-wrapper-2">
		<div class="container">
			<h1><span>Most Popular</span></h1><br>
			<div class="row">	
<?php // Display 4 most bought 
$result = $i->query($dbc, -1, -1, -1, 'price', 4, true);
while ($row = mysqli_fetch_row($result)){
	$i->columns($row);
# Display Product	?>
<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
	<a href="<?php echo $_['SITE_URL'].'shop/'.$i->category.'/'.$i->subcategory.'/'.$i->id; ?>">
		<div class="img">
			<img src="<?php echo $_['SITE_URL'].$i->image; ?>" class="img-responsive">
			<div class="info">
				<span class="title"><?php echo $i->name; ?></span><br>
				<?php
				if ($i->discount>0){
					echo '<span class="discount" title="'.$i->percent_off.' off">$'.$i->price.'</span>
					<span class="price-red">$'.$i->discount_price.'</span>';
				} else {
					echo '<span class="price">$'.$i->price.'</span>';			
				}
				?>
			</div>
		</div>
	</a>
</div>				
<?php # End Display Product
}
?>
			</div>
		</div>
	</section>
	<!-- On Sale -->
	<section class="content-wrapper-1">
		<div class="container text-justify">
			<h1><span>On Sale</span></h1><br>
			<div class="row">
<?php // Display 4 best discounts
$result = $i->query($dbc, -1, -1, -1, discount, 4, true);
while ($row = mysqli_fetch_row($result)){
	$i->columns($row);
# Display Product	?>
<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
	<a href="<?php echo $_['SITE_URL'].'shop/'.$i->category.'/'.$i->subcategory.'/'.$i->id; ?>">
		<div class="img">
			<img src="<?php echo $_['SITE_URL'].$i->image; ?>" class="img-responsive">
			<div class="info">
				<span class="title"><?php echo $i->name; ?></span><br>
				<?php
				if ($i->discount>0){
					echo '<span class="discount" title="'.$i->percent_off.' off">$'.$i->price.'</span>
					<span class="price-red">$'.$i->discount_price.'</span>';
				} else {
					echo '<span class="price">$'.$i->price.'</span>';			
				}
				?>
			</div>
		</div>
	</a>
</div>				
<?php # End Display Product
}
?>
			</div>
		</div>
	</section>
</div>