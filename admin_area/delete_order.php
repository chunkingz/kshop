<?php 
include("includes/db.php");
	//when admin clicks delete, the product id is passed / stored in a get variable
	// we can use this variable to delete the product with that specific ID
	if(isset($_GET['delete_order'])){
		$delete_id = $_GET['delete_order'];
		$delete_order = "DELETE FROM pending_orders WHERE order_id='$delete_id'";
		$run_delete = mysqli_query($con,$delete_order);
		
		if($run_delete){
			echo "<script>alert('Order  has been deleted!')</script>";
			echo "<script>window.open('index.php?view_orders','_self')</script>";
		}
	}
?>