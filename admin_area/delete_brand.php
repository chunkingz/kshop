<?php 
include("includes/db.php");
	//when admin clicks delete, the product id is passed / stored in a get variable
	// we can use this variable to delete the product with that specific ID
	if(isset($_GET['delete_brand'])){
		$delete_id = $_GET['delete_brand']; // this is the key that containing the value of a specific brand_id
		
		$delete_brand = "DELETE FROM brands WHERE brand_id='$delete_id'";
		
		$run_delete = mysqli_query($con,$delete_brand);
		
		if($run_delete){
			echo "<script>alert('One Brand has been deleted!')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
	}
?>