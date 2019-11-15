<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
 $response=null;
 $records = null;
 extract($_POST);

 if (isset($_POST['username']) && isset($_POST['password'])) {
     $sql = "SELECT accountId,password,isActive FROM account_master WHERE email='$username' AND password='$password'";
     $jobQuery = mysqli_query($con,$sql);
     if ($jobQuery != null) {
         $academicAffected = mysqli_num_rows($jobQuery);
         if ($academicAffected > 0) {
             session_start();
             while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
                 $records = $academicResults;
                 $accountId =$academicResults['accountId'];
                 $_SESSION['accountId'] = $accountId;
                 $response = array('Message' => "Login Successfully", "Data" => $records, "msg"=>$academicResults['isActive'],'Responsecode' => 200);
                 break;
             }
         } else {
               $response = array('Message' => "No user present/ Invalid username or password","msg"=>2, "Data" => $records, 'Responsecode' => 401);
         }
     }
 }
mysqli_close($con);
exit(json_encode($response));
?>
