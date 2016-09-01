<?php
class Inventory {
	
	public $categories = array( // Array of departments
				'men', 		// 0
				'women', 	// 1
				'boys', 	// 2
				'girls'); 	// 3
				
	public $subcategories = array( // Array of subcategories in each department
				'shirts', 	// 0
				't-shirts', // 1
				'jeans', 	// 2
				'blouses',	// 3
				'shoes');	// 4
	
	public $where = '',$parameters = array();
	
	function __construct(){}
	
	# Count rows retrieved from query
	public function countRows($dbc ,$c,$sc){
		return mysqli_num_rows($this->query($dbc,$c,$sc));
	}
	
	# Query inventory by category,subcatgegory,id 
	# 1: DB Connection (required), 2: Category, 3: Subcategory, 4: Order By, 5: Limit, 6: Descending true/false 
	function query($dbc,$c=-1,$sc=-1,$id=-1,$order='id',$limit=false,$desc=false){ 
	
		if (is_string($c)){ // Change category to corresponding index
			$c = array_search($c,$this->categories);
		}
		if (is_string($sc)){ // Change subcategory to corresponding index
			$sc = array_search($sc,$this->subcategories);
		}
		
		# Category
		switch ($c) {
			case -1:
				break;
			default:
				$parameters[] = 'category = '.$c;
				break;
		}

		# Subcategory
		switch ($sc) {
			case -1:
				break;
			default:
				$parameters[] = 'subcategory = '.$sc;
				break;
		}

		# ID
		switch ($id) {
			case -1:
				break;
			default:
				$parameters[] = 'id = '.$id;
				break;
		}
		
		# Build Where
		if (count($parameters)>0) { 
			$where = ' WHERE '. implode(' AND ',$parameters); 
		}
		
		# Order
		$order = ' ORDER BY '.$order;
		
		# Descending
		switch ($desc) {
			case false:
				$desc = '';
				break;
			default:
				$desc = ' DESC';
				break;
		}
		
		# Limit
		switch ($limit) {
			case false:
				$limit = '';
				break;
			default:
				$limit = ' LIMIT '.$limit;
				break;
		}
		
		# Select row from DB matching criteria
		$sql = 'SELECT * FROM inventory'.$where.$order.$desc.$limit;
		return mysqli_query($dbc,$sql);
	}
	
	function search($dbc,$search){
		$sql = 'SELECT * FROM inventory WHERE name LIKE "%'.$search.'%" or color LIKE "%'.$search.'%"';
		return mysqli_query($dbc,$sql);
	}
	
	# Fetch and name each column from row 
	public function columns($row) {
		$this->id = $row[0]; // Product ID
		$this->category = $this->categories[$row[1]]; // Product Category
		$this->subcategory = $this->subcategories[$row[2]]; // Product Subcategory
		$this->name = $row[3]; // Product Name
		$this->description = $row[4]; // Product Description
		$this->size = $row[5]; // Product Size
		$this->color = $row[6]; // Product Color
		$this->price = $row[7]; // Product Price
		$this->discount = $row[8]; // Product Discount
		$this->image = $row[9]; // Product Image 
		$this->percent_off = round($this->discount * 100).'%'; // Percentage off
		$this->discount_price = number_format((float)$this->price-($this->price*$this->discount), 2, '.', ''); // Price /w discount
		$this->amount_off = number_format((float)$this->price-$this->discount_price, 2, '.', ''); // Amount off
	}
}