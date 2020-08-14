<?php

create_table();

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