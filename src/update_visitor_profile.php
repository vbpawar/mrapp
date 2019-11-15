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
if (isset($_POST['profileId']) &&isset($_POST['visitorName']) && isset($_POST['visitorContact'])&& isset($_POST['companyId'])&& isset($_POST['idNumber'])&& isset($_POST['joiningDate'])&& isset($_POST['birthDate'])) {
  $sql = "UPDATE visitor_profile_master SET visitorName = '$visitorName',mobile = '$visitorContact',
  companyId = $companyId,idNumber = '$idNumber',joiningDate = '$joiningDate',birthDate = '$birthDate' WHERE profileId = $profileId";

				$query = mysqli_query($con,$sql);
					if($query==1)
					{
					  			$response = array('Message'=>"Visitor Profile Updated successfully",'Responsecode'=>200);
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
