<?php

include ('config.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0){

    while ($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $username = $row['username'];
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION ['username'] = $username;
    }
    header("Location:panel.php");
}
else{
    echo "<p class='text-center badge badge-danger badge-pill'>"."ورود نا موفق"."</p>";
}
?>

<?php include ('template/Header.php'); ?>
<a href="login.php" class="btn btn-light" style="margin-left: 48%;">بازگشت</a>
<?php include ('template/Footer.php'); ?>
