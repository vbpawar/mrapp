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
if (isset($_POST['companyName']) && isset($_POST['companyTitle'])&& isset($_POST['managerName'])&& isset($_POST['managerEmail'])&& isset($_POST['managerContact'])&& isset($_POST['address'])) {
  $sql = "INSERT INTO company_master(companySubtitle,companyName,managerName,managerMobile,managerEmail,address,isActive)
  VALUES('$companyTitle','$companyName','$managerName','$managerContact	','$managerEmail','$address',1)";
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
					  			$response = array('Message'=>"Company Added successfully",'Responsecode'=>200);
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
