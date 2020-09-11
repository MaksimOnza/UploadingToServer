<?php

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
    ob_start();
    if (in_array($path, $list_of_path)) {
        include 'actions/' . $path . '.php';
        $out_ob = ob_get_contents();
    } else {
        include 'actions/error_404.php';
        $out_ob = ob_get_contents();
    }
    ob_clean();
    return $out_ob;
}

function render($path, array $var = []): string
{
    extract($var);
    ob_start();
    require_once 'views/' . $path . '.php';
    return ob_get_contents();
}

$content = run_action($path, $list_of_path);
$template = render('template', ['content' => $content]);