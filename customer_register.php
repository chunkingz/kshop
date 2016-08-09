<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | K-Shop</title>
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
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2349039933771 </a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> kingstonfortune@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="http://www.fb.com/kingston.fortune2"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://www.twitter.com/@chun__king"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://www.linkedin.com/kingstonfortune"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="http://www.dribbble.com/kingstonfortune"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="http://plus.google.com/kingstonfortune"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo1.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							
							<ul class="nav navbar-nav">
								
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php

								if(!isset($_SESSION['customer_email']))
								{
									//echo "<a href='checkout.php'> Login</a>";
									echo "<li><a href='checkout.php'><i class='fa fa-lock'></i> Login</a></li>";
								}
								else
								{
									
									echo "<li><a href='logout.php'><i class='fa fa-lock'></i> Logout</a></li>";
								}
								?>
								
								
							</ul>
						</div>
					</div>
								<?php
									cart();
								?>
								<b>Welcome Guest!></b>
								<b style=" color: #fdb45e;">Shopping Cart:</b>
								<span>-Total Items: <?php itemsFromCart(); ?> - Total Price: #<?php getTotalPrice(); ?></span>	
								

								?>
								


				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="all_products.php">All Products</a></li>
								<li><a href="Accounts.php">My Account</a></li>
								<li><a href="ShoppingCart.php">Shopping Cart</a></li>
								<li><a href="contact.php">Contact Us</a></li>
								<li><a href="admin_area/insert_products.php">Admin Login</a></li>
							</ul>
						</div>
					</div>
					<!--Search Box starts-->
					<div>
						
							<form method="get" action="results.php" enctype="multipart/form-data">
							<input type="text" name="user_query" placeholder="Search a Product"/>
							<input type="submit" name="search" value="Search"/>
							</form>
						
					</div>
					<!--Search Box ends-->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>K</span>-Shop</h1>
									<h2>K-Shop</h2>
									<p>Delivering the very best of consumer products around the world. Every one of our products gives you 100% satisfaction.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/videocam.jpg" class="girl img-responsive" alt="" />

								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>K</span>-Shop</h1>
									<h2>K-Shop</h2>
									<p>Delivering the very best of consumer products around the world. Every one of our products gives you 100% satisfaction. </p>

								</div>
								<div class="col-sm-6">
									<img src="images/home/tablet.jpg" class="girl img-responsive" alt="" />

								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>K</span>-Shop</h1>
									<h2>K-Shop</h2>
									<p>Delivering the very best of consumer products around the world. Every one of our products gives you 100% satisfaction.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/smarttv.jpg" class="girl img-responsive" alt="" />
									<
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>

					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categories</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products start-->
							<div class="category-tab ul li ">
								<ul class="nav nav-pills nav-stacked" id="categories">
									<?php getCategories(); ?>
								</ul>
							</div>
							
						</div><!--/category-products ends-->
					
						<div class="brands_products"><!--brands_products start-->
							<h2>Brands</h2>
							<div class="category-tab ul li ">
								<ul class="nav nav-pills nav-stacked" id="brands">
									<?php getBrands(); 
						
						?>
								</ul>
							</div>
						</div><!--/brands_products Ends-->
						
						
						
						<div class="shipping text-center"><!--shipping stars-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping  Ends-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">

				<form action="customer_register.php" method="post" enctype="multipart/form-data"/>

				<table  width ="750" align="center">

						<tr>
							<td> <h2> Create an Account </h2> </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Name: </b> </td>
							<td> <input type="text" name="customer_name" required />  </td>
						</tr>
							
						<tr>
							<td align="right"><b>Customer Email: </b> </td>
							<td> <input type="text" name="customer_email" required />  </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Password: </b> </td>
							<td> <input type="password" name="customer_pass" required />  </td>
						</tr>

                                                 <tr>
							<td align="right"><b>Confirm Password: </b> </td>
							<td> <input type="password" name="customer_pass_confirm" required />  </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Country: </b> </td>
							<td> 

							 <select name="customer_country">
							 	<option> Select a Country</option>
							 	<option> Nigeria </option>
							 	<option> United Kingdom </option>
							 	<option> United States </option>
							 	<option> China </option>
							 	<option> India </option>
							 	<option> France </option>
							 </select>

							</td>
						</tr>

						<tr>
							<td align="right"><b>Customer city: </b> </td>
							<td> <input type="text" name="customer_city" required />  </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Mobile no: </b> </td>
							<td> <input type="text" name="customer_contact" required />  </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Address: </b> </td>
							<td> <input type="text" name="customer_address" required />  </td>
						</tr>

						<tr>
							<td align="right"><b>Customer Image: </b> </td>
							<td> <input type="file" name="customer_image" required />  </td>
						</tr>

						<tr align="center"> 
							<td colspan="10"> <input type="submit" name="register" value="Submit" /> </td>
						</tr>
					</form>

						
					</div><!--features_items Ends-->
					

					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<?php

	if(isset($_POST['register']))
	{

                 
		

		$customer_pass = $_POST['customer_pass'];
                $customer_pass_confirm = $_POST['customer_pass_confirm'];

                if($customer_pass==$customer_pass_confirm)
               {

                $customer_name = $_POST['customer_name'];
		$customer_email = $_POST['customer_email'];
		$customer_country = $_POST['customer_country'];
		$customer_city = $_POST['customer_city'];
		$customer_contact = $_POST['customer_contact'];
		$customer_address= $_POST['customer_address'];

		$customer_image = $_FILES['customer_image']['name'];

		$customer_image_temp = $_FILES['customer_image']['tmp_name'];

		$customer_ip = getRealIpAddress();

		$insert_customer = "insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) 
		values ('$customer_name','$customer_email','$customer_pass','$customer_country','$customer_city','$customer_contact','$customer_address','$customer_image','$customer_ip')";

		$run_customer = mysqli_query($con,$insert_customer);
		//uploading a customer photo
		move_uploaded_file($customer_image_temp, "customer/customer_photos/$customer_image");

		//checking if this user have anything in the cart if yes we will redirect to payment page
		$sel_cart = "select * from cart where ip_add='$customer_ip'";

		$run_cart = mysqli_query($con,$sel_cart);
		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart>0)
		{
			//create a session
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Account has been created') </script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
		else
		{
			$_SESSION['customer_email'] = $customer_email;
			echo "<script>alert('Account has been created') </script>";
			echo "<script>window.open('index.php','_self')</script>";

		}
	}//end of password checking
else
{
echo "<script>alert('Password did not match') </script>";
}
   }


?>