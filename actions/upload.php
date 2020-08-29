<?php
require_once('db.php');

function insert_file($uploaddir, $nameInputForm)
{
    print 'in insert function';
    $file_name = basename($_FILES[$nameInputForm]['name']);
    $file_path = $uploaddir . $file_name;
    query_insert($file_name, $file_path, 1);
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
}

