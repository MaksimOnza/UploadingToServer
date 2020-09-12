<?php
session_start();

require_once("db.php");
require_once 'actions/valid_code.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$errors = [];
$path = $_REQUEST['path'];
$list_of_path = array(
    "login",
    "register",
    "file_list",
    "upload",
    "download",
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


//сделать: расшарить файл лругому пользователю, где будет пометка от кого этот файл.
//