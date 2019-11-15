<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response=null;
$records = null;
extract($_POST);

date_default_timezone_set("Asia/Kolkata");

//`categoryId`, `fabricTitle`, `fabricBrand`, `fabricDetails`, `skuNo`, `fabricPrice`, `releaseDate`, `isPriceVariable`, `hexColor`, `colorName`, `fabricType`, `isActive`
if (isset($_POST['adId']) &&isset($_POST['addTitle']) && isset($_POST['videoUrl'])&& isset($_POST['htmlDetails'])&& isset($_POST['companyId'])&& isset($_POST['revenueCode'])
&& isset($_POST['Atype'])&& isset($_POST['duration'])&& isset($_POST['startDate'])&& isset($_POST['endDate'])) {


  $sql = "UPDATE advertisement_master SET companyId = $companyId,title = '$addTitle',htmlDetails = '$htmlDetails',startDate = '$startDate',endDate = '$endDate',type = $Atype,duration = $duration,videoUrl = '$videoUrl',adRevenueCode = $revenueCode WHERE adId = $adId";
  // echo $sql;
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
						 // $last_id = mysqli_insert_id($con);
						 // $s = strval($last_id);
					  			$response = array('Message'=>"Advertisement Updated successfully",'Responsecode'=>200);
					}
					else
					{
						$response=array("Message"=> mysqli_error($con)." failed","Responsecode"=>500);
					}
}
else
{
		    $response = array('Message' => "Parameter missing", "Data" => $records, 'Responsecode' => 402);
}
print json_encode($response);
?>
