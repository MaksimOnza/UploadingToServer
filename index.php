<?php
session_start();

require_once("db.php");
require_once 'valid_code.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$errors = [];
$path = $_REQUEST['path'];print $path;
$list_of_path = array(
    "login",
    "register",
    "file_list",
    "upload",
    "download",
    "sending",
    "deleting_file",
);

function run_action($path, $list_of_path)
{
    $action = in_array($path, $list_of_path) ? 'actions/' . $path . '.php' : 'actions/error_404.php';
    return include $action;
}

function render($path, array $vars = []): string
{
    extract($vars);
    ob_start();
    require_once 'views/' . $path . '.php';
    $content = ob_get_contents();
    ob_clean();
    return $content;
}

$content = run_action($path, $list_of_path);
$template = render('template', ['content' => $content]);
print $template;
//todo
//перенести delete
//красивый интерфейс
//убрать лишние запросы к бд
//s print f

//CHAT
