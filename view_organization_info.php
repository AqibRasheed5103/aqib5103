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
	
	$selected_organizations_id = $_GET['id'];
}

$query_1 = "SELECT * FROM organizations WHERE id='$selected_organizations_id'";
$result_1 = mysqli_query($connection,$query_1);
$affected_rows_1 = $connection->affected_rows;
if(!$result_1)
{
	echo "<p style='color:red;'>Error : " . mysqli_error($connection)." ..... !!</p>";
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
		$selected_organizations_org_category = $row_1['org_category'];
		$selected_organizations_name = $row_1['name'];
		$selected_organizations_details = $row_1['details'];
		$selected_organizations_website = $row_1['website'];
		$selected_organizations_rating = $row_1['rating'];
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
					<h1 class="title-style-2" style=""> <?php echo $selected_organizations_name; ?> :<span class="title-under"></span></h1>
				</div>
				<div class="col-md-12 fadeIn animated">
					<p>
						<u>About:</u> <?php echo $selected_organizations_details ?>
					</p>
					<p>
						<u>Rating:</u> <?php echo $selected_organizations_rating ?> out of 5
					</p>
					<br />
					<a href="<?php echo $selected_organizations_website; ?>" target="_blank" class="btn btn-primary btn-success">View Website</a>
				</div>
			</div>
		</div>
	</div> <!-- /.main-container  -->
	<br />
    <?php
	include_once('includes/footer.php');
	?>
	
	<?php
	include_once('includes/js_files.php');
	?>
</body>

</html>