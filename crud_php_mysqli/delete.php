<?php
include ('config.php');
$id = $_GET["id"];

$query = "DELETE FROM login WHERE id=$id";
mysqli_query($conn, $query);
header("Location:panel.php");
