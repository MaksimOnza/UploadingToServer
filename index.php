<?php

require_once("db.php");
require_once 'header.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$path = $_REQUEST['path'];

if (strpos($path, 'user') === 0) {
    require_once 'actions/user.php';
}

if (strpos($path, 'login') === 0) {
    require_once 'actions/login.php';
}

if (strpos($path, 'register') === 0) {
    require_once 'actions/register.php';
}

if (strpos($path, 'file_list') === 0) {
    require_once 'actions/file_list.php';
}

if (strpos($path, 'upload') === 0) {
    require_once 'actions/upload.php';
}

if (strpos($path, 'download') === 0) {
    require_once 'actions/download.php';
}
require_once 'footer.php';