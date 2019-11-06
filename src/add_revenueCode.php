<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$title   = $_REQUEST['title'];
$price  = $_REQUEST['price'];
$response      = [];
$sql = "INSERT INTO revenue_master(title,price,isActive) VALUES('$title',$price,1)";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Added successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>
