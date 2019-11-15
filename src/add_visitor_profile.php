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
if (isset($_POST['visitorName']) && isset($_POST['visitorContact'])&& isset($_POST['companyId'])&& isset($_POST['idNumber'])&& isset($_POST['joiningDate'])&& isset($_POST['birthDate'])) {
  $sql = "INSERT INTO visitor_profile_master(visitorName,mobile,companyId,idNumber,joiningDate,birthDate,isActive)
  VALUES('$visitorName','$visitorContact',$companyId,'$idNumber','$joiningDate','$birthDate',1)";
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
					  			$response = array('Message'=>"Visitor Profile Added successfully",'Responsecode'=>200);
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
