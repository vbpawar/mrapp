<?php
require_once '../config/connection.php';
$companyName   = $_REQUEST['companyName'];
$companyTitle  = $_REQUEST['companyTitle'];
$managerName   = $_REQUEST['managerName'];
$managerEmail  = $_REQUEST['managerEmail'];
$mangerContact = $_REQUEST['managerContact'];
$address       = $_REQUEST['address'];
$response      = [];
$sql = "INSERT INTO company_master(companySubtitle,companyName,managerName,managerMobile,managerEmail,address,isActive) VALUES('$companyTitle','$companyName','$managerName','$mangerContact','$managerEmail','$address',1)";
if(mysqli_query($con,$sql)){
    $response['msg'] = 'Information Added successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>