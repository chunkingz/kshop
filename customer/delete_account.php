<html>
<head></head>

<body>

<form action="" method="post" bgcolor="#BDBD9D">

	<table align="center" width="600">

		<tr align="center">
			<td> <h3> Do you really want to delete your account ? </h3> </td>
		</tr>
		


		<tr align="left">
			<td colspan="2"><input type="submit" name="yes" value="Yes, Delete My account"/></td>
			<td ><input type="submit" name="no" value="No,Take me away"/></td>
		</tr>

	</table>


</form>

<?php

include("includes/db.php");
	$c=$_SESSION['customer_email'];

	if(isset($_POST['yes']))
	{
		$delete_customer="delete from customers where customer_email='$c'";
		$run_delete=mysqli_query($con,$delete_customer);

		if($run_delete)
		{
			session_destroy();
			echo "<script> alert('Your account has been deleted,Good Bye!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
		else
		{
			echo "<script> alert('Failed')</script>";
		}
	}

		if(isset($_POST['no']))
		{
			echo "<script>window.open('my_account.php','_self')</script>";
			
		}
	

?>

</body>

</html>
