<?php
include '../header.php';
require_once '../connect.php';

$id = !empty($_GET['Catid']) ? (int)$_GET['Catid'] : 0;
$query = mysqli_query($conn, "SELECT * FROM catelog WHERE catelogid = $id");
$row = mysqli_fetch_assoc($query);
$error = '';
if (isset($_POST['catelogname'])) {
    $name = $_POST['catelogname'];
    if (empty($name)) {
        $error = 'Tên nhãn hàng không được để trống';
    }
    // nếu không có lỗi thì tiến hành thêm mới vào bảng
    if (!$error) {
        $sql = "UPDATE catelog SET catelogname = '$name' WHERE catelogid = $id";
        if (mysqli_query($conn, $sql)) {
            header('location: Nhan_hang/nhan_hang.php');
        } else {
            $error = 'Tên nhãn hàng này đã được sử dụng';
        }
    }
}
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sửa nhãn hàng</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Tên nhãn hàng</label>
                <input type="text" class="form-control" name="catelogname" value="<?php echo $row['catelogname']; ?>">
                <?php if ($error) : ?>
                    <small class="help-block"><?php echo $error; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </form>
    </div>
</div>