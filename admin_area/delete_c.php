<?php 
include("includes/db.php");
	//when admin clicks delete, the product id is passed / stored in a get variable
	// we can use this variable to delete the product with that specific ID
	if(isset($_GET['delete_c'])){
		$delete_id = $_GET['delete_c'];
		$delete_c = "DELETE FROM customers WHERE customer_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_c);
		
		if($run_delete){
			echo "<script>alert('Customer  has been deleted!')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";
		}
	}
?>