<?php
require_once('../config/connection.php');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$response = [];
$sql = "SELECT accountId,password,isActive FROM account_master WHERE email='$username' AND password='$password'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
    if($row['isActive']==0){
        $response['msg'] = 0;
    }else{
        $response['msg'] = 1;
        session_start();
        $_SESSION['accountId']  = $row['accountId'];
    }
 }else{
    $response['msg'] = 2;
}
mysqli_close($con);
exit(json_encode($response));
?>