<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$companyId = $_REQUEST['companyId'];
$response  = [];
$sql = "SELECT * FROM company_master WHERE companyId =  $companyId";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
   $row=mysqli_fetch_array($result);
    $response['companyId'] = $row['companyId'];
    $response['companySubtitle'] = $row['companySubtitle'];
    $response['companyName'] = $row['companyName'];
    $response['managerName'] = $row['managerName'];
    $response['managerMobile'] = $row['managerMobile'];
    $response['managerEmail'] = $row['managerEmail'];
    $response['address'] = $row['address'];
    }
}
mysqli_close($con);
exit(json_encode($response));
 ?>
