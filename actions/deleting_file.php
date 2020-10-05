<?php

$id_file = $_POST['id_file'];
$id_current_user = $_SESSION['user_id'];


if (!is_numeric($id_file)) {
    return false;
}
$query = 'SELECT  own_user FROM list_files WHERE id_file = ?';
$file = query_select($query, [1 => $id_file])[0];
$own_user = $file['own_user'];

if ($own_user != $id_current_user) {
    $query = 'DELETE FROM list_links WHERE id_file = ? AND target_user = ?';
    query_delete($query, [1 => $id_file, 2 => $id_current_user]);
} else {
    $query = 'DELETE FROM list_files WHERE id_file = ?';
    query_delete($query, [1 => $id_file]);
    $query = 'DELETE FROM list_links WHERE id_file = ?';
    query_delete($query, [1 => $id_file]);
}


header('location: index.php/?path=file_list&id=' . $id_current_user . '');