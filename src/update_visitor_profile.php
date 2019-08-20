<?php
require_once '../config/connection.php';
$visitorName    = $_REQUEST['visitorName'];
$visitorContact = $_REQUEST['visitorContact'];
$companyId      = $_REQUEST['companyId'];
$idNumber       = $_REQUEST['idNumber'];
$joiningDate    = $_REQUEST['joiningDate'];
$birthDate      = $_REQUEST['birthDate'];
$profileId      = $_REQUEST['profileId'];
$response       = [];

$sql = "UPDATE visitor_profile_master SET visitorName = '$visitorName',mobile = '$visitorContact',
companyId = $companyId,idNumber = '$idNumber',joiningDate = '$joiningDate',birthDate = '$birthDate' WHERE profileId = $profileId";

if(mysqli_query($con,$sql) or die(mysqli_error($con))){
    $response['msg'] = 'Information Updated successfully';
}else{
    $response['msg'] = 'Error while adding record';
}
mysqli_close($con);
exit(json_encode($response));
?>