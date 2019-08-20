<?php
session_start();
if(isset($_SESSION['account_id'])){
    unset($_SESSION['account_id']);
}
session_destroy();
header('Location:../pages/login.html');
?>
