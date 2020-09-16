<?php

require_once 'db.php';

$id = (int)$_REQUEST['id'];
$file = query_select('SELECT file_name, file_path FROM files_name WHERE id_file = ' . $id)[0];
$file_name = $file['file_name'];
$file_path = $file['file_path'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file_path));
$fp = fopen($file_path, 'rb');
fpassthru($fp);


