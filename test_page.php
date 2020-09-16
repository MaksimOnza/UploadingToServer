<?php

require_once 'db.php';
$target_user = $_POST['target_user_name'];
$file_name = $_POST['file_name'];
$own_file = $_POST['own_file'];//'maks';//$_SESSION['user_name'];//почему print $_SESSION['user_name'] пустое?
print !empty($_POST['file_name']);
if (!empty($target_user) and !empty($file_name)) {
    $query_sel = "SELECT id_user FROM users WHERE login_user = ?";
    $target_user_id = query_select($query_sel, [1 => $target_user])[0]['id_user'];
    $file_name_uniq = uniqid();
    $file_path = 'upload/' . $file_name_uniq;
    $query = "INSERT INTO files_name(file_name, file_path, user_id, own_file) VALUES(?, ?, ?, ?)";
    query_insert($query, [1 => $file_name, 2 => $file_path, 3 => $target_user_id, 4 => $own_file]);
    print 'true';
}else{
    print 'FALSE';
}