<?php

//create_table();

function open_db()
{
    return new \SQLite3('mysqlitedb.db');

}


function query($query)
{
    $db = open_db();
    $statemant = $db->query($query);
    $results = [];
    while ($row = $statemant->fetchArray()) {
        $results[] = $row;
    }
    return $results;
}


function query_select($query)
{
    $db = open_db();
    $statement = $db->prepare($query);
    $stmt = $statement->execute();
    $results = [];
    while ($row = $stmt->fetchArray(1)) {
        $results[] = $row;
    }
    $statement->close();
    return $results;
}

function query_select2($query, $bind_values)
{
    $db = open_db();
    $statemant = $db->prepare($query);
    foreach($bind_values as $key=>$value){
        $statemant->bindValue($key, $value, SQLITE3_TEXT);
    }
    $stmt = $statemant->execute();
    $results = [];
    while ($row = $stmt->fetchArray(1)) {
        $results[] = $row;
    }
    $statemant->close();
    return $results;
}

function query_insert($file_name, $file_path, $user_id)
{
    $db = open_db();
    $statemant = $db->prepare("INSERT INTO files_name(file_name, file_path, user_id) VALUES(:file_name,:file_path, :user_id)");
    $statemant->bindValue(':file_name', $file_name, SQLITE3_TEXT);
    $statemant->bindValue(':file_path', $file_path, SQLITE3_TEXT);
    $statemant->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
    $stmt = $statemant->execute();

    $statemant->close();
}

function query_insert_user($user_login, $user_password)
{
    $db = open_db();
    $statemant = $db->prepare("INSERT INTO users(login_user, pass_user) VALUES(:login,:password)");
    $statemant->bindValue(':login', $user_login, SQLITE3_TEXT);
    $statemant->bindValue(':password', $user_password, SQLITE3_TEXT);
    $stmt = $statemant->execute();
    $statemant->close();
}

function create_table()
{
    execute('CREATE TABLE IF NOT EXISTS files_name (
            id_file integer PRIMARY KEY,
            file_name text NOT NULL,
            file_path text NOT NULL,
            user_id integer NOT NUll
            );');
}


function execute($query)
{
    $db = open_db();
    return $db->exec($query);
}