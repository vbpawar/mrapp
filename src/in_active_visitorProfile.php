
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
$response=null;
$records = null;
extract($_POST);
date_default_timezone_set("Asia/Kolkata");
if (isset($_POST['profileId']) && isset($_POST['param'])) {
  if($param == 0){
      $isActive = 1;
  }else{
      $isActive = 0;
  }

       $sql = "UPDATE visitor_profile_master SET isActive = $isActive WHERE profileId=$profileId";
				$query = mysqli_query($con,$sql);
					if($query==1)
					{
					  			$response = array('Message'=>"Visitor profile Status Change SuccessFully",'Responsecode'=>200);
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
