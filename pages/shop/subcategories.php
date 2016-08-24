<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">
				<?php include_once('pages/layout/shop-panel.php') ?>
			</div>
			<div class="col-md-9 main-content">
			
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo $_['SITE_URL']; ?>home">Clothing Website</a>
					</li>
					<li class="breadcrumb-item">
						<a href="<?php echo $_['SITE_URL'].$page[0]; ?>"><?php echo $page[0]; ?></a>
					</li>
					<li class="breadcrumb-item active">
						<?php echo $page[1]; ?>
					</li>
				</ol>
			
				<div class="row product-list">
					<?php
					$sc = count($i->subcategories);
					for ($x=0; $x<=$sc; $x++){
						$result = $i->query($dbc, $page[1], $x, -1, 'id', 1, true);
						while ($row = mysqli_fetch_row($result)){
							$i->columns($row);
							if ($i->id){
								# Subcategory Link ?>
								<div class="item col-md-4 col-sm-6 col-xs-12 text-center">
									<a href="<?php echo $_['SITE_URL'].$page[0].'/'.$page[1].'/'.$i->subcategory; ?>">
									<div class="img">
										<img src="<?php echo $_['SITE_URL'].$i->image; ?>" class="img-responsive">
										<span class="label"><?php echo $i->subcategory; ?></span>
									</div>
									</a>
								</div>
								<?php
							}
						}
					} ?>
				</div>
			</div>
		</div>
	</section>
</div>