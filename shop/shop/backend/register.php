<?php
ob_start();
// nạp trang
include_once 'connect.php';
if (
    isset($_POST['dangky']) &&
    isset($_POST['username']) != '' &&
    isset($_POST['password']) != '' &&
    isset($_POST['repassword']) != '' &&
    isset($_POST['level'])
) {
    $name = $_POST['username'];
    $pas = $_POST['password'];
    $repass = $_POST['repassword'];
    $lev = $_POST['level'];
    $pas = md5($pas);
    $repass = md5($repass);

    if ($_POST['password'] != $_POST['repassword']) {
        echo "MẬT KHẨU KHÔNG KHỚP NHAU";
    } else {
        $sql = "INSERT INTO `admin`(`username`, `password`, `repassword`, `level`) VALUES 
            ('$name','$pas','$repass','$lev')";
        // echo $sql; exit;

        $dk_sql = mysqli_query($conn, $sql);

        if ($dk_sql) {
            echo "đăng ký tài khoản thành công";
        } else {
            echo "đăng ký tài khoản thất bại";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <!--  -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->

</head>

<body>
    <div class="col-md-4 col-md-offset-4">
        <form action="register.php" method="post">
            <legend>Đăng ký</legend>
            <div class="form-group">
                <label for="">tên đăng nhập</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">mật khẩu</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">nhập lại mật khẩu</label>
                <input type="password" name="repassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="">level</label>
                <input type="number" name="level" class="form-control">
            </div>
            <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>

            <div class="form-group">
                Bạn đã có tài khoản, hãy: <a href="login.php" class="btn btn-primary">Đăng Nhập</a>
            </div>
        </form>
    </div>
</body>

</html>