


<?php
	session_start();

 if (!isset($_SESSION["customer_email"]))
   {
      header("location: ../checkout.php");
   }
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
    <title>Home | K-Shop</title>
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
							<a href="../index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							
							<ul class="nav navbar-nav">
								
								
				<li><a href="../cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>

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
								<?php

								if(!isset($_SESSION['customer_email']))
								{
		
									echo "<b> Welcome Guest! </b>";
									
								}
								else
								{
									$userName = $_SESSION['customer_email'];
									echo "<b style='color: #fdb45e;'> Welcome:&nbsp;$userName! &nbsp;&nbsp;&nbsp;</b>";
									
								}
								?>

								
								<b style=" color: #fdb45e;">Shopping Cart:</b>
								<span>-Total Items: <?php itemsFromCart(); ?> - Total Price: #<?php getTotalPrice(); ?></span>
								

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
								<li><a href="../index.php">Home</a></li>
								<li><a href="../all_products.php">All Products</a></li>
								<li><a href="my_account.php"  class="active">My Account</a></li>
								<li><a href="../cart.php">Shopping Cart</a></li>
								<li><a href="../contact.php">Contact Us</a></li>
								<li><a href="../admin_area/login/login.php"><b>Admin Login</b></a></li>
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
									<h2>K Shop</h2>
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
									<h2>K Shop</h2>
									<p>Delivering the very best of consumer products around the world. Every one of our products gives you 100% satisfaction. </p>

								</div>
								<div class="col-sm-6">
									<img src="images/home/tablet.jpg" class="girl img-responsive" alt="" />

								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>K</span>-Shop</h1>
									<h2>K Shop</h2>
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
						<h2>My Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-products start-->
							<div class="category-tab ul li ">
								<ul class="nav nav-pills nav-stacked" id="categories">
									<?php
									 if(isset($_SESSION['customer_email']))
									 {
									 	$user_session=$_SESSION['customer_email'];
									 	$get_customer_pic = "select * from customers where customer_email='$user_session'";
									 	$run_customer=mysqli_query($con,$get_customer_pic);
									 	$row_customer = mysqli_fetch_array($run_customer);
									 	$customer_pic=$row_customer['customer_image'];

									 	echo "<img src='customer_photos/$customer_pic' width='255' height='180'>";

									 }	


									?>
									<li> <a href="my_account.php?my_orders">My Orders </a></li>
									<li> <a href="my_account.php?edit_account">Edit Account </a></li>
									<li> <a href="my_account.php?change_pass">Change Password </a></li>
									<li> <a href="my_account.php?delete_account">Delete Account </a></li>
									<li> <a href="../logout.php">Logout </a></li>
									<br>
									<br>
									<br>
									<br><br>
									<br><br>
									<br><br>
									<br>
								</ul>
							</div>
							
						</div><!--/category-products ends-->
					
						
						
						
						<div class="shipping text-center"><!--shipping stars-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping  Ends-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				<?php
					//$ip = getRealIpAddress();
					//echo $ip;
				?>
					<div class="features_items"  id="products_box"><!--features_items start-->
						<h2 class="title text-center">Your Account Information</h2>
							<h2 style="background:#000; color:#aaa; padding:20px; border-top:5px solid #666633; text-align:center;"> Manage your Account Here </h2>
							
							<?php 
								getDefault();
							?>

							<?php
							//THIS IS ALL FOR CUSTOMER ACCOUNT MANAGEMENT
							//THE PARAMETER WILL BE PASSED WHEN USER CLICKS THE LINK
							if(isset($_GET['my_orders']))
							{
								include("my_orders.php");
							}

							if(isset($_GET['edit_account']))
							{
								include("edit_account.php");
							}

							if(isset($_GET['change_pass']))
							{
								include("change_pass.php");
							}

							if(isset($_GET['delete_account']))
							{
								include("delete_account.php");
							}

							?>
							
						
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
