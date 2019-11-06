<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT vm.visitDate,vm.visitDateTime,cm.companyName,cm.companySubtitle,cm.managerName FROM visits_master vm
LEFT JOIN company_master cm ON cm.companyId = vm.companyId ORDER BY vm.visitDate DESC";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'companyName' => $row['companyName'],
            'visitDate' => $row['visitDate'],
            'companySubtitle' => $row['companySubtitle'],
            'managerName' => $row['managerName'],
            'visitDateTime' => $row['visitDateTime']

        ]);
    }
}
else{
$response['msg'] = 0;
}
mysqli_close($con);
exit(json_encode($response));
?>
