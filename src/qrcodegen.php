<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require_once('../config/connection.php');
mysqli_set_charset($con, 'utf8');
    $PNG_TEMP_DIR = '../qrcode/';
    include "../qrlib.php";
    $response = null;
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);


    $filename = $PNG_TEMP_DIR.'test.jpg';

    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    // if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
    //     $errorCorrectionLevel = $_REQUEST['level'];

    $matrixPointSize = 12;
    // $data1 = $_REQUEST['data'];
    // if (isset($_REQUEST['size']))
    //     $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
    // base64Companyid:companyid:base64randomnumber:base64Companyid


    if (isset($_REQUEST['data']))
    {
        $data1 =$_REQUEST['data'];
        $base64Companyid = base64_encode($data1);
        $randomno = rand(1000,9999);
        $base64randomno = base64_encode($randomno);
        $stringfilename=$base64Companyid.":".$data1.":".$base64randomno.":".$base64Companyid;
        $filename = $PNG_TEMP_DIR.$_REQUEST['data'].'.jpg';
        $sql ="UPDATE company_master SET qrcode=1 WHERE companyId=$data1";
        mysqli_query($con,$sql);
        // $filename = $PNG_TEMP_DIR.'qrcode'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($stringfilename, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        	$response = array('Message'=>"QRCode generated successfully","Data"=>1 ,'Responsecode'=>200);
    }
    else
    {
         	$response = array('Message'=>"QRCode Failed","Data"=>0 ,'Responsecode'=>200);

    }
    print json_encode($response);
 ?>
