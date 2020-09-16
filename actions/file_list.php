<?php

$id = $_SESSION['user_id'];
$files = query_select("SELECT * FROM files_name WHERE user_id = ?", [1 => $id]);
$users = query_select("SELECT * FROM users");
return render('file_list', ['files' => $files, 'users' => $users]);