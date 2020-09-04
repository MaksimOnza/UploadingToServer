<?php

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';

 if (!login_validation_check($login, 3, 10)){
    return require_once 'views/register.php';
}

if (!password_validation_check($password, 10, 50)) {
    return require_once 'views/register.php';
}

$errors = [];

if (empty($login) or empty($password)) {
    print "Извините, Вы ввели не полные данные.";
    $errors[] = ("Извините, Вы ввели не полные данные.");
    return require_once 'views/register.php';
}

$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT) ?? '';

$resp_users = query_select("SELECT login_user FROM users");

$array_list_users = [];
foreach ($resp_users as $user) {
    $array_list_users[] = $user['login_user'];
}

if (in_array($login, $array_list_users)) {
    print 'Такое имя уже сущуствует';
    return require_once 'views/register.php';
} else {
    query_insert_user($login, $password);
    header('Location: /index.php?path=login');
}