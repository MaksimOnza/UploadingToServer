<?php

$request_id = $_REQUEST['id'];

if(!is_numeric($request_id)){
    return print'Not valid '.$request_id;
}

if (!empty($_FILES['inputFile']['name'])) {
    $file_name_uniq = uniqid();
    $file_name = basename($_FILES['inputFile']['name']);
    $file_path = 'upload/' . $file_name_uniq;
    query_insert($file_name, $file_path, $request_id);
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
    header('location: index.php/?path=file_list&id=' . $_REQUEST['id'] . '');
} else {
    header('location: index.php/?path=file_list&id=' . $_REQUEST['id'] . '');
}