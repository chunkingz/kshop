<?php
include ("includes/db.php");

if(isset($_GET['edit_pro']))
{
	// here we are retrieving the information for "ONE / Specific "
	//Product so we can modify its details
	$edit_id = $_GET['edit_pro'];
	
	$get_edit = "select * from products where product_id = '$edit_id'";
	$run_edit = mysqli_query($con,$get_edit);
	$row_edit = mysqli_fetch_array($run_edit);
	$update_id = $row_edit['product_id'];
	
	$p_title = $row_edit['product_title'];
	$cat_id = $row_edit['cat_id'];
	$brand_id = $row_edit['brand_id'];
	
	$p_image1 = $row_edit['product_img1'];
	$p_image2 = $row_edit['product_img2'];
	$p_image3 = $row_edit['product_img3'];
	
	$p_price = $row_edit['product_price'];
	
	$p_desc = $row_edit['product_desc'];
	$p_keyords = $row_edit['product_keywords'];
}
	
	//getting brand information for specific product
	$get_cat = "select * from categories where cat_id='$cat_id'";
	$run_cat = mysqli_query($con,$get_cat);
	$cat_row = mysqli_fetch_array($run_cat);
	$cat_edit_title= $cat_row['cat_title'];
	
	//getting brand information for specific product
	$get_brand ="select * from brands where brand_id='$brand_id'";
	$run_brand = mysqli_query($con,$get_brand);
	$brand_row = mysqli_fetch_array($run_brand);
	$brand_edit_title= $brand_row['brand_title'];

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Update or Edit Product</title>
	
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
			
	<form method="post" action="" enctype="multipart/form-data">
		<table  width="700" align="center" border="1" bgcolor="#00FF00">

			
			<tr>
				<td align="right"><b>Product Title</b></td>
				<td><input type="text" name="product_title" size="40" value="<?php echo $p_title; ?>"/>	 </td>
			</tr>
			

			<tr>
				<td align="right"><b>Product Category</b></td>
				<td>
					<select name="product_cat">
						<option size="40" value="<?php echo $cat_id; ?>"> <?php echo $cat_edit_title;?> </option>
						
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
						
						<option value="<?php echo $brand_id; ?>"> <?php echo $brand_edit_title;?></option>
						
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
				<td><input type="file" name="product_img1" /> 
				<img src = "product_images/<?php echo $p_image1; ?>" width="80" height="80"/> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image 2</b></td>
				<td><input type="file" name="product_img2"/>
				<img src = "product_images/<?php echo $p_image2; ?>" width="80" height="80"/> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Image 3</b></td>
				<td><input type="file" name="product_img3"/>
				<img src = "product_images/<?php echo $p_image3; ?>" width="80" height="80"/> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Price</b>  </td>
				<td><input type="text" name="product_price" value="<?php echo $p_price; ?>" /> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Descrition</b></td>
				<td><textarea name="product_desc" cols="41" rows="5"><?php echo $p_desc; ?></textarea> </td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Keywords</b></td>
				<td><input type="text" name="product_keywords" size="40" value="<?php echo $p_keyords; ?>"/></td>
			</tr>
			
			<tr align="center">
				<td colspan="2"><input type="submit" name="update_product" value="Update Product" /></td>
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
	
	if(isset($_POST['update_product']))
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
		
		//the image1,  user must upload atleast one image when uploading the the product.
		//$product_img1=$p_image1;
		
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
						
					$update_product = "Update products set cat_id='$product_cat',brand_id='$product_brand',date='NOW()',product_title='$product_title',product_img1='$product_img1',
					product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',
					product_desc='$product_desc',product_keywords='$product_keywords' WHERE product_id = '$update_id'";
					
					
					$run_update = mysqli_query($con, $update_product);
					
					if($run_update)
					{
						echo "<script>alert('Product updated Successful!!')</script>";
					
						
						//once the product has been successfully updated we are redirecting to the product page.
						echo "<script>window.open('index.php?view_products','_self')</script>";
					
					}
					else
					{
						echo "<script>alert('Product could not be added!')</script>";
					}
					
					
				}//else
				
	}//if post


?>
