<?php

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];
$reload_path = 'login';

if (empty($login) or empty($password)) {
    return render($reload_path, ['errors' => $errors]);
}

$result = query_select2("SELECT * FROM users WHERE login_user = ?", [1 => $login]);
$user = $result[0];

if (empty($user['login_user']) or (!password_verify($password, $user['pass_user']))) {
    $errors[] = ("Извините, введённый вами login или пароль неверный.");
}

if ($errors !== []) {
    return render($reload_path, ['errors' => $errors]);
}
$_SESSION['user_id'] = $user['id_user'];
header('Location: /index.php?path=file_list');