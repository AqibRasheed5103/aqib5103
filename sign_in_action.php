<?php

include_once('includes/config.php');

if(isset($_POST['submit']))
{
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
	
	$query_1 = "SELECT * FROM users WHERE email='$email' AND password='$password' AND active=1";
	$result_1 = mysqli_query($connection,$query_1);
	$affected_rows_1 = $connection->affected_rows;
	if(!$result_1)
	{
		echo "<p style='color:red;'>Error : " . mysqli_error($connection)." ..... !!</p>";
		exit;
	}
	else if($affected_rows_1 == 0)
	{
		echo "<script>alert('Invalid Email Or Password .... !!');</script>";
		echo "<script>window.location='index.php';</script>";
		exit;
	}
	else
	{
		$row_1 = mysqli_fetch_array($result_1);
		unset($_SESSION['admin_id']);
		$_SESSION['user_id'] = $row_1['id'];
		header ('location:index.php');
	}
}
else
{
	header('location:index.php');
	exit;
}

?>