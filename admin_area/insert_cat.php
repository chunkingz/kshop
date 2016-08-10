<html>
<head>
<title>Insert Category </title>
</head>

<style type ="text/css">
 form{ margin:20%;}

</style>

<body>
	
	<form action="" method="post">
	<b> Insert New Category </b> <input type = "text" name="cat_title" />
	<input type = "Submit" name="insert_cat" value="Insert" />
	</form>
	<?php
		include("includes/db.php");
		if(isset($_POST['insert_cat'])){ //button click-> postback request
			$cat_title = $_POST['cat_title'];
		
			if($cat_title!=""){
				$insert_category = "INSERT INTO categories (cat_title) values ('$cat_title')";
				$run_cat = mysqli_query($con,$insert_category);
			
				if($run_cat){ //true
					echo "<script>alert('New Category has been inserted!')</script>";
				echo "<script>window.open('index.php?view_cats','_self')</script>";
				}//End of if
			}
			else{
				echo "<script>alert('Category name cannot be empty!')</script>";
			}
		}//End of postback here	
	?>
</body>
</html>