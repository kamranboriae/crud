<?php include ("template/Header.php"); ?>
<?php include ("config.php")?>
    <div class="container" style=" direction: rtl; position: relative">
        <div class="jumbotron" style="margin-left: 200px; margin-right: 200px; margin-top: 15px">
            <table class="table table-hover table-primary">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام کاربری</th>
                    <th scope="col">رمز عبور</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $query = "SELECT * FROM login";

                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result) > 0){

                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                                <a href="edit.php?id= <?php  echo $row['id']; ?>" class="btn btn-warning">ویرایش</a>
                                <a href="delete.php?id= <?php  echo $row['id']; ?>" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>


                </tbody>
            </table>
        </div>
    </div>

<?php include ("template/Footer.php"); ?>