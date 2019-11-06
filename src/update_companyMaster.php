<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$companyName   = $_REQUEST['companyName'];
$companyTitle  = $_REQUEST['companyTitle'];
$managerName   = $_REQUEST['managerName'];
$managerEmail  = $_REQUEST['managerEmail'];
$mangerContact = $_REQUEST['managerContact'];
$address       = $_REQUEST['address'];

$companyId     = $_REQUEST['companyId'];
$response      = [];
$sql = "UPDATE company_master SET companySubtitle = '$companyTitle',companyName = '$companyName',managerName='$managerName',
managerMobile = '$mangerContact',managerEmail = '$managerEmail',address = '$address' WHERE companyId = $companyId";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Information Updated successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>
