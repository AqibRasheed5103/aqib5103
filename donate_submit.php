<?php

include_once('includes/config.php');

include_once('includes/above_body_tag.php');

if(isset($_POST['submit']))
{
	$_SESSION['organization_id'] = $organization_id = $_POST['organization_id'];
	$_SESSION['amount'] = $_POST['amount'];
	
	$select_query_2 = "SELECT * FROM organizations WHERE id='$organization_id'";
	$select_result_2 = mysqli_query($connection,$select_query_2);
	$row_2 = mysqli_fetch_array($select_result_2);
	$organization_name = $row_2['name'];
	
	?>
	<div class="container" style="">
		<h1>Confirmation ..... </h1>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
			<div class="form-group">
				<label for="">Organization</label>
				<input type="text" value="<?php echo $organization_name ?>" class="form-control" readonly />
			</div>
			<div class="form-group">
				<label for="">Amount going to Donate ($)</label>
				<input type="number" value="<?php echo $_POST['amount']; ?>" class="form-control" readonly />
			</div>

        <!-- Identifying Business Email Where Payments will be Transact -->
        <input type="hidden" name="business" value="business-merchant-test@fasags.com">
        
        <!-- Specifying the Buy Now Button -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $organization_name; ?>">
        <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/Donation/donate_submit.php?return=0'>
		<input type='hidden' name='return' value='http://localhost/Donation/donate_submit.php?return=1'>
		
        <!-- Displaying the Payment Button -->
        <input type="image" name="submit" border="0" style="width:150px;" src="http://wixxyleaks.com/wp-content/uploads/2014/09/paypal_donate_button.jpg" alt="PayPal - The safer, easier way to pay online">
    
    </form>
	</div>

	<?php
}
else if( (isset($_GET['return'])) AND ($_GET['return'] == 0) )
{
	unset($_SESSION['amount']);
	unset($_SESSION['organization_id']);
	header('location:index.php');
	exit;
}
else if( (isset($_GET['return'])) AND ($_GET['return'] == 1) )
{
	$organization_id = $_SESSION['organization_id'];
	$amount = $_SESSION['amount'];
	$user_id = $_SESSION['user_id'];
	
	$query_1 = "INSERT INTO donated_amount (user_id, organization_id, amount) VALUES ('$user_id', '$organization_id', '$amount')";
	$result_1 = mysqli_query($connection,$query_1);
	$affected_rows_1 = $connection->affected_rows;
	if(!$result_1)
	{
		echo "<p style='color:red;'>Error (donate_submit.php) : " . mysqli_error($connection)." ..... !!</p>";
		exit;
	}
	else
	{
		
		$select_query_2 = "SELECT * FROM users WHERE id='$user_id'";
		$select_result_2 = mysqli_query($connection,$select_query_2);
		$row_2 = mysqli_fetch_array($select_result_2);
		$user_name = $row_2['name'];
		$user_email = $row_2['email'];
		
		$to = $user_email;
		$subject = 'Verification Code From Donate Now';
		$message = 'Hi '.$user_name.'...... !!<br>Thanks for Donating on Our Website.<br />Your Donated Amount : '.$amount;

		$headers = "From: admin@examples.com \r\n";
		$headers .= "Reply-To: admin@examples.com \r\n";
		// $headers .= "CC: admin@examples.com\r\n"; // Mail Also Send to this CC Email Address
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		$mail_sent = mail($to, $subject, $message, $headers);
		
		unset($_SESSION['amount']);
		unset($_SESSION['organization_id']);
		
		echo "<script>alert('Amount Donated Successfully .... !!');</script>";
		echo "<script>window.location='index.php';</script>";
		exit;
	}
}
else
{
	header('location:index.php');
	exit;
}

?>