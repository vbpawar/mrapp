<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$revenueCode   = $_REQUEST['revenueCode'];
$title   = $_REQUEST['revenueTitle'];
$price  = $_REQUEST['price'];
$response      = [];
$sql = "UPDATE revenue_master SET title = '$title',price = '$price' WHERE revenueCode = $revenueCode";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Updated successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>
