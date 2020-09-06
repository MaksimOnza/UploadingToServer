<?php

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];

function render_login()
{
    $content = file_get_contents('views/' . $_REQUEST['path'] . '.php');
    render('template', $content);
}

if (empty($login) or empty($password)) {
    return render_login();
}

$result = query_select("SELECT * FROM users WHERE login_user='$login'");
$myrow = $result[0];

if (empty($myrow['login_user']) or (!password_verify($password, $myrow['pass_user']))) {
    $errors[] = ("Извините, введённый вами login или пароль неверный.");
}

if ($errors !== []) {
    return render_login();
}

header('Location: /index.php?path=file_list&id=' . $myrow['id_user'] . '');
