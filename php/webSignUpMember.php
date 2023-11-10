<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Web đăng kí thành viên</title>
    </head>
    <body>
        
        Chào mừng <?php echo $_GET["name"]; ?> đã đăng kí thành công trang web của chúng tôi <br>
        Email của bạn là: <?php echo $_GET["mail"]; ?><br>
        Ngày sinh của bạn là: <?php echo $_GET["birth"]; ?><br>
        Mật khẩu bạn dùng để đăng nhập là: <?php echo $_GET["pass"]; ?><br>
        Mật khẩu nhập lại là: <?php echo $_GET["repass"]; ?><br>
         
    </body>
</html>