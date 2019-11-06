<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT weeklyLimit, monthlyLimit FROM limit_master WHERE 1";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
       $response['weeklyLimit'] = $row['weeklyLimit'];
       $response['monthlyLimit'] = $row['monthlyLimit'];
}
else{
$response['msg'] = 0;
}
mysqli_close($con);
exit(json_encode($response));
?>
