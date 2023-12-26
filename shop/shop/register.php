<?php
ob_start();
include_once 'ketnoi.php';
if (isset($_POST['dangky']) &&
    isset($_POST['name']) !='' &&
    isset($_POST['phone']) !='' &&
    isset($_POST['address']) !='' &&
    isset($_POST['email']) !='' &&
    isset($_POST['username']) !='' &&
    isset($_POST['password']) !='') {
    $name = $_POST['name'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['address'];
    $email = $_POST['email'];
    $use = $_POST['username'];
    $pas = $_POST['password'];
    $pas = md5($pas);

    $sql = "INSERT INTO `khachang`(`tenkhachhang`, `phone`, `address`, `email`, `username`, `matKhau`) VALUES 
    ('$name','$sdt','$diachi','$email','$use','$pas')";
    // echo $sql; exit;

    $dk_sql = mysqli_query($conn,$sql);

    if ($dk_sql) {
        echo "đăng ký tài khoản thành công";
    }else{
        echo "đăng ký tài khoản thất bại";
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
            <legend>Đăng Ký</legend>
            <div class="form-group">
                <label for="">họ và tên</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">số điện thoại</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="">địa chỉ</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">tên đăng nhập</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">mật khẩu</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="dangky" class="btn btn-primary">đăng ký</button>

            <div class="form-group">
                bạn đã có tài khoản <a href="login.php" class="btn btn-primary">Đăng Nhập</a>
            </div>
        </form>
    </div>
</body>

</html>