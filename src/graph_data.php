<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$id = $_GET['id'];
$name = $_GET['name'];

$arr 	= array();
$arr1 	= array();
$result = array();

$sql = "SELECT COUNT(*) as count1,DATE_FORMAT(visitDate,'%b') as Month FROM visits_master WHERE companyId = $id AND YEAR(visitDate) = YEAR(CURDATE()) GROUP BY companyId,DATE_FORMAT(visitDate,'%m')";
$q	 = mysqli_query($con,$sql);
$j = 0;
$arr['name'] = $name;

while($row = mysqli_fetch_assoc($q)){
	$arr['data'][] = $row['count1'];
	$arr1['data'][] = $row['Month'];
}

array_push($result,$arr);
array_push($result,$arr1);

print json_encode($result, JSON_NUMERIC_CHECK);
// print json_encode($result1, JSON_NUMERIC_CHECK);

mysqli_close($con);
?>
