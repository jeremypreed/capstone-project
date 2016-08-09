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
					<div class="item col-md-4 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$page[0].'/'.$page[1]; ?>/shirts">
						<div class="img">
							<img src="http://placehold.it/250x400" class="img-responsive">
							<span class="label">Shirts</span>
						</div>
						</a>
					</div>
					<div class="item col-md-4 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$page[0].'/'.$page[1]; ?>/t-shirts">
						<div class="img">
							<img src="http://placehold.it/250x400" class="img-responsive">
							<span class="label">T-Shirts</span>
						</div>
						</a>
					</div>
					<div class="item col-md-4 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$page[0].'/'.$page[1]; ?>/jeans">
						<div class="img">
							<img src="http://placehold.it/250x400" class="img-responsive">
							<span class="label">Jeans</span>
						</div>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>