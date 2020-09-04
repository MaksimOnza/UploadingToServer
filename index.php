<?php

require_once("db.php");
require_once 'actions/valid_code.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$path = $_REQUEST['path'];

function redirect($path)
{
    $list_of_path = array(
        "login",
        "register",
        "file_list",
        "upload",
        "download",
    );
    if (in_array($path, $list_of_path)) {
        return require_once 'actions/' . $path . '.php';
    } else {
        return require_once 'actions/error_404.php';
    }
}

require_once 'views/template.php';
//доделать загрузку на сервер через роутер DONE
//сделать шаблон страницы для подключения footer и header DONE
//применить валидацию DONE