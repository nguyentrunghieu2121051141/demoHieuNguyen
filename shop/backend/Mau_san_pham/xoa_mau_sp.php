<?php
include '../header.php';
require_once '../connect.php';
// lấy id trên tham số url đã gửi tù nút xóa
$id = !empty($_GET['Colid']) ? (int)$_GET['Colid'] : 0;
$deleted = mysqli_query($conn, "DELETE FROM color WHERE colorid = $id");
if ($deleted) {
    header('location: mau_san_pham.php');
} else {
    echo 'Có lỗi, vui lòng kiểm tra lại';
}
?>