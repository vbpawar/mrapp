<?php
require_once '../config/connection.php';
$visitorName    = $_REQUEST['visitorName'];
$visitorContact = $_REQUEST['visitorContact'];
$companyId      = $_REQUEST['companyId'];
$idNumber       = $_REQUEST['idNumber'];
$joiningDate    = $_REQUEST['joiningDate'];
$birthDate      = $_REQUEST['birthDate'];
$response       = [];

$sql = "INSERT INTO visitor_profile_master(visitorName,mobile,companyId,idNumber,joiningDate,birthDate,isActive) VALUES('$visitorName','$visitorContact',$companyId,'$idNumber','$joiningDate','$birthDate',1)";
if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Added successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>