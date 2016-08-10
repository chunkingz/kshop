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
<html>
<head>
<title>K-Shop</title>
<link rel="stylesheet" type="text/css" href="styles/global.css" />
<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
<script src="scripts/jquery-1.11.1.min.js"></script>
<script src="scripts/general.js"></script>
</head>

<body>

	<div id="header">
		<div class="logo"><a href="#">K-<span>Shop</span></a></div>
	</div>

	<a class="mobile" href="#">MENU</a>

	<div id="container">
		<div class="sidebar">
			<ul id="nav">
				<li><a class="selected" href="#">Dashboard</a></li>
				<!--  Get request  sending the url variables get request-->
				<li><a href="index.php?insert_product">Insert New Product</a></li>
				<li><a href="index.php?insert_cat">Insert New Category</a></li>
				<li><a href="index.php?insert_brand">Insert New Brand</a></li>
				
				<li><a href="index.php?view_products">View All Products</a></li>
				<li><a href="index.php?view_cats">View All Categories</a></li>
				<li><a href="index.php?view_brands">View All Brand</a></li>
				<li><a href="index.php?view_customers">View Customers</a></li>
				<li><a href="index.php?view_orders">View Orders</a></li>
				
				<li><a href="index.php?view_orders?view_payments">View Payments</a></li>
				<li><a href="#">Pending Orders</a></li>
				<li><a href="logout.php">Admin Logout</a></li>
			</ul>
			
		</div>
		
		<div class="content">
		
			<h1>Dashboard</h1>
			
			
			
						<?php include ("includes/db.php");
		
								if(isset($_GET['insert_product']))
								{
								// if the get request was insert product 
								
									include("insert_products.php");
								}
						?>
				
			</p>
			


		</div>
	</div>

	</body>
</html>
<?php } //if session is activated.. closing else of top else block ?>