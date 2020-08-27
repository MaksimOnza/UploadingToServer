<?php

$files = query_select('SELECT * FROM files_name WHERE user_id = 1;');



require_once 'views/file_list.php';