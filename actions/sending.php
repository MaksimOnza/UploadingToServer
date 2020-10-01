<?php
print 'IN SENDING';
$id_file = $_POST['id_file'];
$target_user = $_POST['target_user_id'];

if($target_user != $_SESSION['user_id']){
    if (!is_numeric($id_file)) {
        return false;
    }

    $query = "SELECT name_file, path_file, own_user FROM list_links WHERE id_file = ?";
    $file = query_select($query, [1 => $id_file])[0];
    $name_file = $file['name_file'];
    $path_file = $file['path_file'];
    $own_user = $file['own_user'];

    if (!is_numeric($target_user)) {
        return false;
    }

    $query = "INSERT INTO list_links(name_file, id_file, path_file, target_user, own_user) VALUES(?, ?, ?, ?, ?)";
    query_insert($query, [
        1 => $name_file,
        2 => $id_file,
        3 => $path_file,
        4 => $target_user,
        5 => $own_user,
    ]);
}
