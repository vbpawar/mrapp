<?php
require_once('../config/connection.php');
$companyId = $_REQUEST['companyId'];
$param = $_REQUEST['param'];
$response = [];
if($param == 0){
    $isActive = 1;
}else{
    $isActive = 0;
}
$sql = "UPDATE company_master SET isActive = $isActive WHERE companyId=$companyId";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Company InActive SuccessFully';
}else{
    $response['msg'] = 'Error while updating state';
}
mysqli_close($con);
exit(json_encode($response));
?>