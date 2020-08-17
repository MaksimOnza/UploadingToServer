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


function query_select(){
    $db = open_db();
    $statement = $db->prepare('SELECT * FROM files_name');
    $stmt = $statement->execute();
    $results = [];
    while($row = $stmt->fetchArray()){
        $results[] = $row;
    }
    $statement->close();
    return $results;
}

function query_insert($file_name, $file_path){
    $db = open_db();
    $statemant = $db->prepare("INSERT INTO files_name(file_name, file_path) VALUES(:file_name,:file_path)");
    $statemant->bindValue(':file_name', $file_name, SQLITE3_TEXT);
    $statemant->bindValue(':file_path', $file_path, SQLITE3_TEXT);
    $stmt = $statemant->execute();
    //Дублирует запись. Почему?????
    /*$results = [];
    while($row = $stmt->fetchArray()){
        $results[] = $row;
    }*/
    $statemant->close();
    /*return $results;*/
}

function create_table(){
    execute('CREATE TABLE IF NOT EXISTS files_name (
            id_file integer PRIMARY KEY,
            file_name text NOT NULL,
            file_path text NOT NULL
            );');
}


function execute($query){
    $db = open_db();
    return $db->exec($query);
    }