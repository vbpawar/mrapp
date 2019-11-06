<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT companyId,companyName FROM company_master";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      array_push($response,[
          'companyId' => $row['companyId'],
          'companyName' => $row['companyName']
      ]);

    }
  }
}
mysqli_close($con);
exit(json_encode($response));
 ?>
