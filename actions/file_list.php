<?php

$files = query_select('SELECT * FROM files_name WHERE user_id = ' . $_REQUEST['id'] . ';');

$content = render('file_list', $files);
ob_clean();
render('template', $content);

