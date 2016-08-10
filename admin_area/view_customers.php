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
			if(isset($_GET['view_customers'])) { ?>
			
				<table class="tg">
				  <tr>
					<th class="tg-s6z2" colspan="8">View All Customers</th>
				  </tr>
				  <tr>
					<td class="tg-vn4c">ID   	</td>
					<td class="tg-vn4c">Name            </td>
					<td class="tg-vn4c">Email            </td>
					<td class="tg-vn4c">Image            </td>
					<td class="tg-vn4c">Country            </td>
					
				
					<td class="tg-vn4c">Delete           </td>
				  </tr>
				  
				  
				  <!--Retrieving data from php script here...-->
				  
				  <?php
					//database connection
					include("includes/db.php");
					$i=0;
					$get_pro = "select * from customers";
					//sql querry to retrive the data 
					$run_pro = mysqli_query($con,$get_pro);
					
					while($row_pro = mysqli_fetch_array($run_pro))
					{
						$c_id = $row_pro['customer_id'];
						$c_name = $row_pro['customer_name'];
						
						$c_email = $row_pro['customer_email'];
						$c_image = $row_pro['customer_image'];
						$c_country=$row_pro['customer_country'];
						
						
						$i++; // this is for numbering the product id starting with 1+
						//whatever data comes in from this loop, they are assigned to the table columns bellow
		
				 	
				  ?>  <!-- This is the closing tag for php. We read all the data from php but OUR WHILE LOOP HAS NOT BEEN YET ENDED...-->
				 <tr align="center">
				 <td><?php echo $c_id;?> </td>
				 <td><?php echo $c_name;?> </td>
				 <td><?php echo $c_email;?> </td>

				  <td> <img src="../customer/customer_photos/<?php echo $c_image;?>" width="70" height="70" </td>
				  <td> <?php echo $c_country;?> </td>
				  <td> <a href="delete_c.php?delete_c=<?php echo $c_id;?>"> Delete </a> </td>
				 

				  <?php } ?> <!--  CLOSING THE } OF WHILE LOOP HERE... WE HAVE SUCCESSFULLY POPULATED THE VALUES-->
				  
				</table>
			</tr>
			<?php } ?>
	</body>

</html>