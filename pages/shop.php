<?php
$categories = array( // Array of departments
				'men', 		// 0
				'women', 	// 1
				'boys', 	// 2
				'girls'); 	// 3
				
$subcategories = array( // Array of subcategories in each department
				'shirts', 	// 0
				't-shirts', // 1
				'jeans'); 	// 2 
# Shop Content
if ($page[3]) { // Product selected
	include_once('pages/shop/product.php'); } // Product page
else if (in_array($page[2],$subcategories)&&!isset($page[3])) { // Subcategory selected but not product
	# List of products 
	include_once('pages/shop/product_list.php'); }
else if (in_array($page[1],$categories)&&!isset($page[2])) { // Category selected but not subcategory
	# List of subcategories
	include_once('pages/shop/subcategories.php'); }
else if ($page[0]&&!isset($page[1])) { // Shop selected but not category
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