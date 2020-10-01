<?php

$user_id = $_SESSION['user_id'];

if (!empty($_FILES['inputFile']['name'])) {
    $own_user = $user_id;
    $file_name_uniq = uniqid();
    $name_file = basename($_FILES['inputFile']['name']);
    $path_file = 'upload/' . $file_name_uniq;
    $target_user = $own_user;

    $query = "INSERT INTO list_files(path_file, own_user, name_file) VALUES(?, ?, ?)";
    query_insert($query, [
    	1 => $path_file, 
    	2 => $own_user, 
    	3 => $name_file]
    );
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $path_file);
    
    $query = "SELECT id_file FROM list_files WHERE path_file = ?";
    $id_file = query_select($query, [1 => $path_file])[0]['id_file'];

    $query = "INSERT INTO list_links(id_file, path_file, target_user, own_user, name_file) VALUES(?, ?, ?, ?, ?)";
    query_insert($query, [
    	1 => $id_file, 
    	2 => $path_file, 
    	3 => $target_user, 
    	4 => $own_user,
    	5 => $name_file
    ]);
}
header('location: index.php/?path=file_list&id=' . $user_id . '');