<form action="" method="post" >
	<table width="700" border="2">
		<tr>
			<td colspan="4"> <h2> Change your password </h2> </td>
		</tr>

		<tr>
			<td align="left"> <h3> Current Password : </h3> </td>
			<td align="left"> <input type="password" name="old_pass" required /></td>
		</tr>

		<tr>
			<td align="left"> <h3> Enter New Password : </h3> </td>
			<td align="left"> <input type="password" name="new_pass" required /></td>
		</tr>

		<tr>
			<td align="left"> <h3> Confirm New Password: </h3> </td>
			<td align="left"> <input type="password" name="new_pass_again" required /></td>
		</tr>

		<tr align="center">
			<td colspan="4"><input type="submit" name="change_pass" value="Change Password"/></td>
		</tr>


</form>

<?php
include("includes/db.php");

	$current_user=$_SESSION['customer_email'];
	//validating password
	if(isset($_POST['change_pass'])) //if user clicks change pass
	{
		$old_pass=$_POST['old_pass'];

		$new_pass = $_POST['new_pass'];
		$new_pass_again=$_POST['new_pass_again'];

		//validating old password
		$get_real_pass="select * from customers where customer_pass='$old_pass'";
		$run_real_pass=mysqli_query($con,$get_real_pass);

		$check_pass=mysqli_num_rows($run_real_pass);

		if($check_pass==0)

		{
			echo "<script> alert('Invalid current password!')</script>";
			exit();
		}
		if($new_pass!=$new_pass_again)
		{
			echo "<script> alert('New password did not match!!')</script>";
			exit();
		}
		else
		{
			$update_pass="update customers set customer_pass='$new_pass' WHERE customer_email='$current_user'";
		
			$run_pass=mysqli_query($con,$update_pass);

			if($run_pass)
			{
				echo "<script> alert('Password changed successfully!')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";
			}
			else
			{
				echo "<script> alert('Error occured!!!')</script>";
				echo "<script>window.open('my_account.php','_self')</script>";
			}
		}
	}
?>