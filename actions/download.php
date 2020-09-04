<?php

require_once 'db.php';

$id = (int)$_GET['id'];
$dir = 'upload/';
$file_name = query('SELECT file_name FROM files_name WHERE id_file = ' . $id)[0]['file_name'];
$file = $dir . $file_name;

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
exit();