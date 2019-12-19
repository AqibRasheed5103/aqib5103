<?php

include_once('includes/config.php');

if(isset($_POST['submit']))
{
	$user_id = $_POST['user_id'];
	$organization_id = $_POST['organization_id'];
	$rating = $_POST['rating'];
	$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
	
	$query_0 = "SELECT * FROM reviews WHERE user_id='$user_id' AND organization_id='$organization_id'";
	$result_0 = mysqli_query($connection,$query_0);
	$affected_rows_0 = $connection->affected_rows;
	
	if(!$result_0)
	{
		echo "Error (place_review_action.php) : " . mysqli_error($connection)." ..... !!";
		exit;
	}
	else if($affected_rows_0 > 0)
	{
		echo "<script>alert('Sorry. Your Review for this Organization has been Submitted Already .... !!');</script>";
		echo "<script>window.location='index.php';</script>";
		exit;
	}
	else
	{
		$query_1 = "INSERT INTO reviews (user_id, organization_id, rating, comment) VALUES ('$user_id', '$organization_id', '$rating', '$comment')";
		$result_1 = mysqli_query($connection,$query_1);
		$affected_rows_1 = $connection->affected_rows;
		if(!$result_1)
		{
			echo "<p style='color:red;'>Error (place_review_action.php) : " . mysqli_error($connection)." ..... !!</p>";
			exit;
		}
		else
		{
			/* Updating Ratings */
			// include_once('update_ratings.php');
			echo "<script>alert('Review Submitted Successfully .... !!');</script>";
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