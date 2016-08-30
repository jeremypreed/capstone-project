<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">
				<?php include_once('pages/layout/shop-panel.php') ?>
			</div>
			<div class="col-md-9 main-content">
			
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<?php echo '<a href="'.$_["SITE_URL"].'home">'.$_["SITE_TITLE"].'</a>'; ?>
					</li>
					<li class="breadcrumb-item">
						<?php echo '<a href="'.$_["SITE_URL"].$page[0].'">'.$page[0].'</a>'; ?>
					</li>
					<li class="breadcrumb-item active">
						<?php echo str_replace('%20',' ',$page[1]); ?>
					</li>
				</ol>
				
				<div class="row">		
				
<?php
if ($page[1]==''){
	echo $MSG['SEARCH_EMPTY'];
} else {
	$result = $i->search($dbc,str_replace('%20',' ',$page[1]));
}
if (mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_row($result)){
		$i->columns($row);
	# Display Product	?>
	<div class="item col-md-4 col-sm-6 col-xs-12 text-center">
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
} else {
	# No results
	echo $MSG['NO_RESULTS'];
} ?>
				</div>
			</div>
		</div>
	</section>
</div>