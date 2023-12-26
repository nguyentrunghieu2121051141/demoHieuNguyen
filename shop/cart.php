<?php
session_start();
ob_start();
include_once 'ketnoi.php';
if (isset($_GET['id'])) {
	$idsp = $_GET['id'];
}
// echo $idsp;

$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';

$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1 ;

// if ($quantity < 0) {
// 	$quantity =1;
// }

if ($quantity < 0) {
	$action = 'delete';
}

$query = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `idsanpham`= $idsp");
// var_dump($product);

if ($query) {
	$product = mysqli_fetch_assoc($query);
}
// var_dump($product);

$item = [
	'id' => $product['idsanpham'],
	'name' => $product['tensanpham'],
	'image' => $product['imgae'],
	'price' => ($product['giadaura'] > 0) ? $product['giadaura'] : $product['giadauvao'],
	'quantity' =>  $quantity //1
];


//thêm
if ($action == 'add') {
	if (isset($_SESSION['cart'][$idsp])) {
		$_SESSION['cart'][$idsp]['quantity'] += $quantity; //1
	} else {
		$_SESSION['cart'][$idsp] = $item;
	}
}

//cập nhật
if ($action == 'update') {
	$_SESSION['cart'][$idsp]['quantity'] = $quantity;
}

//xóa
if ($action == 'delete') {
	unset($_SESSION['cart'][$idsp]);
}
	header("location: view_cart.php");

	//thêm mới vào giỏ hàng

	//cập nhật giỏ hàng

	//xóa sản phẩm giỏ hàng
