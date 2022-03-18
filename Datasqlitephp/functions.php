<?php
#functions file

$db = null;
#function connect db
function connect_to_db(){
     global $db;
     if (!$db) {
         $db = new SQLite3('mydata.db');
     }
}
#function create table
function create_tables(){
    global $db;

    $db->query("

        CREATE TABLE IF NOT EXISTS options(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        option_name TEXT NOT NULL,
        option_value TEXT NOT NULL 
        );
        ");
}
#option crud
#function create
function add_option($option_name, $option_value = null){

    global $db;

    connect_to_db();

    if (!$option_name){

        die("ERROR: Option name could not be null or empty. ");

    }

    if (!$option_value){

        $option_value = 0;

    }

    if (!option_exits($option_name)){
        $db->query("INSERT INTO options(option_name, option_value)
                          VALUES('$option_name', '$option_value');
    ");

    }else{

        $db->query("
                          UPDATE options 
                          SET option_value = '$option_value'
                          WHERE option_name = '$option_name'
                  ");
    }

}
#function read
function get_option($option_name, $full_row){

    global $db;

    connect_to_db();

    if (!$option_name){

        die("ERROR: Option name could not be null or empty. ");

    }

    $results = $db->query("
    
    SELECT *
     FROM options
     WHERE option_name = '$option_name'
    
    ");

    $row = $results->fetchArray(SQLITE3_ASSOC);

    if ($row){
        if ($full_row){
            return $row;
        }else{
            return $row['option_value'];
        }
    }else{
        return null;
    }

}
#function exist
function option_exits($option_name){

    $row = get_option($option_name, true);
    return isset($row['id']);
}
#function update
function update_option($option_name, $option_value = null){
    add_option($option_name, $option_value);
}
#function delete
function delete_option($option_name){
    global $db;
    if (!$option_name($option_name)){
       return;
    }
    $db->query("
                DELETE FROM options 
                WHERE option_name = '$option_name';
    
              ");

}