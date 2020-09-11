<?php


$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];


 if (!login_validation_check($login, 3, 10)){
     return render($_REQUEST['path'], ['errors'=>$errors]);
}

if (!password_validation_check($password, 10, 50)) {
    return render($_REQUEST['path'], ['errors'=>$errors]);
}

$errors = [];

if (empty($login) or empty($password)) {
    print "Извините, Вы ввели не полные данные.";
    $errors[] = ("Извините, Вы ввели не полные данные.");
    return render($_REQUEST['path'], ['errors'=>$errors]);
}

$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT) ?? '';

$resp_users = query_select("SELECT login_user FROM users");

$array_list_users = [];
foreach ($resp_users as $user) {
    $array_list_users[] = $user['login_user'];
}

if (in_array($login, $array_list_users)) {
    $errors[] = 'Такое имя уже сущуствует';
    return render($_REQUEST['path'], ['errors'=>$errors]);
} else {
    query_insert_user($login, $password);
    header('Location: /index.php?path=login');
}