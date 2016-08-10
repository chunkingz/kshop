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
			if(isset($_GET['view_payments'])) { ?>
			
				<table class="tg">
				  <tr>
					<th class="tg-s6z2" colspan="8">View All Payments</th>
				  </tr>
				  <tr>
					<td class="tg-vn4c">Payment ID 	</td>
					<td class="tg-vn4c">Invoice Number           </td>
					<td class="tg-vn4c">Amount            </td>
					<td class="tg-vn4c">Payment Method          </td>
					<td class="tg-vn4c">Reference No.            </td>
					
					<td class="tg-vn4c">Date            </td>
					

					
				  </tr>
				  
				  
				  <!--Retrieving data from php script here...-->
				  
				  <?php
					//database connection
					include("includes/db.php");
					$i=0;
					$get_payments = "select * from payments";
					//sql querry to retrive the data 
					$run_payments = mysqli_query($con,$get_payments);
					
					
					
					while($row_payments = mysqli_fetch_array($run_payments))
					{
						$payment_id = $row_payments['payment_id'];
						
						$invoice = $row_payments['invoice_no'];
						$amount = $row_payments['amount'];
						$payment_m=$row_payments['payment_mode'];
						
						$ref_no=$row_payments['ref_no'];
						
						$date=$row_payments['payment_date'];
						
						
						$i++; // this is for numbering the product id starting with 1+
						//whatever data comes in from this loop, they are assigned to the table columns bellow
		
				 	
				  ?>  <!-- This is the closing tag for php. We read all the data from php but OUR WHILE LOOP HAS NOT BEEN YET ENDED...-->
				 <tr align="center">

				 	<td><?php echo $payment_id;?> </td>
				 
				 <td bgcolor="FFCCCC"><?php echo $invoice;?> </td>
				 
				 <td><?php echo $amount;?> </td>
				  <td><?php echo $payment_m;?> </td>
				  <td><?php echo $ref_no;?> </td>
				 
				 <td><?php echo $date;?> </td>
				 

				 
				 
				  
				
				 

				  <?php } ?> <!--  CLOSING THE } OF WHILE LOOP HERE... WE HAVE SUCCESSFULLY POPULATED THE VALUES-->
				  
				</table>
			</tr>
			
			<?php } ?>
	</body>

</html>