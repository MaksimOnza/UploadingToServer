<?php

$id = $_SESSION['user_id'];
$links = query_select("SELECT * FROM list_links JOIN users ON list_links.own_user = users.id_user WHERE target_user = ?", [1 => $id]);
$users = query_select("SELECT * FROM users");

$name_users = [];
foreach ($users as $name_user) {
    $name_users[$name_user['id_user']] = $name_user['login_user'];
}

return render('file_list', ['links' => $links, 'users' => $users, 'name_users' => $name_users]);