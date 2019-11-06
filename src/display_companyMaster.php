<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT * FROM company_master ORDER BY companyId desc";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'companyId' => $row['companyId'],
            'companyTitle' => $row['companySubtitle'],
            'companyName' => $row['companyName'],
            'managerName' => $row['managerName'],
            'managerEmail' => $row['managerEmail'],
            'managerContact' => $row['managerMobile'],
            'address' => $row['address'],
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
