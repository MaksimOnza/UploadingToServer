<?php
require_once('db.php');

function insert_file($uploaddir, $nameInputForm)
{
    $file_path = $uploaddir . basename($_FILES[$nameInputForm]['name']);
    $file_name = basename($_FILES[$nameInputForm]['name']);
    query_insert($file_name, $file_path, 1);
    //execute('INSERT INTO files_name(file_name, file_path) VALUES("'.$file_name.'","'.$file_path.'")');
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $file_path);
}

function out_list_file($query)
{
    $list_db = query_select($query);
    print '<div class="alert alert-danger" role="alert">';
    foreach ($list_db as $row) {
        print $row['id_file'] . ' ' . '<a href="/script.php?id=' . $row['id_file'] . '">' . $row['file_name'] . '</a> <br/>';
    }
    print '</div>';
    return $list_db;
}

function out_list_in_htmlselect($query)
{
    $list_db = query_select($query);
    foreach ($list_db as $row) {
        print '<option >' . $row['file_name'] . '</option>';
    }
}

out_list_file('SELECT * FROM files_name WHERE user_id = 1;');
    if(!empty($_FILES)){
        insert_file('upload/', 'inputFile');
    }
    $for_js = query_select('SELECT * FROM files_name WHERE user_id = 1;');