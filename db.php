<?php

//create_table();

function open_db(){
    $db =  new \SQLite3('mysqlitedb.db');
    return $db;

}


function query($query){
    $db = open_db();
    $statemant = $db->query($query);
    $results = [];
    while($row = $statemant->fetchArray()){
        $results[] = $row;
    }
    return $results;
}


function query_select($query){
    $db = open_db();
    $statement = $db->prepare($query);
    $stmt = $statement->execute();
    $results = [];
    while($row = $stmt->fetchArray(1)){
        $results[] = $row;
    }
    $statement->close();
    return $results;
}

function query_insert($file_name, $file_path, $user_id){
    $db = open_db();
    $statemant = $db->prepare("INSERT INTO files_name(file_name, file_path, user_id) VALUES(:file_name,:file_path, :user_id)");
    $statemant->bindValue(':file_name', $file_name, SQLITE3_TEXT);
    $statemant->bindValue(':file_path', $file_path, SQLITE3_TEXT);
    $statemant->bindValue(':user_id', $user_id, SQLITE3_INTEGER);
    $stmt = $statemant->execute();
    
    $statemant->close();
}

function create_table(){
    execute('CREATE TABLE IF NOT EXISTS files_name (
            id_file integer PRIMARY KEY,
            file_name text NOT NULL,
            file_path text NOT NULL,
            user_id integer NOT NUll
            );');
}


function execute($query){
    $db = open_db();
    return $db->exec($query);
    }
/*
    ('CREATE TABLE IF NOT EXISTS users (
            id_user integer PRIMARY KEY,
            login_user text NOT NULL,
            pass_user text NOT NULL
            );');

    ("INSERT INTO user(login_user, pass_user) VALUES(admin, admin)")*/