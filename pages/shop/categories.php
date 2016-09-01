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
					<li class="breadcrumb-item active">
						<?php echo $p[0]; ?>
					</li>
				</ol>
			
				<div class="row product-list">
					<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$p[0]; ?>/men">
						<div class="img">
							<img src="<?php echo $_['SITE_URL']; ?>img/shop/men.jpg" class="img-responsive">
							<span class="label img-responsive">Men</span>
						</div>
						</a>
					</div>
					<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$p[0]; ?>/women">
						<div class="img">
							<img src="<?php echo $_['SITE_URL']; ?>img/shop/women.jpg" class="img-responsive">
							<span class="label">Women</span>
						</div>
						</a>
					</div>
					<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$p[0]; ?>/boys">
						<div class="img">
							<img src="<?php echo $_['SITE_URL']; ?>img/shop/boys.jpg" class="img-responsive">
							<span class="label">Boys</span>
						</div>
						</a>
					</div>
					<div class="item col-md-3 col-sm-6 col-xs-12 text-center">
						<a href="<?php echo $_['SITE_URL'].$p[0]; ?>/girls">
						<div class="img">
							<img src="<?php echo $_['SITE_URL']; ?>img/shop/girls.jpg" class="img-responsive">
							<span class="label">Girls</span>
						</div>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
</div>