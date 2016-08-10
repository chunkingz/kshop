
<?php

include("includes/db.php");
include("functions/functions.php");

//retrieving customer id that was passed from payment page
if(isset($_GET['c_id'])){

	$customer_id=$_GET['c_id']; //local variable to save a customer id
	$c_email ="select * from customers WHERE customer_id='$customer_id'";
	//sending email
	$run_email=mysqli_query($con,$c_email);
	$row_customer=mysqli_fetch_array($run_email);
	$customer_email=$row_customer['customer_email'];
	$customer_name=$row_customer['customer_name'];


	
}	
//getting products information/no. of items from cart

$ip_add = getRealIpAddress();



$total =0;


$select_price = "select * from cart where ip_add = '$ip_add'";

$run_price = mysqli_query($db, $select_price);

	$status='Pending';//initial status of a product

	$invoice_no = mt_rand();//generate random number

	$count_pro=mysqli_num_rows($run_price); //total products

	$i=0;

	$message="

	<html>
	<body>
	<p> 

	Hello  <b style='color:blue;'> $customer_name, </b> <br>

	Please find your order summary bellow. Please login to your account and make a payment for any pending orders. </p>

	<table width='600' align='center' bgcolor='FFCC99' border='2'>
	<tr> <h2> Your Order Summary.<br> 
	Invoice Number: $invoice_no </br></h2></tr>
	<tr>

	
	<th> Product Name </b> </th>
	<th> Quantity </b> </th>
	<th> Total Price </b> </th>
	
	</tr>
	

	";

	
	while($record=mysqli_fetch_array($run_price))
	{
		$product_id = $record['p_id'];
		$prod_price = "select * from products where product_id = '$product_id'";
		
		$run_product_price = mysqli_query($db, $prod_price);
		
		while($p_price=mysqli_fetch_array($run_product_price))
		{
			$product_name=$p_price['product_title'];
			$product_price = array($p_price['product_price']); //get product price from table column in DB
			$value = array_sum($product_price); // sum all the values
			$total += $value;
			$i++;
			
		}
		$message.="

		

		<tr>
		<td> $product_name </td>";
		
		
	//end of while
	//getting quantity form the cart
		$get_cart ="Select * from cart WHERE ip_add = '$ip_add'";
		$run_cart=mysqli_query($con,$get_cart);
		$get_qty= mysqli_fetch_array($run_cart);

	$qty=$get_qty['qty']; //saving qty from database to local variable

	if($qty==0)
	{
		//change the variable
		$qty=1;
		$sub_total =$total;
	}
	else
	{
		$qty=$qty;
		$sub_total=$total*$qty;
	}
	

	//if($run_order)
	//{
	
	echo "<script>window.open('my_account.php','_self')</script>";
		$empty_cart="delete from cart where ip_add='$ip_add'"; //empty the cart once the order has been submitted

		$run_empty=mysqli_query($con,$empty_cart);

		$insert_to_pending_order="insert into pending_orders(customer_id,invoice_no,product_id,qty,order_status) values('$customer_id','$invoice_no','$product_id','$qty','$status')";
		$run_pending_order=mysqli_query($con,$insert_to_pending_order);


		$message.="<td> $qty </td>
		<td> #$value </td>
		
		</tr>";
		
		
	}	

	$message.="
	<tr>
	<td> YOUR SUBTOTAL IS # $sub_total </td>
	</tr></table>
	
	<h3> Thank you for your order </h3>
	</body>

	</html>


	";



	//SENDING INVOICE TO CUSTOMER

	

//}
	$insert_order="insert into customer_orders(customer_id,due_amount,invoice_no,total_products,order_date,order_status) values('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
	$run_order = mysqli_query($con,$insert_order);
	echo "<script>alert('Order details sent!! $message') </script>";
	$subject = 'Your Order Details';

// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
	$headers .= 'To: echo $customer_email'. "\r\n";
	$headers .= 'From: admin@kshop.com';

// Mail it
	mail($customer_email, $subject, $message, $headers);


	
	?>

