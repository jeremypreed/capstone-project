<?php
class Cart {
	
	public $cart = [];

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
				# not logged in. create cookie
				$this->cart = array('id' => $product_id,
									'quantity' => 1);
				if (setcookie($_['SITE_SH'].'cart', $cart)){
					echo "added to cart via cookie";
				}
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
				# not logged in. update cookie

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
				# not logged in. update cookie

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
			echo "Added to cart";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error;
		}
	}
	
	function remove($dbc,$cid,$uid){
		$sql = 'DELETE FROM cart 
				WHERE id = '.$cid.'
				AND user_id = '.$uid;

		if (mysqli_query($dbc,$sql)) {
			echo "Removed from cart";
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
			echo "Updated cart";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error;
		}		
	}	
}