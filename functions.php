<?php

//establishing the connection
$db=mysqli_connect("31.220.17.87","kshop007_admin","doyoulikeCHEESE00977$","kshop");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//getting IP Address
function getRealIpAddress()
{
	if(!empty($_SERVER['HTTP_CLIENT_IP']))		// check ip from share internet
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))	//check if IP is passed from  proxy
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	return $ip;
}

// creating a script for cart
function cart()
{
	//This function is called when you click add to cart...
	if(isset($_GET['add_cart']))
	{
		global $db;
		$p_id = $_GET['add_cart'];
		$ip_add = getRealIpAddress();
		
		
		
		$check_product = "select * from cart where ip_add = '$ip_add' AND p_id ='$p_id'";
		
		$run_check = mysqli_query($db, $check_product);

		
		echo "<script>alert('product repeated  $curr_qty')</script>";

		if(mysqli_num_rows($run_check) > 0)
		{
			//echo "";
			///$insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";

		}
		else
		{
			$ip_add = getRealIpAddress();
			echo "<script>alert('$ip_add')</script>";
			
			$query = "insert into cart (p_id, ip_add) values ('$p_id ','getRealIpAddress()')";
			
			$run_query = mysqli_query($db, $query);
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}// outer if
}

// get number of items from cart
function itemsFromCart()
{
	if(!isset($_GET['add_cat']))
	{
		global $db;
		
		$ip_add = getRealIpAddress();
		$get_items = "select * from cart where ip_add = '$ip_add'";
		
		$run_items = mysqli_query($db, $get_items);
		$count_items =  mysqli_num_rows($run_items);
	}
	else
	{
		global $db;
		$ip_add = getRealIpAddress();
		$get_items = "select * from cart where ip_add = '$ip_add'";
		
		$run_items = mysqli_query($db, $get_items);
		$count_items =  mysqli_num_rows($run_items);
	}
	
	echo $count_items;
}

//get total price for items in cart
function getTotalPrice()
{
	$ip_add = getRealIpAddress();
	
	global $db;
	
	$total =0;
	
	
	$select_price = "select * from cart where ip_add = '$ip_add'";
	
	$run_price = mysqli_query($db, $select_price);
	
	while($record=mysqli_fetch_array($run_price))
	{
		$product_id = $record['p_id'];
		$prod_price = "select * from products where product_id = '$product_id'";
		
		$run_product_price = mysqli_query($db, $prod_price);
		
		while($p_price=mysqli_fetch_array($run_product_price))
		{
			$product_price = array($p_price['product_price']); //get product price from table column in DB
			$value = array_sum($product_price); // sum all the values
			$total += $value;
		}
		
	}
	echo $total;
}
//This is what user sees when they go to their account// default look

//get products to display
function getPro()
{
	global $db;
	
	if(!isset($_GET['cat'])){
		
		if(!isset($_GET['brand'])){
			
			$get_products = "select * from products order by rand() LIMIT 0,6";
			$run_products = mysqli_query($db, $get_products);
			
			while($row_products= mysqli_fetch_array($run_products))
			{
				$pro_id = $row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_cat = $row_products['cat_id'];
				$pro_brand = $row_products['brand_id'];
				$pro_desc = $row_products['product_desc'];
				$pro_price = $row_products['product_price'];
				$pro_image = $row_products['product_img1'];
				
				echo "
				<div id='single_product'>
				<h3>$pro_title</h3>
				
				<img src='admin_area/product_images/$pro_image' width='160' height='160'/><br>
				<p><b>Price: #$pro_price</b></p>
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
				
				</div>	
				
				";
						}//while					
		}//inner if
		
	}//if
}

//get category products
function getCatPro()
{
	global $db;
	
	if(isset($_GET['cat'])){
		
						$cat_id = $_GET['cat']; //getting and assigning cat id from database
						$get_cat_pro = "select * from products where cat_id ='$cat_id'";
						
						$run_cat_pro = mysqli_query($db, $get_cat_pro);
						
						$count = mysqli_num_rows($run_cat_pro);
						if($count==0)
						{
							echo "<h1>No Products found in this category!</h1>";
						}
						
						while($row_cat_pro= mysqli_fetch_array($run_cat_pro))
						{
							$pro_id = $row_cat_pro['product_id'];
							$pro_title = $row_cat_pro['product_title'];
							$pro_cat = $row_cat_pro['cat_id'];
							$pro_brand = $row_cat_pro['brand_id'];
							$pro_desc = $row_cat_pro['product_desc'];
							$pro_price = $row_cat_pro['product_price'];
							$pro_image = $row_cat_pro['product_img1'];
							
							echo "
							<div id='single_product'>
							<h3>$pro_title</h3>
							
							<img src='admin_area/product_images/$pro_image' width='160' height='160'/><br>
							<p><b>Price: # $pro_price</b></p>
							<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
							<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
							
							</div>	
							
							";
						}//while					
						
	}//if
}

//get bran products
function getBrandPro()
{
	global $db;
	
	if(isset($_GET['brand'])){
		
						$brand_id = $_GET['brand']; //getting and assigning cat id from database
						$get_brand_pro = "select * from products where brand_id ='$brand_id'";
						
						$run_brand_pro = mysqli_query($db, $get_brand_pro);
						
						$count = mysqli_num_rows($run_brand_pro);
						if($count==0)
						{
							echo "<h1>No Products found under this brand!</h1>";
						}
						
						while($row_brand_pro= mysqli_fetch_array($run_brand_pro))
						{
							$pro_id = $row_brand_pro['product_id'];
							$pro_title = $row_brand_pro['product_title'];
							$pro_cat = $row_brand_pro['cat_id'];
							$pro_brand = $row_brand_pro['brand_id'];
							$pro_desc = $row_brand_pro['product_desc'];
							$pro_price = $row_brand_pro['product_price'];
							$pro_image = $row_brand_pro['product_img1'];
							
							echo "
							<div id='single_product'>
							<h3>$pro_title</h3>
							
							<img src='admin_area/product_images/$pro_image' width='160' height='160'/><br>
							<p><b>Price: # $pro_price</b></p>
							<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
							<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
							
							</div>	
							
							";
						}//while					
						
	}//if
}



//get the brands to display
function getBrands()
{
	global $db;
	
	$get_brand = "select * from brands";
	$run_brand = mysqli_query($db, $get_brand);
	
	while($row_brand = mysqli_fetch_array($run_brand)){
		$brand_id= $row_brand['brand_id'];
		$brand_title= $row_brand['brand_title'];
		
		echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
	}
	
	
}

//get categories to display
function getCategories()
{
	global $db;
	
	$get_category = "select * from categories";
	$run_category = mysqli_query($db, $get_category);
	
	while($row_category = mysqli_fetch_array($run_category)){
		$cat_id= $row_category['cat_id'];
		$cat_title= $row_category['cat_title'];
		
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
	
	
}

?>
