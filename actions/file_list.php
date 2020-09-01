<?php

$files = query_select('SELECT * FROM files_name WHERE user_id = ' . $_REQUEST['id'] . ';');


require_once 'views/file_list.php';
//require_once 'actions/upload.php';


if (!empty($_FILES['inputFile']['name'])) {
    insert_file('upload/', 'inputFile');
}