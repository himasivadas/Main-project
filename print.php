<?php
include('includes/config.php');
$orderId = $_POST['id'];
$sql = "SELECT , orderDate FROM orders WHERE id = $orderId";

$orderResult = $con->query($sql);
$orderData = $orderResult->fetch_array();

$quantity = $orderData[0];
$orderDate = $orderData[1];
$orderItemSql = "SELECT  products.productName, products.productPrice, 	products., products.shippingCharge,
users.name FROM ordertrackhistory
	INNER JOIN products ON ge,
users.name FROM ordertrackhistory.orderId= products.id 
 WHERE ordertrackhistory.orderId	 = $orderId";
$orderItemResult = $con->query($orderItemSql);
$table = '
 <table border="1" cellspacing="0" cellpadding="20" width="100%">
	<thead>
		<tr >
			<th colspan="5">

			<center>
				Order Date : '.$orderDate.'
				<center>Client Name : '.$clientName.'</center>
				Contact : '.$clientContact.'
			</center>		
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody>
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[4].'</th>
				<th>'.$row[1].'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr>
			<th></th>
		</tr>

		<tr>
			<th></th>
		</tr>

		<tr>
			<th>Sub Amount</th>
			<th>'.$subTotal.'</th>			
		</tr>

		<tr>
			<th>VAT (13%)</th>
			<th>'.$vat.'</th>			
		</tr>

		<tr>
			<th>Total Amount</th>
			<th>'.$totalAmount.'</th>			
		</tr>	

		<tr>
			<th>Discount</th>
			<th>'.$discount.'</th>			
		</tr>

		<tr>
			<th>Grand Total</th>
			<th>'.$grandTotal.'</th>			
		</tr>

		<tr>
			<th>Paid Amount</th>
			<th>'.$paid.'</th>			
		</tr>

		<tr>
			<th>Due Amount</th>
			<th>'.$due.'</th>			
		</tr>
	</tbody>
</table>
 ';


$connect->close();

echo $table;