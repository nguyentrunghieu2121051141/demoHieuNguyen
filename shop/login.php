<?php
session_start();
ob_start();
include_once 'ketnoi.php';
// if (isset($_POST['dangnhap'])) {
if (isset($_POST['username']) != '' && isset($_POST['password']) != '') {
    $use = $_POST['username'];
    $pass = $_POST['password'];
    $pass = md5($pass);
    // echo $use, $pass;
    $sql = "SELECT * FROM `khachang` WHERE username = '$use' AND matKhau = '$pass'";
    $use_sql = mysqli_query($conn, $sql);

    if (mysqli_num_rows($use_sql) > 0) {
        echo "đăng nhập thành công";
        if (isset($_get['action'])) {
            $action = $_get['action'];
            header('location: ' . $action . '.php');
        } else {
            header('location: sanpham.php');
        }
    } else {
        echo "thông tin tài khoản hoặc mật khẩu không chính xác";
    }
    $_SESSION['login']['username'] = $use;
    $_SESSION['login'];
}
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

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
    <?php
    // require_once 'dieuhuong.php';
    ?>
    <div class="col-md-4 col-md-offset-4">
        <form action="login.php" method="post">
            <legend>Đăng nhập</legend>
            <div class="form-group">
                <label for="">username</label>
                <input type="text" name="username" placeholder="nhập tài khoản" class="form-control">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" placeholder="nhập mật khẩu" class="form-control">
            </div>
            <button type="submit" name="dangnhap" class="btn btn-primary">Đăng Nhập</button>

            <div class="form-group">
                Bạn chưa có tài khoản, hãy: <a href="register.php" class="btn btn-primary">Đăng Ký</a>

            </div>
        </form>
    </div>
</body>

</html>
