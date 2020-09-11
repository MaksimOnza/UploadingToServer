<?php

if(!id_validation_check($_REQUEST['id'])){
    return 'WRONG id!';
}
$id = $_REQUEST['id'];
$files = query_select('SELECT * FROM files_name WHERE user_id = ' . $id . ';');
if(empty($files)){
    $files = [];
}
return render($_REQUEST['path'], ['files'=>$files]);


