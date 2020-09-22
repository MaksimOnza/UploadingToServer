<?php

$id_file = $_POST['id_file'];
$id_user = $_SESSION['user_id'];
$own_file = $_SESSION['user_name'];
$file_name = $_POST['file_name'];
$target_user = $_POST['target_user_name'];

if (!is_numeric($id_file) and !is_numeric($id_user)) {
    return false;
}
$query = "SELECT file_name FROM files_name WHERE id_file = ?";
$file_name_from_db = query_select($query, [1 => $id_file])[0]['file_name'];

if ($file_name_from_db != $file_name) {
    return false;
}

$query = "SELECT login_user FROM users";
$users_from_db = query_select($query)[0];
if (!in_array($target_user, $users_from_db)) {
    return false;
}

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

//через значенеи в option передать айдишник файла
//через айдишник файла найти файл в базе и сравнить его с полученным.
//через айдишник юзера найти юзера в базе и сравнить его с полученным.
//если предыдущие условия тру, тогда выполнить передачу ссылки др юзеру

//сделать файл для тестовых SQL запросов