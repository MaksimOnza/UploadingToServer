<?php

$id_file = 1;//$_REQUEST['id'];
$id_user = $_SESSION['user_id'];
$target_user = $_POST['target_user_name'];
$file_name = $_POST['file_name'];
$own_file = $_POST['own_file'];

$query = "SELECT file_name FROM files_name WHERE id_file = ?";
$file_name_from_db = query_select($query, [1 => $id_file])[0]['file_name'];
$query = "SELECT login_user FROM users WHERE id_user = ?";
$user_from_db = query_select($query, [1 => $id_user])[0];
error_log('before IF');
if(($file_name_from_db === $file_name) and ($user_from_db === $target_user)){
    error_log('In IF');
    $query_sel = "SELECT id_user FROM users WHERE login_user = ?";
    $target_user_id = query_select($query_sel, [1 => $target_user])[0]['id_user'];

    $file_name_uniq = uniqid();
    $file_path = 'upload/' . $file_name_uniq;

    $query = "INSERT INTO files_name(file_name, file_path, user_id, own_file) VALUES(?, ?, ?, ?)";
    query_insert($query, [
        1 => $file_name,
        2 => $file_path,
        3 => $target_user_id,
        4 => $own_file,
    ]);
}
//где взять айдишники юзера и файла?
//

//через значенеи в option передать айдишник файла
//через айдишник файла найти файл в базе и сравнить его с полученным.
//через айдишник юзера найти юзера в базе и сравнить его с полученным.
//если предыдущие условия тру, тогда выполнить передачу ссылки др юзеру

//сделать файл для тестовых SQL запросов

