<?php

require_once('db.php');

$id = $_GET['id'];
$file = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer/UploadingToServer'.$id;


//if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
//}

query('SELECT files_name WHERE id_file = '.$id.'');