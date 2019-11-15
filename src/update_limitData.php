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
if (isset($_POST['monthLimit']) && isset($_POST['weekLimit'])) {


        $sql = "UPDATE limit_master SET weeklyLimit = $weekLimit,monthlyLimit = $monthLimit";
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
						 // $last_id = mysqli_insert_id($con);
						 // $s = strval($last_id);
					  			$response = array('Message'=>"Limit Updated successfully",'Responsecode'=>200);
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
