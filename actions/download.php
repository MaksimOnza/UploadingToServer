<?php

require_once 'db.php';

$id = (int)$_REQUEST['id'];
$file = query_select('SELECT name_file, path_file FROM list_files WHERE id_file = ' . $id)[0];
$name_file = $file['name_file'];
$path_file = $file['path_file'];

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $name_file . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path_file));
$fp = fopen($path_file, 'rb');
fpassthru($fp);