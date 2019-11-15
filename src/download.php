<?php
// if(isset($_POST["fileId"])){
     $url='../qrcode/';
    // $url=$_POST["urlpath"];
    // $file =$_POST["fileId"]; // Decode URL-encoded string
     $file = "12.jpg";
    $filepath = $url.$file;
    // echo $filepath;
    // Process download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    }
// }
?>
