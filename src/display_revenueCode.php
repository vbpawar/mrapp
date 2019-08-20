<?php
require_once '../config/connection.php';
$response = [];
$sql = "SELECT * FROM revenue_master ORDER BY revenueCode desc";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        array_push($response,[
            'revenueCode' => $row['revenueCode'],
            'title' => $row['title'],
            'price' => $row['price'],
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