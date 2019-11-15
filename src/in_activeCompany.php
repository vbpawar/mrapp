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
if (isset($_POST['companyId']) && isset($_POST['param'])) {

  if($param == 0){
      $isActive = 1;
  }else{
      $isActive = 0;
  }

$sql = "UPDATE company_master SET isActive = $isActive WHERE companyId=$companyId";
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
						 // $last_id = mysqli_insert_id($con);
						 // $s = strval($last_id);
					  			$response = array('Message'=>"Company Updated SuccessFully",'Responsecode'=>200);
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
