<?php
if (!$_GET['tx']){
	echo 'Order details not found.';
} else {
	if (!$_GET['amt']){
		echo 'Incorrect order details.';
	} else {
		$amount = $_GET['amt'];
		$trx_id = $_GET['tx'];
		$result = $c->query($dbc);
		while ($row = mysqli_fetch_row($result)){
			$c->columns($row);
			# Insert order into orders table
			$order_sql = "INSERT INTO 
					orders (product_id, quantity, user_id, trx_id) 
					values ('$c->product_id', '$c->quantity', '$_SESSION[id]', '$trx_id')";
			$order_query = mysqli_query($dbc, $order_sql);
			# Remove from cart
			$sql = 'DELETE FROM cart 
					WHERE id = '.$c->id.'
					AND user_id = '.$_SESSION['id'];
			$remove_query = mysqli_query($dbc,$sql);
		}
		# Insert payment into payments table
		$payment_sql = "INSERT INTO 
				payments (amount, user_id, trx_id) 
				values ('$amount', '$_SESSION[id]', '$trx_id')";
		$payment_query = mysqli_query($dbc, $payment_sql);
		# Calculate Reward Points
		$reward_points = $_SESSION['reward_points'];
		$reward_points += number_format((float)$amount/10, 0, '.', '')*100;
		$_SESSION['reward_points'] = $reward_points;
		# Insert reward pts into customer table
		$reward_sql = 'UPDATE customers 
				SET reward_points = '.$reward_points.'
				WHERE id = '.$_SESSION['id'];
		$reward_query = mysqli_query($dbc, $reward_sql);
# Order Confirmation ?>
<div id="content">
	<section class="content-wrapper-3 container-fluid">	
		<div class="row">
			<div class="col-md-12 main-content">	
				<div class="container-fluid">
					<h2>Order Confirmation</h2>
					<p><?php echo $_SESSION['first_name']; ?>, Your payment has been processed successfully.</p>
					<p><?php echo '<strong>Transaction #:</strong> '.$trx_id; ?></p>
					<p><?php echo '<strong>Amount:</strong> $'.$amount; ?></p>
				</div>
			</div>
		</div>
	</section>
</div><?php
	}
}