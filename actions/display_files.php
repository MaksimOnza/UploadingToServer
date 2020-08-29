<?php
require_once 'db.php';

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