<?php
class Cart {
	
	public $tax_rate = .0925, $cart = [];
	function __construct($dbc){
		# if add is set, add to cart
		if (isset($_POST['add'])){
			# add set. add to cart
			$product_id = $_POST['product_id']; // set id to var
			
			if ($_SESSION[id]){
				# check if product already in cart
				$result = $this->checkCart($dbc, $product_id, $_SESSION['id']);
				$row = mysqli_fetch_row($result);
				if ($row[1]==$product_id){
					# already in cart. update quantity
					$this->update($dbc,$row[0],$row[2]+1,$_SESSION['id']);
				} else {
					# not in cart. add product to db
					$this->add($dbc,$product_id,$_SESSION['id']);					
				}
			} else {
				# not logged in. added to local storage
				alert('Added item to your cart.');
			}
		}
		
		# if remove is set, remove from cart
		if (isset($_POST['remove'])){
			# remove set. remove from cart
			$cart_id = $_POST['cart_id']; // set id to var
			
			if ($_SESSION[id]){
				# logged in. add product to db
				$this->remove($dbc,$cart_id,$_SESSION['id']);
			} else {
				# not logged in. removed from local storage
				alert('Removed item from your cart.');
			}			
		}
		
		# if remove is set, remove from cart
		if (isset($_POST['update'])){
			# remove set. remove from cart
			$cart_id = $_POST['cart_id']; // set id to var
			$quantity = $_POST['quantity']; // set id to var
			
			if ($_SESSION[id]){
				# logged in. add product to db
				$this->update($dbc,$cart_id,$quantity,$_SESSION['id']);
			} else {
				# not logged in. updated local storage
				alert('Your cart has been updated.');
			}			
		}
	}
	
	function query($dbc){ 
		$sql = 'SELECT * FROM cart WHERE user_id = '.$_SESSION['id'];
		return mysqli_query($dbc,$sql);
	}
	
	function checkCart($dbc, $pid, $uid){
		$sql = 'SELECT * FROM cart WHERE product_id = '.$pid.' AND user_id = '.$uid;
		return mysqli_query($dbc,$sql);		
	}
	
	function add($dbc,$pid,$uid){
		$sql = "INSERT INTO cart (product_id, quantity, user_id)
				VALUES ($pid, 1, $uid)";
		if (mysqli_query($dbc,$sql)) {
			alert('Added item to your cart.');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error;
		}
	}
	
	function remove($dbc,$cid,$uid){
		$sql = 'DELETE FROM cart 
				WHERE id = '.$cid.'
				AND user_id = '.$uid;
		if (mysqli_query($dbc,$sql)) {
			alert('Removed item from your cart.');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error;
		}		
	}
	
	function update($dbc,$cid,$q,$uid){
		$sql = 'UPDATE cart 
				SET quantity='.$q.'
				WHERE id = '.$cid.'
				AND user_id = '.$uid;
		if (mysqli_query($dbc,$sql)) {
			alert('Your cart has been updated.');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error;
		}		
	}
	# Fetch and name each column from row 
	public function columns($row) {
		$this->id = $row[0]; // Product ID
		$this->product_id = $row[1]; // Product ID
		$this->quantity = $row[2]; // Quantity
		$this->user_id = $row[3]; // User ID
	}	
	
	public function summary($dbc){
		$result = $this->query($dbc);
		if ($result){
			$i = new Inventory();
			$this->subtotal = $this->discount_subtotal = $this->savings = $this->total_quantity = 0;
			while ($row = mysqli_fetch_row($result)){
				$this->columns($row);
				$product_r = $i->query($dbc,-1, -1, $this->product_id); // Query DB for row
				$i->columns(mysqli_fetch_row($product_r)); // Fetch Column
				$this->subtotal += cash($i->price*$this->quantity);
				$this->discount_subtotal += cash($i->discount_price*$this->quantity);
				$this->savings += cash($i->amount_off*$this->quantity);
				$this->total_quantity += cash(1*$this->quantity);
			}
			$this->total();
		}
	}
	
	public function tax($subtotal){
		return cash($subtotal*$this->tax_rate);
	}
	
	public function total(){
		# Calculate Actual Total
		$this->actual_total = $this->discount_subtotal;
		if ($this->actual_total>0) {
			$this->actual_total += $_SESSION['shipping_price'];
			$this->actual_total += cash($this->tax($this->discount_subtotal));
		}
		$_SESSION['purchase_total'] = cash($this->actual_total);	
	}
}