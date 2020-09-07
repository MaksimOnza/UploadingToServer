<?php

$files = query_select('SELECT * FROM files_name WHERE user_id = ' . $_REQUEST['id'] . ';');
if(empty($files)){
    $files = [];
}
return render(['files'=>$files]);


