<?php
require_once('../config/connection.php');
$revenueCode = $_REQUEST['revenueCode'];
$param = $_REQUEST['param'];
$response = [];
if($param == 0){
    $isActive = 1;
}else{
    $isActive = 0;
}
$sql = "UPDATE revenue_master SET isActive = $isActive WHERE revenueCode=$revenueCode";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Revenue Code InActive SuccessFully';
}else{
    $response['msg'] = 'Error while updating state';
}
mysqli_close($con);
exit(json_encode($response));
?>