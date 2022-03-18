<?php

ob_start();

include ('template/Header.php');
include ('config.php');

$id = $_GET['id'];
$query   = "SELECT * FROM login WHERE id = '$id'";
$result   = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>


<div class="container" style="position: relative;">
        <div class="jumbotron" style="margin-left: 200px; margin-right: 200px; margin-top: 15px">

            <form method="post" action="" style="margin-left: 70px; margin-right: 70px">
                <div class="form-group">
                    <label for="username" style="margin-left:450px ">نام کاربری</label>
                    <input type="text" value="<?php echo $row['username'];?>" name="username" class="form-control" id="username" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" style="margin-left:450px ">رمز عبور</label>
                    <input type="text" value="<?php echo $row['password'];?>" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <input type="submit" name="edit" value="ویرایش" class="btn btn-block btn-outline-success btn-block badge-pill" style="font-size: 16px">
            </form>
        </div>
        </div>
</div>

<?php

if (isset($_POST['edit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "UPDATE login SET username='$username', password='$password' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header('location:panel.php');
    } else {
        echo 'error';
    }
}

include ('template/Footer.php');
?>
