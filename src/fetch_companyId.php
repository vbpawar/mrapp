 <?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
require_once('../config/connection.php');
 	 mysqli_set_charset($con,'utf8');
 	 $response=null;

 	 extract($_POST);


 		 			$academicQuery = mysqli_query($con,"SELECT * FROM company_master");
 						if($academicQuery!=null)
 						{
 							$academicAffected=mysqli_num_rows($academicQuery);
 							if($academicAffected>0)
 							{
 								while($academicResults = mysqli_fetch_assoc($academicQuery))
 									{
 										$records[]=$academicResults;
 									}
 							$response = array('Message'=>"All data fetched successfully".mysqli_error($con),"Data"=>$records,'Responsecode'=>200);
 							}
 							else
 							{
 									$response = array('Message'=>"No data availalbe".mysqli_error($con),"Data"=> $records,'Responsecode'=>403);
 							}
 						}
 						else{
 									$response = array('Message'=>"No data availalbe".mysqli_error($con),"Data"=> $records,'Responsecode'=>403);
 							}
 	 print json_encode($response);
 ?>
