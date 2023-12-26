<?php
    $conn = mysqli_connect("localhost" , "root" , "" , "shop");

    // Hàm định dạng tiền tệ
function formatCurrency($curr){
	$fmt = numfmt_create("vi_VN", NumberFormatter::CURRENCY);
	return numfmt_format_currency($fmt, $curr, "VND");
}

// Hàm định dạng số
function formatNumber($num, $decimal){
	return number_format($num, $decimal, ',', '.'); 
}
