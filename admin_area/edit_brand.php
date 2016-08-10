<?php
//retrieving the relevant information before html is rendered
	include("includes/db.php");
		
	if(isset($_GET['edit_brand']))
	{ 
		//initial get request
		$brand_id = $_GET['edit_brand'];
		$edit_brand = "Select * from brands where brand_id='$brand_id'";
		$run_edit = mysqli_query($con,$edit_brand);
		$row_brand = mysqli_fetch_array($run_edit);
		$brand_edit_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
				
	}//End of get request
?>
<html>
<head>
<title>Edit This Brand </title>
</head>

<style type ="text/css">
 form{ margin:20%;}

</style>

<body>
	
	<form action="" method="post">
	<b> Edit this Brand </b> 
	<input type = "text" name="brand_title" value="<?php echo $brand_title;?>"/>
	<input type = "Submit" name="update_brand" value="Update Brand" />
	</form>
	
</body>
</html>
<?php
//The submit button will send the "postback" and the bellow code will execute in postback
	if(isset($_POST['update_brand']))
	{
		$brand_titleTemp=$_POST['brand_title'];
		$update_brand = "update brands SET brand_title='$brand_titleTemp' WHERE brand_id='$brand_edit_id'";
		$run_update = mysqli_query($con,$update_brand);
		
		if($run_update)
		{
			echo "<script>alert('Brand has been Updated!')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
	}


?>