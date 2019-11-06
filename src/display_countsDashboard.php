<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT  (SELECT COUNT(*) FROM   visits_master) AS count1,(SELECT COUNT(*)
FROM   advertisement_master) AS count2,(SELECT COUNT(*) FROM   company_master) AS count3
FROM  dual";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
       $response['advCount'] = $row['count1'];
       $response['compCount'] = $row['count2'];
       $response['visitCount'] = $row['count3'];
}
else{
$response['msg'] = 0;
}
mysqli_close($con);
exit(json_encode($response));
?>
