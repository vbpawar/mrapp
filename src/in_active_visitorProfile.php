<?php
require_once('../config/connection.php');
$profileId = $_REQUEST['profileId'];
$param = $_REQUEST['param'];
$response = [];
if($param == 0){
    $isActive = 1;
}else{
    $isActive = 0;
}
$sql = "UPDATE visitor_profile_master SET isActive = $isActive WHERE profileId=$profileId";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Visitor profile InActive SuccessFully';
}else{
    $response['msg'] = 'Error while updating state';
}
mysqli_close($con);
exit(json_encode($response));
?>