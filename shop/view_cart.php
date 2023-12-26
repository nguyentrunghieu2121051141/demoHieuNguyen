<?php
require_once 'dieuhuong.php';

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hiển thị giỏ hàng</title>
</head>

<body>
    <div class="container">
        <h2>GIỎ HÀNG</h2>
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Tiền</th>
                    <th>Xóa Khỏi Cart</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $key => $value) {  ?>
                    <tr>
                        <td><?php echo $key++ ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><img src="uploads/<?php echo $value['image'] ?>" alt="" style="width: auto; height: 100px;"></td>
                        <td style="width: 30px;">
                            <form action="cart.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                <input type="text" name="quantity" class="" value="<?php echo $value['quantity'] ?>">
                                <button type="submit" name="" class="">cập nhật</button>
                            </form>
                        </td>
                        <td><?php echo $value['price'] ?></td>
                        <td><?php echo number_format($value['price'] * $value['quantity']) ?></td>
                        <td><a href="cart.php?id=<?php echo $value['id'] ?>&action=delete" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>Tổng Tiền</td>
                    <td colspan="6" style="text-align: center;"><?php echo number_format(total_price($cart)) ?> VNĐ</td>
                </tr>
            </tbody>
        </table>
        <a href="check-out.php" class="btn btn-info">Thanh Toán</a>
    </div>
</body>

</html>