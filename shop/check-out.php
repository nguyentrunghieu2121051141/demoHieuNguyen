<?php
ob_start();
require_once 'dieuhuong.php';
require_once 'ketnoi.php';

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$sql = mysqli_query($conn, "SELECT * FROM `khachang`");
if ($res = mysqli_fetch_assoc($sql)) {
    if (isset($_POST['username'])) {
        // var_dump($_POST);
        $id = $res['idkhachhang'];
        $name = $res['username'];
        $email = $res['email'];
        $sdt = $res['phone'];
        $address = trim($_POST['address']);
        $pre = total_price($cart);
        $query = mysqli_query($conn, "INSERT INTO `hoadon`(`idkhachhang`,`name`, `address`, `phone`, `email`,`Tong_tien`) 
            VALUES ('$id','$name','$address','$sdt','$email','$pre')");

        if ($query) {
            $idhd = mysqli_insert_id($conn);
            foreach ($cart as $value) {
                $idsp = $value['id'];
                $dongia = $value['price'];
                $qat = $value['quantity'];
                $donhang = mysqli_query($conn, "INSERT INTO `chitietdonhang`(`idhoadon`,`idsanpham`, `dongia`, `soluong`) 
                    VALUES ('$idhd','$idsp','$dongia','$qat')");
            }
            unset($_SESSION['cart']);
            header('location: sanpham.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hiển thị giỏ hàng</title>
    <style>
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .flex-1 {
            flex: 1;
            padding: 10px;
            box-sizing: border-box;
        }

        .flex-2 {
            flex: 1;
            padding: 10px;
            box-sizing: border-box;
        }

        .k {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php if (isset($_SESSION['login']['username'])) { ?>
        <!-- nút thanh toán -->
        <form action="" method="post">
            <div class="container">
                <div class="flex-1">
                    <?php $sql = mysqli_query($conn, "SELECT * FROM `khachang`"); ?>
                    <?php if ($res = mysqli_fetch_assoc($sql)) { ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Ho & Tên</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $res['username'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $res['email'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Só Điện Thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $res['phone'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Địa Chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $res['address'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="pwd">Ghi Chú</label>
                                <textarea name="note" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </form>
                    <?php } ?>
                </div>

                <div class="flex-2">
                    <h2>Thông Tin Đơn Hàng</h2>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $key => $value) {  ?>
                                <tr>
                                    <td><?php echo $value['name'] ?></td>
                                    <td style="width: 30px;">
                                        <?php echo $value['quantity'] ?>
                                    </td>
                                    <td><?php echo $value['price'] ?></td>
                                    <td><?php echo number_format($value['price'] * $value['quantity']) ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>Tổng Tiền</td>
                                <td colspan="6" style="text-align: center;"><?php echo number_format(total_price($cart)) ?> VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                    <button href="check-out.php" class="btn btn-info">Thanh Toán</button>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <div class="k">
            <h1>Vui Lòng ĐĂNG NHẬP Để Mua Hàng </h1> <a href="login.php?action=check-out">Tại Đây</a>
        </div>
    <?php } ?>
</body>

</html>