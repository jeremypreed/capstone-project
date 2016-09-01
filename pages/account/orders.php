<?php			
# Select payments matching user id
$payment_sql = 'SELECT * FROM payments WHERE user_id = '.$_SESSION['id'];
$result = mysqli_query($dbc, $payment_sql);
?>
<h2>Order History</h2>
<?php 
if (!mysqli_num_rows($result)>0){?>
	<div class="row">
	<div class="col-md-12 info-row">You have no orders.</div>	
</div><?php
} else {
	echo mysqli_num_rows($result).' order(s) found.<hr>';
	while ($row = mysqli_fetch_row($result)){
		echo '<strong>Transaction #:</strong> '.$row[3].'<br><strong>Amount:</strong> $'.$row[1].'<br><strong>Date:</strong> '.$row[4].'<hr>';
	}
}
