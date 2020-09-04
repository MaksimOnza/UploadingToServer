<?php


if (!empty($_FILES['inputFile']['name'])) {
    $file_name = basename($_FILES['inputFile']['name']);
    $file_path = 'upload/' . $file_name;
    query_insert($file_name, $file_path, $_REQUEST['id']);
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
    header('location: index.php/?path=file_list&id=' . $_REQUEST['id'] . '');
} else {
    header('location: index.php/?path=file_list&id=' . $_REQUEST['id'] . '');
}