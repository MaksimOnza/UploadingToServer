<?php

$id_file = $_POST['id_file'];
$own_file = $_SESSION['user_name'];
$target_user_id = $_POST['target_user_id'];

if (!is_numeric($id_file)) {
    return false;
}

$query = "SELECT file_name, file_path FROM files_name WHERE id_file = ?";
$file_from_db = query_select($query, [1 => $id_file])[0];
$file_name_from_db = $file_from_db['file_name'];
$file_path_from_db = $file_from_db['file_path'];

if (!is_numeric($target_user_id)) {
    return false;
}
$query_sel = "SELECT login_user FROM users WHERE id_user = ?";
$target_user_name = query_select($query_sel, [1 => $target_user_id])[0]['login_user'];

$query = "INSERT INTO files_name(file_name, file_path, user_id, own_file) VALUES(?, ?, ?, ?)";
query_insert($query, [
    1 => $file_name_from_db,
    2 => $file_path_from_db,
    3 => $target_user_id,
    4 => $own_file,
]);
//через значенеи в option передать айдишник файла
//через айдишник файла найти файл в базе и сравнить его с полученным.
//через айдишник юзера найти юзера в базе и сравнить его с полученным.
//если предыдущие условия тру, тогда выполнить передачу ссылки др юзеру