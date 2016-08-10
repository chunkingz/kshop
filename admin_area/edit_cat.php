<?php
//retrieving the relevant information before html is rendered
	include("includes/db.php");
		
	if(isset($_GET['edit_cat']))
	{ 
		//initial get request
		$cat_id = $_GET['edit_cat'];
		$edit_cat = "Select * from categories where cat_id='$cat_id'";
		$run_edit = mysqli_query($con,$edit_cat);
		$row_edit = mysqli_fetch_array($run_edit);
		$cat_edit_id = $row_edit['cat_id'];
		$cat_title = $row_edit['cat_title'];
				
	}//End of get request
?>
<html>
<head>
<title>Edit This Category </title>
</head>

<style type ="text/css">
 form{ margin:20%;}

</style>

<body>
	
	<form action="" method="post">
	<b> Edit this Category </b> 
	<input type = "text" name="cat_title" value="<?php echo $cat_title;?>"/>
	<input type = "Submit" name="update_cat" value="Update Category" />
	</form>
	
</body>
</html>
<?php
//The submit button will send the "postback" and the bellow code will execute in postback
	if(isset($_POST['cat_title']))
	{
		$cat_titleTemp=$_POST['cat_title'];
		$update_cat = "update categories SET cat_title='$cat_titleTemp' WHERE cat_id='$cat_edit_id'";
		$run_update = mysqli_query($con,$update_cat);
		
		if($run_update)
		{
			echo "<script>alert('Category has been Updated!')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}


?>