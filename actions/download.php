<?php


$id = (int)$_GET['id'];
$file_name = query('SELECT file_name FROM files_name WHERE id_user = ' . $id)[0];
$file = '/media/lenovo/Storage/Develop/projects/PHP/UploadingToServer/upload/' . $file_name[0];


header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
header('Location: /index.php?path=file_list');
exit;


