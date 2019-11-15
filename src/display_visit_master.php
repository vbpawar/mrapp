<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
  mysqli_set_charset($con,'utf8');
  $response=null;

  extract($_POST);

  $sql = "SELECT V.isActive,V.profileId,V.visitorName,V.mobile,V.idNumber,V.joiningDate,V.birthDate,C.companyName FROM visitor_profile_master V
  LEFT JOIN company_master C ON V.companyId = C.companyId ORDER BY  V.profileId DESC";
         $academicQuery = mysqli_query($con,$sql);
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
