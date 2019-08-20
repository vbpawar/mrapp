<?php
include '../config/connection.php';
$profileId = $_REQUEST['profileId'];
$response  = [];
$sql = "SELECT V.profileId,V.visitorName,V.mobile,V.idNumber,V.joiningDate,V.birthDate,C.companyName,V.companyId FROM visitor_profile_master V 
LEFT JOIN company_master C ON V.companyId = C.companyId WHERE V.profileId = $profileId";
if($result = mysqli_query($con,$sql))
{
  if(mysqli_num_rows($result)>0)
  {
   $row=mysqli_fetch_array($result);
   $response['profileId'] = $_REQUEST['profileId'];
    $response['visitorName'] = $row['visitorName'];
    $response['mobile'] = $row['mobile'];
    $response['idNumber'] = $row['idNumber'];
    $response['joiningDate'] = $row['joiningDate'];
    $response['birthDate'] = $row['birthDate'];
    $response['companyName'] = $row['companyName'];
    $response['companyId'] = $row['companyId'];
  }
}
mysqli_close($con);
exit(json_encode($response));
 ?>