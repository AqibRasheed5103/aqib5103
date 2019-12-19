<?php
include_once('includes/config.php');
?>

<?php
if(isset($_GET['id']))
{
	if ( (!is_numeric($_GET['id'])) OR (empty($_GET['id'])) OR (($_GET['id']) < 1) )
	{
		header('location:index.php');
		exit;
	}
	
	$selected_category_id = $_GET['id'];
}
else
{
	header('location:index.php');
	exit;
}

$query_1 = "SELECT * FROM org_categories WHERE id='$selected_category_id'";
$result_1 = mysqli_query($connection,$query_1);
$affected_rows_1 = $connection->affected_rows;
if(!$result_1)
{
	echo "<p style='color:red;'>Error (categories.php) : " . mysqli_error($connection)." ..... !!</p>";
	exit;
}
else if($affected_rows_1 == 0)
{
	header('location:index.php');
	exit;
}
else
{
	while ( $row_1 = mysqli_fetch_array($result_1) )
	{
		$selected_category_name = $row_1['name'];
	}
}
?>

<?php
include_once('includes/above_body_tag.php');
?>
<style>
#categories_nav
{
	background: none !important;
	color: inherit;
	border-bottom: 2px solid #fff;
}
</style>
<body>
	<?php
	include_once('includes/header.php');
	?>
	<!--
	<div class="page-heading1 text-center">
	</div>
	-->
	<br />
	<div class="main-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12 fadeIn animated" style="">
					<h1 class="title-style-2" style=""> <?php echo $selected_category_name; ?> :<span class="title-under"></span></h1>
				</div>
				<div class="col-md-12 fadeIn animated">
					<p>
						Note: All the Organization related to <?php echo $selected_category_name ?> are sort according to the Reviews from the Users.
					</p>
					<p>
						Related Organizations are shown in Select Organization Options of below Donation Form.
					</p>
					<br />
					<?php
					if(isset($_SESSION['user_id']))
					{
					?>
					<a href="#" data-toggle="modal" data-target="#Place_Review_Modal" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-star"></span> Place Review</a>
					<?php
					}
					?>
				</div>
			</div>
			<!--
			<div class="row fadeIn animated">
				<div class="col-md-6">
					<h2 class="title-style-2"> Our Services <span class="title-under"></span></h2>
					<p>
						Dummy Line .....................
					</p>
					<p>
						Dummy Line .....................
					</p>
				</div>
				<div class="col-md-6">
					<h2 class="title-style-2"> Our Services <span class="title-under"></span></h2>
					<p>
						Dummy Line .....................
					</p>
					<p>					
						Dummy Line .....................
					</p>
				</div>
			</div>
			-->
			<div class="row fadeIn animated">
				<div class="col-md-12">
					<h2 class="title-style-2"> About Organizations <span class="title-under"></span></h2>
					
					<?php
					$query_2 = "SELECT * FROM organizations WHERE org_category='$selected_category_id' ORDER BY rating DESC";
					$result_2 = mysqli_query($connection,$query_2);
					$affected_rows_2 = $connection->affected_rows;
					if(!$result_2)
					{
						echo "<p style='color:red;'>Error : " . mysqli_error($connection)." ..... !!</p>";
						exit;
					}
					else if($affected_rows_2 == 0)
					{
						echo '<p style="color:red;">No Category Exist</p>';
					}
					else
					{
						$serial_no = 0;
						while ( $row_2 = mysqli_fetch_array($result_2) )
						{
							$serial_no++;
							$organization_id = $row_2['id'];
							$organization_name = $row_2['name'];
							?>
							<p><?php echo $serial_no; ?>. <?php echo $organization_name; ?> - <a href="view_organization_info.php?id=<?php echo $organization_id; ?>"><u>View Info</u></a></p>
							<?php
						}
					}
					?>
						
				</div>
			</div>
		</div>
	</div> <!-- /.main-container  -->
	<?php
	if(isset($_SESSION['user_id']))
	{
	?>
	<div class="container" style="margin-top:-50px;">
		<h1>Donation Form:</h1>
		<form action="donate_submit.php" method="POST">
			<div class="form-group">
				<label for="">Select Organization</label>
				<select name="organization_id" class="form-control" required />			
					<?php
					$query_2 = "SELECT * FROM organizations WHERE org_category='$selected_category_id' ORDER BY rating DESC";
					$result_2 = mysqli_query($connection,$query_2);
					$affected_rows_2 = $connection->affected_rows;
					if(!$result_2)
					{
						echo "<p style='color:red;'>Error : " . mysqli_error($connection)." ..... !!</p>";
						exit;
					}
					else if($affected_rows_2 == 0)
					{
						echo '<li class="submenu-item"><a href="#">No Category Exist </a></li>';
					}
					else
					{
						while ( $row_2 = mysqli_fetch_array($result_2) )
						{
							$organization_id = $row_2['id'];
							$organization_name = $row_2['name'];
							?>
							<option value="<?php echo $organization_id; ?>"><?php echo $organization_name; ?></option>
							<?php
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Donation Amount (From to 5$ to 5000$)</label>
				<input type="number" min="5" max="5000" name="amount" placeholder="Enter Amount you want to Donate in US Dollars ..... " class="form-control" required />
			</div>
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="submit" name="submit" id="" class="btn btn-success">Donate</button>
				</div>
			</div>
		</form>
	</div>
	<?php
	}
	else
	{
	?>	
	<div class="container" style="margin-top:-40px;">
		<div class="alert alert-warning" style="width:70%;">
			<strong>Please Sign In to Donate Or Review</strong>
		</div>
	</div>
	<?php
	}
	?>
	<br />
    <?php
	include_once('includes/footer.php');
	?>
	
	<!-- Place Review Modal -->
	<div class="modal fade" id="Place_Review_Modal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="donateModalLabel">Placing Review</h4> </div>
				<div class="modal-body">
					<form class="form-donation" method="POST" action="place_review_action.php">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
						<div class="row">
							<div class="form-group col-md-12 ">
								<select name="organization_id" class="form-control" required />			
								<?php
								$query_2 = "SELECT * FROM organizations WHERE org_category='$selected_category_id'";
								$result_2 = mysqli_query($connection,$query_2);
								$affected_rows_2 = $connection->affected_rows;
								if(!$result_2)
								{
									echo "<option style='color:red;'>Error : " . mysqli_error($connection)." ..... !!</option>";
									exit;
								}
								else if($affected_rows_2 == 0)
								{
									echo '<li class="submenu-item"><a href="#">No Category Exist </a></li>';
								}
								else
								{
									while ( $row_2 = mysqli_fetch_array($result_2) )
									{
										$organization_id = $row_2['id'];
										$organization_name = $row_2['name'];
										?>
										<option value="<?php echo $organization_id; ?>"><?php echo $organization_name; ?></option>
										<?php
									}
								}
								?>
							</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12 ">
								<select name="rating" class="form-control" required>
									<option value="">Select Rating</option>
									<option value="1">&#9733; &#9734; &#9734; &#9734; &#9734; (1)</option>
									<option value="2">&#9733; &#9733; &#9734; &#9734; &#9734; (2)</option>
									<option value="3">&#9733; &#9733; &#9733; &#9734; &#9734; (3)</option>
									<option value="4">&#9733; &#9733; &#9733; &#9733; &#9734; (4)</option>
									<option value="5">&#9733; &#9733; &#9733; &#9733; &#9733; (5)</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12 ">
								<textarea class="form-control" name="comment" placeholder="Write Comments about this Organization ....." required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.modal -->
	
	<?php
	include_once('includes/js_files.php');
	?>
</body>

</html>