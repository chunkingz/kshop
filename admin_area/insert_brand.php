<html>
<head>
<title>Insert Category </title>
</head>

<style type ="text/css">
 form{ margin:20%;}

</style>

<body>
	
	<form action="" method="post">
	<b> Insert New Brand </b> <input type = "text" name="brand_title" />
	<input type = "Submit" name="insert_brand" value="Insert" />
	</form>
	<?php
		include("includes/db.php");
		if(isset($_POST['insert_brand'])){ //button click-> postback request
			$brand_title = $_POST['brand_title'];
		
			if($brand_title!=""){
				$insert_brand = "INSERT INTO brands (brand_title) values ('$brand_title')";
				$run_brand = mysqli_query($con,$insert_brand);
			
				if($run_brand){ //true
					echo "<script>alert('New Brand has been inserted!')</script>";
				echo "<script>window.open('index.php?view_brands','_self')</script>";
				}//End of if
			}
			else{
				echo "<script>alert('Category name cannot be empty!')</script>";
			}
		}//End of postback here	
	?>
</body>
</html>