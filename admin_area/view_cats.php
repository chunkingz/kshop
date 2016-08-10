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
			if(isset($_GET['view_cats'])) { ?>
			
				<table class="tg">
				  <tr>
					<th class="tg-s6z2" colspan="8">Categories Description</th>
				  </tr>
				  <tr>
					<td class="tg-vn4c">Category ID   	</td>
					<td class="tg-vn4c">Title            </td>
					<td class="tg-vn4c">Edit            </td>
					<td class="tg-vn4c">Delete            </td>
					
				  </tr>
				  
				  
				  <!--Retrieving data from php script here...-->
				  
				  <?php
					//database connection
					include("includes/db.php");
					$i=0;
					$get_cats = "select * from categories";
					//sql querry to retrive the data 
					$run_cats = mysqli_query($con,$get_cats);
					
					while($row_cats = mysqli_fetch_array($run_cats))
					{
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
						
						
						
						$i++; // this is for numbering the product id starting with 1+
						//whatever data comes in from this loop, they are assigned to the table columns bellow
		
				  ?>  <!-- This is the closing tag for php. We read all the data from php but OUR WHILE LOOP HAS NOT BEEN YET ENDED...-->
				  
				  <tr>
					<td> <?php echo $cat_id; ?> </td>
					<td> <?php echo $cat_title; ?></td>
					
					
					
					<td> <a href="index.php?edit_cat=<?php echo $cat_id;?>"> Edit </a> </td>
					<td> <a href="index.php?delete_cat=<?php echo $cat_id;?>"> Delete </a> </td>
				 </tr>
				  <?php } ?> <!--  CLOSING THE } OF WHILE LOOP HERE... WE HAVE SUCCESSFULLY POPULATED THE VALUES-->
				  
				</table>
			<?php } ?>
	</body>

</html>