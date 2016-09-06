<?php				
# Shop Content
if ($p[3]) { // Product selected
	include_once('pages/shop/product.php'); } // Product page
else if (in_array($p[2],$i->subcategories)&&!isset($p[3])) { // Subcategory selected but not product
	# List of products 
	include_once('pages/shop/product_list.php'); }
else if (in_array($p[1],$i->categories)&&!isset($p[2])) { // Category selected but not subcategory
	# List of subcategories
	include_once('pages/shop/subcategories.php'); }
else if ($p[0]&&!isset($p[1])) { // Shop selected but not category
	# Shop front page
	include_once('pages/shop/categories.php'); }
else { 
	# Page not found ?>
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-3 column panel-content">
				<?php include_once('layout/shop-panel.php') ?>
			</div>
			<div class="col-md-9 main-content">
				<?php echo $MSG['NOT_FOUND']; ?>
			</div>
		</div>
	</section>
</div>
<?php }