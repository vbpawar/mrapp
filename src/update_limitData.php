<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$monthLimit  = $_REQUEST['monthLimit'];
$weekLimit   = $_REQUEST['weekLimit'];

$response      = [];
$sql = "UPDATE limit_master SET weeklyLimit = $weekLimit,monthlyLimit = $monthLimit";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Limit Updated successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>
