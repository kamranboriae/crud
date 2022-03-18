<?php

$host = 'localhost';
$user = 'root';
$pass = "";
$db = "test";

$conn = mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    echo "Error Connection Database". mysqli_connect_error();
}

