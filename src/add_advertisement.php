<?php
require_once '../config/connection.php';
$addTitle    =  $_REQUEST['addTitle'];
$videoUrl    = $_REQUEST['videoUrl'];
$htmlDetails = $_REQUEST['htmlDetails'];
$companyId   = $_REQUEST['companyId'];
$revenueCode = $_REQUEST['revenueCode'];
$Atype       = $_REQUEST['Atype'];
$duration    = $_REQUEST['duration'];
$startDate   = $_REQUEST['startDate'];
$endDate     = $_REQUEST['endDate'];
$response    = [];
$sql = "INSERT INTO advertisement_master(companyId,title,htmlDetails,startDate,endDate,type,duration,videoUrl,adRevenueCode,isActive)
 VALUES($companyId,'$addTitle','$htmlDetails','$startDate','$endDate',$Atype,$duration,'$videoUrl','$revenueCode',1)";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Added successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>