<?php
include ('config.php');

$username = $password = '';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "INSERT INTO login(username, password)
                      VALUES ('$username','$password')";

$result = mysqli_query($conn,$query);
if ($result){
    header("Location:login.php");
}
else{
    echo "ERROR : " .$query;
}