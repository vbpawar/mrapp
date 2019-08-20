<?php
include '../config/connection.php';
$adId = $_REQUEST['adId'];
$response  = [];
$sql = "SELECT AM.adId,AM.companyId,AM.title,AM.htmlDetails,AM.startDate,AM.endDate,AM.type,AM.duration,AM.videoUrl,
AM.adRevenueCode FROM advertisement_master AM  WHERE AM.adId = $adId";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
   $row=mysqli_fetch_array($result);
     $response['companyId'] = $row['companyId'];
    $response['adRevenueCode'] = $row['adRevenueCode'];
    $response['title'] = $row['title'];
    $response['htmlDetails'] = $row['htmlDetails'];
    $response['startDate'] = $row['startDate'];
    $response['endDate'] = $row['endDate'];
    $response['type'] = $row['type'];
    $response['duration'] = $row['duration'];
    $response['videoUrl'] = $row['videoUrl'];
  }
}
mysqli_close($con);
exit(json_encode($response));
 ?>