
<?php
session_start();
if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login/login.php,'_self')</script>";
}

else
{


?>




<?php
include ("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Insert New Product</title>
	
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>
		tinymce.init({selector:'textarea'});
	</script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   
</head><!--/head-->

<body>
			
			<form method="post" action="insert_products.php" enctype="multipart/form-data">
								<table  width="700" align="center" border="1" bgcolor="#00FF00">
	
									
									<tr>
										<td align="right"><b>Product Title</b></td>
										<td><input type="text" name="product_title" size="40"/></td>
									</tr>
									
		
									<tr>
										<td align="right"><b>Product Category</b></td>
										<td>
											<select name="product_cat">
												<option size="40">Select a Category</option>
												
												<?php
												
													$sel_category = "select * from categories";
													$run_category = mysqli_query($con, $sel_category);
												
													while($row_category = mysqli_fetch_array($run_category)){
														$cat_id= $row_category['cat_id'];
														$cat_title= $row_category['cat_title'];
														
														echo "<option value='$cat_id'>$cat_title</option>";
													}
													
												?>
											</select>
										</td>
									</tr>
		
									<tr>
										<td align="right"><b>Product Brand</b></td>
										<td>
											<select name="product_brand">
												<option>Select a Brand</option>
												
												<?php
												
													$sel_brands = "select * from brands";
													$run_brands = mysqli_query($con, $sel_brands );
												
													while($row_brands = mysqli_fetch_array($run_brands)){
														$brand_id= $row_brands['brand_id'];
														$brand_title= $row_brands['brand_title'];
														
														echo "<option value='$brand_id'>$brand_title</option>";
													}
													
												?>
											</select>
										</td>
									</tr>
		
									<tr>
										<td align="right"><b>Product Image 1</b></td>
										<td><input type="file" name="product_img1"/></td>
									</tr>
									
									<tr>
										<td align="right"><b>Product Image 2</b></td>
										<td><input type="file" name="product_img2"/></td>
									</tr>
									
									<tr>
										<td align="right"><b>Product Image 3</b></td>
										<td><input type="file" name="product_img3"/></td>
									</tr>
									
									<tr>
										<td align="right"><b>Product Price</b></td>
										<td><input type="text" name="product_price" size="40"/></td>
									</tr>
									
									<tr>
										<td align="right"><b>Product Descrition</b></td>
										<td><textarea name="product_desc" cols="41" rows="5"></textarea></td>
									</tr>
									
									<tr>
										<td align="right"><b>Product Keywords</b></td>
										<td><input type="text" name="product_keywords" size="40"/></td>
									</tr>
									
									<tr align="center">
										<td colspan="2"><input type="submit" name="insert_products" value="Insert Product" /></td>
									</tr>
	
	
								</table>

							</form>
			
							
					
					
				
			
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php
	
	if(isset($_POST['insert_products']))
	{
		// text data variables
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$status = 'on';
		$product_keywords = $_POST['product_keywords'];
		
		// image names
		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];
		
		//Image temp names
		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];
		
				if($product_title =='' OR $product_cat=='' OR $product_desc =='' OR $product_keywords=='' OR $product_img1=='' OR $product_price=='' OR $product_brand==''){
					
					echo "<script>alert('Please fill all the fields!')</script>";
					exit();
				}
				else
				{
					//uploading images to its folder
						move_uploaded_file($temp_name1,"product_images/$product_img1");
						move_uploaded_file($temp_name2,"product_images/$product_img2");
						move_uploaded_file($temp_name3,"product_images/$product_img3");
						
					$insert_products = "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,					product_price,product_desc,status)values('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";
					
					$run_product = mysqli_query($con, $insert_products);
					
					if($run_product)
					{
						echo "<script>alert('Product Insert Successful!!')</script>";
					
					}
					else
					{
						echo "<script>alert('Product could not be added!')</script>";
					}
					
					
				}//else
				
	}//if post


?>
<?php } //if session is activated.. closing else of top else block ?>