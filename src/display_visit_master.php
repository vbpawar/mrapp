<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT V.isActive,V.profileId,V.visitorName,V.mobile,V.idNumber,V.joiningDate,V.birthDate,C.companyName FROM visitor_profile_master V
LEFT JOIN company_master C ON V.companyId = C.companyId ORDER BY  V.profileId DESC";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'profileId' => $row['profileId'],
            'visitorName' => $row['visitorName'],
            'mobile' => $row['mobile'],
            'idNumber' => $row['idNumber'],
            'joiningDate' => $row['joiningDate'],
            'birthDate' => $row['birthDate'],
            'companyName' => $row['companyName'],
            'isActive' => $row['isActive']
        ]);
    }
}
else{
$response['msg'] = 0;
}
mysqli_close($con);
exit(json_encode($response));
?>
