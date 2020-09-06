<?php

require_once("db.php");
require_once 'actions/valid_code.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$path = $_REQUEST['path'];

function render($template, $content)
{
    ob_start();
    if (!empty ($content)) {
        if (is_array($content)) {
            extract(['files' => $content]);
        } else {
            extract(['content' => $content]);
        }
    }
    require_once 'views/' . $template . '.php';
    return ob_get_contents();
}

function run_action($path)
{
    $list_of_path = array(
        "login",
        "register",
        "file_list",
        "upload",
        "download",
    );
    ob_start();
    if (in_array($path, $list_of_path)) {
        require_once 'actions/' . $path . '.php';
    } else {
        require_once 'actions/error_404.php';
    }
    return ob_get_contents();
}

run_action($path);


//доделать загрузку на сервер через роутер DONE
//сделать шаблон страницы для подключения footer и header DONE
//применить валидацию DONE