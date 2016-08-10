<html>
 <head>
 </head>
	<body>
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
		.tg td{font-family:Arial, sans-serif;font-size:17px;padding:10px 30px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;background-color:#e8edff;}
		.tg th{font-family:Arial, sans-serif;font-size:17px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
		.tg .tg-0ord{text-align:right}
		.tg .tg-ifyx{background-color:#D2E4FC;text-align:right}
		.tg .tg-s6z2{text-align:center}
		.tg .tg-vn4c{background-color:#D2E4FC}
		</style>
		
		<?php
			if(isset($_GET['view_orders'])) { ?>
			
				<table class="tg">
				  <tr>
					<th class="tg-s6z2" colspan="8">View All Customers Orders</th>
				  </tr>
				  <tr>
					<td class="tg-vn4c">Order No  	</td>
					<td class="tg-vn4c">Customer Email           </td>
					<td class="tg-vn4c">Invoice No.            </td>
					<td class="tg-vn4c">Product ID            </td>
					<td class="tg-vn4c">Quantity            </td>
					<td class="tg-vn4c">Status            </td>
					

					<td class="tg-vn4c">Delete           </td>
				  </tr>
				  
				  
				  <!--Retrieving data from php script here...-->
				  
				  <?php
					//database connection
					include("includes/db.php");
					$i=0;
					$get_orders = "select * from pending_orders";
					//sql querry to retrive the data 
					$run_orders = mysqli_query($con,$get_orders);
					
					
					
					while($row_orders = mysqli_fetch_array($run_orders))
					{
						$order_id = $row_orders['order_id'];
						$c_id = $row_orders['customer_id'];
						
						$invoice = $row_orders['invoice_no'];
						$p_id = $row_orders['product_id'];
						$qty=$row_orders['qty'];
						
						$status=$row_orders['order_status'];
						
						
						$i++; // this is for numbering the product id starting with 1+
						//whatever data comes in from this loop, they are assigned to the table columns bellow
		
				 	
				  ?>  <!-- This is the closing tag for php. We read all the data from php but OUR WHILE LOOP HAS NOT BEEN YET ENDED...-->
				 <tr align="center">
				 	<?php
				 	$get_customer="select * from customers where customer_id='$c_id'";
				 	$run_customer=mysqli_query($con,$get_customer);
				 	$row_customer=mysqli_fetch_array($run_customer);
				 	$customer_email = $row_customer['customer_email'];
				 	?>
				 <td><?php echo $i;?> </td>
				  <td><?php echo $customer_email;?> </td>
				 <td><?php echo $invoice;?> </td>
				 
				 <td><?php echo $p_id;?> </td>
				  <td><?php echo $qty;?> </td>
				 <td><?php 
					if($status=='Pending')
					{
						$status='Pending';
					}
					else if($status=='Complete')
					{
						$status='Complete';
					}
					
				 
				 
				 echo $status;?> </td>
				 
				  
				  <td> <a href="delete_order.php?delete_order=<?php echo $order_id;?>"> Delete </a> </td>
				 

				  <?php } ?> <!--  CLOSING THE } OF WHILE LOOP HERE... WE HAVE SUCCESSFULLY POPULATED THE VALUES-->
				  
				</table>
			</tr>
			
			<?php } ?>
	</body>

</html>