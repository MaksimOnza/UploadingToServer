<?php

require_once("db.php");
require_once 'actions/valid_code.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$path = $_REQUEST['path'];


function render(array $var = []): string
{
    global $path;
    extract($var);
    ob_start();
    include('views/' . $path . '.php');
    return ob_get_contents();
}

function switch_action($path)
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
        $out_ob = ob_get_contents();
    } else {
        require_once 'actions/error_404.php';
        $out_ob = ob_get_contents();
    }
    ob_clean();
    return $out_ob;
}

$content = switch_action($path);
require_once 'views/template.php';