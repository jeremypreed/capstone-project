<?php			
# Select payments matching user id
$payment_sql = 'SELECT * FROM payments WHERE user_id = '.$_SESSION['id'].' ORDER BY id DESC';
$result = mysqli_query($dbc, $payment_sql);
?>
<h2>Order History</h2><?php 
if (!mysqli_num_rows($result)>0){
	# No Orders Found ?> 
<div class="row">
	<div class="col-md-12 info-row">You have no orders.</div>	
</div><?php
} else {
	# Orders Found
	echo mysqli_num_rows($result).' order(s) found.<hr>';
	while ($row = mysqli_fetch_row($result)){
		$order 	= '<strong>Transaction #:</strong> '.$row[3].'<br>';
		$order .= '<strong>Amount:</strong> $'.$row[1].'<br>';
		$order .= '<strong>Date:</strong> '.date('F jS, Y', strtotime($row[4])).'<hr>';
		echo $order;
	}
}

