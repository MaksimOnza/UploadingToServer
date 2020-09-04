<?php

$files = query_select('SELECT * FROM files_name WHERE user_id = ' . $_REQUEST['id'] . ';');

require_once 'views/file_list.php';




