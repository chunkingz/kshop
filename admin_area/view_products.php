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
			if(isset($_GET['view_products'])) { ?>
			
				<table class="tg">
				  <tr>
					<th class="tg-s6z2" colspan="10">Products Description</th>
				  </tr>
				  <tr>
					<td class="tg-vn4c">Product ID   	</td>
					<td class="tg-vn4c">Title            </td>
					<td class="tg-vn4c">Image            </td>
					<td class="tg-vn4c">Price            </td>
					<td class="tg-vn4c">Total Sold       </td>
					<td class="tg-vn4c">Total Pending       </td>
					<td class="tg-vn4c">Status           </td>
					<td class="tg-vn4c">Edit             </td>
					<td class="tg-vn4c">Delete           </td>
				  </tr>
				  
				  
				  <!--Retrieving data from php script here...-->
				  
				  <?php
					//database connection
					include("includes/db.php");
					$i=0;
					$get_pro = "select * from products";
					//sql querry to retrive the data 
					$run_pro = mysqli_query($con,$get_pro);
					
					while($row_pro = mysqli_fetch_array($run_pro))
					{
						$p_id = $row_pro['product_id'];
						$p_title = $row_pro['product_title'];
						
						$p_img = $row_pro['product_img1'];
						$p_price = $row_pro['product_price'];
						$status = $row_pro['status'];
						
						$i++; // this is for numbering the product id starting with 1+
						//whatever data comes in from this loop, they are assigned to the table columns bellow
		
				  ?>  <!-- This is the closing tag for php. We read all the data from php but OUR WHILE LOOP HAS NOT BEEN YET ENDED...-->
				  
				  <tr>
					<td> <?php echo $i; ?> </td>
					<td> <?php echo $p_title; ?></td>
					<td> <img src="product_images/<?php echo $p_img;?>" width="50" height="50" </td>
					<td> <?php echo $p_price;?> </td>
					<td>
						<?php
						//total order of this product
						$get_sold = "select * from pending_orders where product_id='$p_id' AND order_status='completed'";
						$run_sold = mysqli_query($con,$get_sold);
						$count = mysqli_num_rows($run_sold);
						echo $count;
						?>
					</td>
					<td>
						<?php
						//total order of this product
						$get_sold = "select * from pending_orders where product_id='$p_id' AND order_status='Pending'";
						$run_sold = mysqli_query($con,$get_sold);
						$count = mysqli_num_rows($run_sold);
						echo $count;
						?>

					</td>
					<td> <?php echo $status; ?></td>
					<td> <a href="index.php?edit_pro=<?php echo $p_id;?>"> Edit </a> </td>
					<td>  <a href="delete_pro.php?delete_pro=<?php echo $p_id;?>"> Delete </a> </td>
				 </tr>
				  <?php } ?> <!--  CLOSING THE } OF WHILE LOOP HERE... WE HAVE SUCCESSFULLY POPULATED THE VALUES-->
				  
				</table>
			<?php } ?>
	</body>

</html>