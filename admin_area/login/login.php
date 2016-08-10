<!--
K-Shop v1.0
Author: King Fortune
-->

<?php

//actaviting session for ADMIn
session_start();
include("../includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>K-Shop Admin Login</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
</head>
<body>
<div class="login">
	<h2>Welcome to K-Shop Admin Panel</h2>
	<div class="login-top">
		<h1>Please Enter your Details</h1>
		<form method="post">
			<input name="admin_email" type="text" value="User ID" required="required" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Id';}">
			<input type="password" name="pass" value="password"  required="required" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
	    
<div class="forgot">
	    	<a href="../../">HOME</a>
	    	<input type="submit" name="login" value="Login" >
	    </div>
	    </form>
	    
	</div>
	
</div>	

</body>
</html>

<?php
//authenticating admin
if(isset($_POST['login']))
{

	$user_email=$_POST['admin_email'];
	$user_pass=$_POST['pass'];
	$sel_admin="select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";

	$run_admin=mysqli_query($con,$sel_admin);

	$check_admin=mysqli_num_rows($run_admin);
	if($check_admin==1)
	{
		$_SESSION['admin_email']=$user_email;
		echo "<script>window.open('../index.php?logged_in=LoginSuccessful','_self')</script>";
	}
	else
	{
		echo "<script>alert('Incorrect Details, try again')</script>";
	}
	

}

?>