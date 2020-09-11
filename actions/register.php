<?php


$login = $_REQUEST['login'] ?? '';
$password = $_REQUEST['password'] ?? '';
$errors = [];

function valid_in_data($login, $password, $errors = []){
    if (empty($login) or empty($password)) {
        $errors[] = ("Извините, Вы ввели не полные данные.");
        return false;
    }
    if (!password_validation_check($password, 5, 50) or !login_validation_check($login, 3, 10)){
        return false;
    }
    return true;
}

if(valid_in_data($login, $password, $errors)){
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT) ?? '';
    query_insert_user($login, $password);
    header('Location: /index.php?path=login');
}else{
    return render($_REQUEST['path'], ['errors'=>$errors]);
}
