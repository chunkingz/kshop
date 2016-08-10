<?php

@session_start(); //no error if it's not initialized
include("includes/db.php");


	
	//getting the customer id
	global $db;
	$c= $_SESSION['customer_email'];
	$get_c = "select * from customers where customer_email='$c'";

	$run_c=mysqli_query($db,$get_c);
	$row_c = mysqli_fetch_array($run_c);

	$customer_id=$row_c['customer_id'];
?>



<table width="780" align="center" bgcolor="#6699FF">
	<tr> 
		<th> Order No </th>
		<th> Due Amount</th>
		<th> Invoice Number</th>
		<th> Total Products </th>
		<th> Order Date</th>
		<th> Paid/Unpaid</th>
		<th> Status</th>

	</tr>

	<?php
	$get_orders="select * from customer_orders where customer_id='$customer_id'";
	$run_orders=mysqli_query($con,$get_orders);
	$i=0;
	while ($row_orders=mysqli_fetch_array($run_orders)) {
		
		$order_id=$row_orders['order_id'];
		$due_amount=$row_orders['due_amount'];
		$invoice_no=$row_orders['invoice_no'];

		$total_products=$row_orders['total_products'];

		$date=$row_orders['order_date'];
		$Status=$row_orders['order_status'];
		$i++;

		if($Status=='Pending')
		{
			$Status='Unpaid';
		}
		else
		{
			$Status='Paid';
		}
		echo "
		<tr align='center'>
			<td> $i </td>
			<td> #$due_amount </td>
			<td> $invoice_no </td>
			<td> $total_products </td>
			<td> $date </td>
			<td> $Status </td>
			<td> <a href='confirm.php?order_id=$order_id' target='_blank'> Confirm if Paid  </td>

		";
	}

	?>

</table>

