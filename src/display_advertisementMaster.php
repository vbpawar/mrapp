<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response = [];
$sql = "SELECT A.adId,A.isActive,A.title,A.startDate,A.endDate,A.videoUrl,C.companyName,R.title AS rtitle
FROM advertisement_master A LEFT JOIN company_master C ON A.companyId = C.companyId LEFT JOIN revenue_master R ON A.adRevenueCode = R.revenueCode ORDER BY adId DESC";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'adId' => $row['adId'],
            'title' => $row['title'],
            'startDate' => $row['startDate'],
            'endDate' => $row['endDate'],
            'videoUrl' => $row['videoUrl'],
            'companyName' => $row['companyName'],
            'rtitle' => $row['rtitle'],
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
