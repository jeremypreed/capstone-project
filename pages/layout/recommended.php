<!-- Recommended -->
<section id="recommended">
	<div class="container">
		<h1><span>Recommended</span></h1><br>

<?php // Display 4 newest men's shirts
$result = $i->query($dbc, rand(0,3), -1, -1, 'price', 4, true);
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
<?php
}
?>
		
	</div>
</section>