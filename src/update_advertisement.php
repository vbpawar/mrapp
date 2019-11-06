<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$adId        = $_REQUEST['adId'];
$addTitle    = $_REQUEST['addTitle'];
$videoUrl    = $_REQUEST['videoUrl'];
$htmlDetails = $_REQUEST['htmlDetails'];
$companyId   = $_REQUEST['companyId'];
$revenueCode = $_REQUEST['revenueCode'];
$Atype       = $_REQUEST['Atype'];
$duration    = $_REQUEST['duration'];
$startDate   = $_REQUEST['startDate'];
$endDate     = $_REQUEST['endDate'];
$response    = [];
$sql = "UPDATE advertisement_master SET companyId = $companyId,title = '$addTitle',htmlDetails = '$htmlDetails',startDate = '$startDate',endDate = '$endDate',type = $Atype,duration = $duration,videoUrl = '$videoUrl',adRevenueCode = $revenueCode WHERE adId = $adId";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Updated successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>
