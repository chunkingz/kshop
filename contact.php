<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>



<!DOCTYPE html>
<html lang="en">
<head> 
    
    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="scripts/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	 <link href="./css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    

    <link href="styles/custom.css" rel="stylesheet" type="text/css" />
    <script src="email/validation.js" type="text/javascript"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact Us | K-Shop</title>
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
								<li><a href="index.php">Home</a></li>
								<li><a href="all_products.php">All Products</a></li>
								<li><a href="customer/my_account.php">My Account</a></li>
								<li><a href="cart.php">Shopping Cart</a></li>
								<li><a href="contact.php" class="active">Contact Us</a></li>
								<li><a href="admin_area/login/login.php"><b>Admin Login</b></a></li>
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
									<h2>K-Shop
										 <br></h2>
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
				
				<div class="col-sm-20 padding-right">
				<?php
					//$ip = getRealIpAddress();
					//echo $ip;
				?>
					<div class="features_items"  id="products_box"><!--features_items start-->
						<h2 class="title text-center">Contact Form</h2>
							
						

										 <!-- a row has to be in a container -->
							<div class="container">	
							 <!-- Contacts -->
							 <div id="contacts">
							   <div class="row">	
								 <!-- Alignment -->
								<div class="col-sm-offset-2 col-sm-6">
								   <!-- Form itself -->
									<form   class="well" id="contactForm" action="" method="post" novalidate>
									 <div class="control-group">
												<div class="controls">
										<input type="text" class="form-control" placeholder="Full Name" name="name" required data-validation-required-message="Please enter your name" />
										  <p class="help-block"></p>
									   </div>
										 </div> 	
											<div class="control-group">
											  <div class="controls">
										<input type="email" class="form-control" placeholder="Email" name="email" required data-validation-required-message="Please enter your email" />
									</div>
									</div> 	<br>
										  
										   <div class="control-group">
											 <div class="controls">
											 <textarea rows="10" cols="100" class="form-control" placeholder="Message" name="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"></textarea>
									</div>
										   </div> 		 
									 <div id="success"> </div> <!-- For success/fail messages -->
									<button type="submit" name="sendMessage" class="btn btn-primary pull-right">Send</button><br />
								 </form>
						</div>
						  </div>
						</div>
					   </div>
							
							
							
							
							
							
							
							
		
							
						
					</div><!--features_items Ends-->
					

					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h3><span>K</span>-Shop</h3>
							<p>We provide the very best of consumer products all around the globe.</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Cliffs Of Moher</p>
								<h2>24 April 2015</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>St Patrick's Day</p>
								<h2>17 March 2015</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Map Of Nigeria</p>
								<h2>24 DEC 2015</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Fupre Campus</p>
								<h2>24 May 2015</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>K-Shop, A Product of Fortune - Fupre, Nigeria</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 K-Shop Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank">King Fortune</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/jqBootstrapValidation.js"></script>
 <script src="./js/contact_me.js"></script>
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>



<?php
//sending contact us to website admin..
if(isset($_POST['sendMessage']))
{
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }


$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'admin@kshop.com';
$email_subject = "Contact form submitted by:  $name";
$email_body = "You have received a new message. \n\n".
				  " Here are the details:\n \n Name: $name \n ".
				  "Email: $email_address\n Message \n $message";
$headers = "From: admin@kshop.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
echo "<script>alert('Thank you, your message has been sent')</script>";

return true;
}			
?>
