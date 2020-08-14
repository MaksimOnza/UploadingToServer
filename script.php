<?php

require_once('db.php');

$id = (int)$_GET['id'];
$file_name = query('SELECT file_name FROM files_name WHERE id_file = '.$id.'')[0];
$file = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer/UploadingToServer/upload/'.$file_name[0];


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

