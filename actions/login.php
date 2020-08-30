<?php

$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];

if (empty($login) or empty($password)) {
    return require_once 'views/login.php';
}

$result = query_select("SELECT * FROM users WHERE login_user='$login'");
$myrow = $result[0];

if (empty($myrow['login_user']) or (!password_verify($password, $myrow['pass_user']))){
    $errors[] = ("Извините, введённый вами login или пароль неверный.");
}

if ($errors !== []) {
    return require_once 'views/login.php';
}

$_SESSION['login'] = $myrow['login_user'];
$_SESSION['id'] = $myrow['id_user'];
$_POST['id'] = $_SESSION['id'];
$_SESSION['hello_form'] = False;
header('Location: /index.php?path=file_list');

//Как вставить hedaer and footer один раз, не разсовывая по файлам done
//Сделать рабочее приложение
//регистрация юзеров done
//Шифрование паролей done
