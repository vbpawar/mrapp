<?php
require_once('../config/connection.php');
$adId = $_REQUEST['adId'];
$param = $_REQUEST['param'];
$response = [];
if($param == 0){
    $isActive = 1;
}else{
    $isActive = 0;
}
$sql = "UPDATE advertisement_master SET isActive =  $isActive WHERE adId=$adId";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Updated SuccessFully';
}else{
    $response['msg'] = 'Error while updating state';
}
mysqli_close($con);
exit(json_encode($response));
?>