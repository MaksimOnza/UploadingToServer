<?php

$id = $_SESSION['user_id'];
$files = query_select2("SELECT * FROM files_name WHERE user_id = ?", [1 => $id]);

return render('file_list', ['files' => $files]);