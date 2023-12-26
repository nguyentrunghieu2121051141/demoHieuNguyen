<?php
include '../header.php';
require_once '../connect.php';

$id = !empty($_GET['Colid']) ? (int)$_GET['Colid'] : 0;
$query = mysqli_query($conn, "SELECT * FROM color WHERE colorid = $id");
$row = mysqli_fetch_assoc($query);
$error = '';
if (isset($_POST['colorname'])) {
    $idcol = $_POST['colorid'];
    $name = $_POST['colorname'];
    if (empty($name)) {
        $error = 'Tên màu sắc không được để trống';
    }
    // nếu không có lỗi thì tiến hành thêm mới vào bảng
    if (!$error) {
        $sql = "UPDATE color SET colorid = '$idcol', colorname = '$name' WHERE colorid = $id";
        if (mysqli_query($conn, $sql)) {
            header('location: mau_san_pham.php');
        } else {
            $error = 'Tên màu này đã được sử dụng';
        }
    }
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sửa màu sản phẩm</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Tên nhãn hàng</label>
                <input type="number" min="0" class="form-control" name="colorid" value="<?php echo $row['colorid']; ?>">
            <div class="form-group">
                <label for="">Tên nhãn hàng</label>
                <input type="text" class="form-control" name="colorname" value="<?php echo $row['colorname']; ?>">
                <?php if ($error) : ?>
                    <small class="help-block"><?php echo $error; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </form>
    </div>
</div>