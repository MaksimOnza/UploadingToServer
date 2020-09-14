<?php


$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];

function valid_in_data($login, $password, $errors = [])
{
    if (empty($login) or empty($password)) {
        $errors[] = ("Извините, Вы ввели не полные данные.");
        return false;
    }
    if (!password_validation_check($password, 4, 50) or !login_validation_check($login, 3, 10)) {
        return false;
    }
    return true;
}

if (valid_in_data($login, $password, $errors)) {
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT) ?? '';
    $query = "INSERT INTO users(login_user, pass_user) VALUES(?,?)";
    query_insert($query, [1 => $login, 2 => $password]);
    header('Location: /index.php?path=login');
} else {
    return render($_REQUEST['path'], ['errors' => $errors]);
}
