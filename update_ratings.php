<?php
/* Updating Ratings */
$query_2 = "SELECT id FROM organizations";
$result_2 = mysqli_query($connection,$query_2);
$resultant_rows_2 = mysqli_num_rows($result_2); // For Counting Num Of Resulted Rows
if($resultant_rows_2)
{
	while($row_2 = mysqli_fetch_array($result_2))
	{
		$sum = 0;
		$Organization_ID = $row_2[0];
		// Getting All Rating From reviews & Calculating Rows
		$query_3 = "SELECT rating FROM reviews WHERE organization_id='$Organization_ID'";
		$result_3 = mysqli_query($connection,$query_3);
		$total_rows = mysqli_num_rows($result_3); // For Counting Num Of Resulted Rows
		if($total_rows > 0)
		{
			while($row_3 = mysqli_fetch_array($result_3))
			{
				foreach ($result_3 as $row_3)
				{
					$sum += $row_3['rating'];
				}
			}
			$sum = $sum / $total_rows;
		}
		else
		{
			$sum = 0;
		}
		// Updating Rating Of Organization
		mysqli_query($connection,"UPDATE organizations SET rating='$sum' WHERE id='$Organization_ID'");
	}
}
?>