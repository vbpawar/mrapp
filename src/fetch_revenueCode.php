<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT revenueCode,title FROM revenue_master";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
    while($row=mysqli_fetch_array($result))
    {
      array_push($response,[
          'companyId' => $row['revenueCode'],
          'companyName' => $row['title']
      ]);
    }
  }
}
mysqli_close($con);
exit(json_encode($response));
 ?>
