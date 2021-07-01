<?php include "template/Header.php"; ?>

    <div class="jumbotron" style="margin-left: 200px; margin-right: 200px; margin-top: 15px">

        <form method="post" action="login_action.php" style="margin-left: 70px; margin-right: 70px">
            <div class="form-group">
                <label for="username" style="margin-left:675px ">نام کاربری</label>
                <input type="text" name="username" class="form-control" id="username" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" style="margin-left:685px ">رمز عبور</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <input type="submit" name="register" value="ورود" class="btn btn-block btn-outline-success btn-block badge-pill" style="font-size: 16px">
        </form>

    </div>



<?php include "template/Footer.php"; ?>