<?php
include '../header.php';
require_once '../connect.php';
// Truy vấn dữ liệu bảng lớp học
$color = mysqli_query($conn, "SELECT * FROM color");
?>

<?php
$error = '';
if (isset($_POST['colorname'])) {
    $id = $_POST['colorid'];
    $name = $_POST['colorname'];
    if (empty($name)) {
        $error = 'Tên màu sắc không được để trống';
    }
    // nếu không có lỗi thì tiến hành thêm mới vào bảng
    if (!$error) {
        $sql = "INSERT INTO color(colorid, colorname) VALUES('$id', '$name')";
        if (mysqli_query($conn, $sql)) {

            //Nếu thêm mới thành công, chuyển hướng trang

            header('location: mau_san_pham.php');
        } else {

            // echo mysqli_error($conn);
            $error = 'Có lỗi, vui lòng thử lại';
        }
    }
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Thêm mới màu sản phẩm</h3>
    </div>
    <div class="panel-body">
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Mã màu sắc</label>

                <input type="number" min="0" class="form-control" name="colorid" placeholder="Nhập mã màu sắc">

            </div>
            <div class="form-group">
                <label for="">Tên màu sắc</label>

                <input type="text" class="form-control" name="colorname" placeholder="Nhập tên màu sắc">

            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
        </form>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh sách màu sản phẩm</h3>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên màu sắc</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- duyệt dữ liệu sử dụng vòng lặp foreach -->
            <?php foreach ($color as $row) : ?>
                <tr>
                    <td><?php echo $row['colorid']; ?></td>
                    <td><?php echo $row['colorname']; ?></td>
                    <td><?php echo $row['status'] == 1 ? 'Đang hoạt động' : 'Khóa'; ?></td>
                    <td>
                        <a href="/shop/backend/Mau_san_pham/sua_mau_sp.php?Colid=<?php echo $row['colorid']; ?>" class="btn btn-xs btn-primary">Sửa</a>
                        <a href="/shop/backend/Mau_san_pham/xoa_mau_sp.php?Colid=<?php echo $row['colorid']; ?>" class="btn btn-xs btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>