<?php
session_start();
include("includes/db.php");

	if (isset($_GET['order_id']))
	{
		$order_id=$_GET['order_id'];
	}

?>
<html>

	<head>
	</head>

	<body bgcolor="#000000" >

		<?php
			if (isset($_GET['update_id']))
				{
					$order_id=$_GET['update_id'];
				}
				

		?>
		<form action="confirm.php?update_id=<?php echo $order_id ?>" method="post">

			//checking if update id is present
			<?php
			if (isset($_GET['update_id']))
				{
					$order_id=$_GET['update_id'];
				}
				

		?>
			<table width="500" align="center" border="2" bgcolor="#CCCCCC">
			<tr align="center">
				<td colspan="5" ><h2> Please confrim your payment</h2></td>
			</tr>

			<tr>
				<td>Invoice Number: </td>
				<td> <input type="text" required name="invoice_no" /> </td>
			</tr>	

			<tr>
				<td>Amount: </td>
				<td> <input type="text" required name="amount" /> </td>
			</tr>
			<tr>
				<td>Select Payment  Option: </td>
				<td> <select required name="payment_method">
					<option>Select Payment</option>
					<option>Bank Transfer</option>
					<option>Paypal</option>
					<option>Western Union</option>
				</select>

				 </td>
			</tr>

			<tr>
				<td>Transaction/ReferenceID: </td>
				<td> <input type="text" required name="ref_no" /> </td>
			</tr>

			

			<tr>
				<td>Payment Date:</td>
				<td> <input type="text" required name="date" /> </td>
			</tr>


			
			<tr align="center">
				<td colspan="5"> <input type="submit" name="confirm" value="Confirm Payment"/> </td>
			</tr>
		</table>

		</form>
	</body>
<html>
<?php
if(isset($_POST['confirm']))
{
	$update_id=$_GET['update_id'];
	$invoice=$_POST['invoice_no'];
	$amount=$_POST['amount'];
	$payment_method=$_POST['payment_method'];
	$ref_no=$_POST['ref_no'];
	$date=$_POST['date'];
	$complete ="completed";
	//$update_id=


	$invoice_check="select * from customer_orders WHERE order_id='$order_id'";
	$run_invoice_check=mysqli_query($con,$invoice_check);
	$run_invoice_row=mysqli_fetch_array($run_invoice_check);
	$database_invoice_number=$run_invoice_row['invoice_no'];

	
	if($database_invoice_number==$invoice)
	{

		$insert_payment="INSERT into payments(invoice_no,amount,payment_mode,ref_no,payment_date) values('$invoice','$amount','$payment_method',
		'$ref_no','$date')";

		$run_payment=mysqli_query($con,$insert_payment);

		
		

		$update_order = "UPDATE customer_orders SET order_status='$complete' where order_id='$order_id'";

		$run_order=mysqli_query($con,$update_order);
		


		//$update_pending_order = "UPDATE pending_orders SET order_status='$complete' where invoice_no='$invoice'";
		//$run_pending_order=mysqli_query($con,$update_pending_order);
	
	
	


		if($run_payment)
		{
			echo "<script>alert('Thank you, Order will be processed within 24 hours!!')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
		
			$update_pending_order = "UPDATE pending_orders SET order_status='$complete' where invoice_no='$invoice'";
			$run_pending_order=mysqli_query($con,$update_pending_order);
			

		}
	}
	
	else
	{
		echo "<script>alert('Invalid invoice number. Please check your invoice number by clicking MY ORDERS in your account')</script>";
	}
	
	
		
	
}

?>
