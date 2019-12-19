<?php

include_once('includes/config.php');

if(isset($_POST['submit']))
{
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
	$contact = htmlspecialchars($_POST['number'], ENT_QUOTES);
	$country = htmlspecialchars($_POST['country'], ENT_QUOTES);
	
	//Regex For Name (Should Contain Letters & Two Spaces Can't be Together)
	$Regex_name = "/^([a-zA-Z]+\s?)+$/";
	
	$query_0 = "SELECT * FROM users WHERE email='$email' AND contact='$contact'";
	$result_0 = mysqli_query($connection,$query_0);
	$affected_rows_0 = $connection->affected_rows;
	
	if(!$result_0)
	{
		echo "Error (sign_up_action.php) : " . mysqli_error($connection)." ..... !!";
		exit;
	}
	else if($affected_rows_0 > 0)
	{
		echo "<script>alert('Sorry. The Email Or Contact Number you entered is existed in our Database Already .... !!');</script>";
		echo "<script>window.location='index.php';</script>";
		exit;
	}
	else
	{
		$query_1 = "INSERT INTO users (name, email, password, contact, country) VALUES ('$name', '$email', '$password', '$contact', '$country')";
		$result_1 = mysqli_query($connection,$query_1);
		$affected_rows_1 = $connection->affected_rows;
		if(!$result_1)
		{
			echo "<p style='color:red;'>Error (sign_up_action.php) : " . mysqli_error($connection)." ..... !!</p>";
			exit;
		}
		else
		{
			$query_02 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
			$result_02 = mysqli_query($connection, $query_02);
			$row_02 = mysqli_fetch_array($result_02);
			$_SESSION['user_id'] = $row_02['id'];
			echo "<script>alert('Registered Successfully .... !!');</script>";
			echo "<script>window.location='index.php';</script>";
			exit;
		}
	}
}
else
{
	header('location:index.php');
	exit;
}

?>