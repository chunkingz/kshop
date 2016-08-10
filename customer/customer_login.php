<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Customer Login</title>
</head>

<body>

<?php
	@session_start(); //no error if it's not initialised
	include("includes/db.php");
	//include("functions/functions.php");
?>
	<div>


	<form action="checkout.php" method="post">
		
		<table width="600" align="center">
			<tr>
				<td align="right"><b>Your Email: </b></td>
				<td align="left"><input type="text" name="customer_email" value=""/><br/></td>
			</tr>
			<tr>
				<td align="right"><b>Your Password: </b></td>
				<td align="left"><input type="password" name="customer_pass" value=""/><br/></td>
			</tr>
			<tr>
			<tr>
				<td colspan="5"><a href="checkout.php?forgot_pass">Forgot Password</a></td>
			</tr>
				<td colspan="5"><input type="submit" name="customer_login" value="Login"/></td>
			</tr>
			
		</table>
	 </form>
	 

	 <?php

	 	if(isset($_GET['forgot_pass']))
	 	{
	 		echo "
	 		<br><br>

	 		<div align='center'>
	 		<b> Enter your email please </b>

	 		<form action='' method='post'>

		 		<input type='text' name='c_email' required placeholder='Enter your email'/>
		 		<br>
		 		<input type='submit' name='forgot_pass' value='Send me password' />

	 		</form>
	 		</div>

	 		";

	 		//if forgot button is clicked
	 		if(isset($_POST['forgot_pass']))
	 		{
	 			//get user email
	 			//email textbox/forgot pass 
	 			$c_email=$_POST['c_email'];
	 			$sel_c="select * from customers where customer_email='$c_email'";
	 			$run_c=mysqli_query($con,$sel_c);

	 			//check if email was found in the database
	 			$check_c=mysqli_num_rows($run_c);
	 			
	 			$row_c=mysqli_fetch_array($run_c);
	 			$c_name=$row_c['customer_name'];
	 			$c_pass=$row_c['customer_pass'];

	 			if($check_c==0)
	 			{
	 				echo "<script>alert('Email was not found in our database!!') </script>";
	 				exit();
	 			}
	 			else
	 			{
	 				//composing message 
	 				echo "OK";
	 				$from='admin@kshop.com';
	 				$subject='Password Recovery';
	 				$headers = "From: admin@kshop.com";
	 				$message="You have requested for your password.Your Password is : $c_pass ";

	 				mail($c_email, $subject, $message,$headers);
	 				echo "<script>alert('Password is sent, please check your email!!') </script>";
	 			
	 				echo "<script>window.open('checkout.php','_self')</script>";



	 					//using google smtp

	 				/*require_once "Mail.php";

						$from2 = '<from.gmail.com>';
						$to = '<to.yahoo.com>';
						$subject = 'Hi!';
						$body = "Hi,\n\nHow are you?";

						$headers = array(
						    'From' => $from2,
						    'To' => $to,
						    'Subject' => $subject
						);

						$smtp = Mail::factory('smtp', array(
						        'host' => 'ssl://smtp.gmail.com',
						        'port' => '465',
						        'auth' => true,
						        'username' => 'johndoe@gmail.com',
						        'password' => 'passwordxxx'
						    ));

						$mail = $smtp->send($to, $headers, $body);

						if (PEAR::isError($mail)) {
						    echo('<p>' . $mail->getMessage() . '</p>');
						} else {
						    echo('<p>Message successfully sent!</p>');
						}
						*/
	 			}

	 		}
	 	}


	 ?>


	 
	 <h4 align="center"><a href="customer_register.php">New Customer Registers Here</a></h4>

</div>
<?php
//fires out  when user clicks login

if(isset($_POST['customer_login']))
{
	//checking if the user/customer login credentials exist in the database.
	$customer_email = $_POST['customer_email'];
	$customer_pass = $_POST['customer_pass'];
	
	$select_customer = "SELECT * FROM customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer = mysqli_query($con,$select_customer);

	$check_customer=mysqli_num_rows($run_customer);
	$get_ip = getRealIpAddress(); //there is an include on the top
	//if there are any items that needs to be checked out we will direct them to checkout page when the user is logged in
	$sel_cart = "select * from cart where ip_add='$get_ip'";

	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);

	if($check_customer==0)
	{
		echo "<script>alert('Password/email address is incorrect') </script>";
		exit(); //returning
	}
	if($check_customer==1 AND $check_cart==0)
	{

		$_SESSION['customer_email']=$customer_email;
		//redirect
		echo "<script>window.open('/kshop/customer/my_account.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$customer_email;
		//echo "<script>window.open('payment_options.php','_self')</script>";
		echo "<script>alert('You have successfully logged in!!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		//include("payment_options.php");
	}

	




}
?>
</body>
</html>

