<?php

$id = $_SESSION['user_id'];
$links = [query_select("SELECT * FROM list_links WHERE target_user = ?", [1 => $id])][0];
$users = query_select("SELECT * FROM users");
return render('file_list', ['links' => $links, 'users' => $users]);