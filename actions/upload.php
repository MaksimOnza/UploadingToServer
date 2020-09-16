<?php

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if (!empty($_FILES['inputFile']['name'])) {
    $own_file = $user_name;
    $file_name_uniq = uniqid();
    $file_name = basename($_FILES['inputFile']['name']);
    $file_path = 'upload/' . $file_name_uniq;
    $query = "INSERT INTO files_name(file_name, file_path, user_id, own_file) VALUES(?, ?, ?, ?)";
    query_insert($query, [1 => $file_name, 2 => $file_path, 3 => $user_id, 4 => $own_file]);
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
    header('location: index.php/?path=file_list&id=' . $user_id . '');
} else {
    header('location: index.php/?path=file_list&id=' . $user_id . '');
}