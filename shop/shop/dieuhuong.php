<?php
session_start();
ob_start();
require_once 'cart_function.php';
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sản phẩm</title>

    <link rel="stylesheet" href="main.css">

    <link rel="stylesheet" href="FontAwesome.Pro.6.3.0/css/all.css">

    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--  -->

    <style>
        .thanh{
            background-color: #212529;
        }
        .cart {
            width: 110px;
            height: auto;
            float: right;
            padding: 5px;
        }

        .cart>.g {
            color: black;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .cart>.i {
            color: black;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            box-sizing: border-box;
        }

        .thoat {
            width: 110px;
            height: auto;
            float: right;
            padding: 5px;
            box-sizing: border-box;
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="all">
        <div class="thanh" >
            <!-- tiêu đề shop -->
            <h1 class="header">
                <a class="nav-link" href="sanpham.php">SHOP BÁN ĐIỆN THOẠI</a>
            </h1>
            <div class="right">

            </div>
            <!-- tìm kiếm -->
            <form class="search" action="/shop/sanpham.php" method="get">
                <input type="text" name="search" id="search" >
                <input type="submit" value="Tìm kiếm" >
            </form>
            <!-- giỏ hàng -->
            <a href="view_cart.php" class="cart" style=" width: 110px; text-decoration:none;" >
                <span class="g"  style="color:#007BFF;"><i class="fa-solid fa-cart-shopping"></i> (<?php echo total_item($cart) ?>)</span>
            </a>
            <!-- tài khoản -->
            <a href="login.php" class="cart" style=" width: 110px; text-decoration:none;">
                
                <span class="g" style="color:#007BFF;"><div class="i"><i class="fa-solid fa-user"></i></div></span>
            </a>
            <div class="thoat">
                <?php
                if (isset($_SESSION['login']['username'])) {
                    echo "xin chao <b>{$_SESSION['login']['username']}</b> <br> 
                    <a href=\"logout.php\"><i class=\"fa-regular fa-right-from-bracket\"></i> Đăng xuất</a>";
                    
                } else {
                    echo "<a href=\"login.php\">Đăng nhập</a>";
                }
                ?>
            </div>
        </div>

        <div>
            <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">...</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">...</a>
                    </li>
                </ul>
                <!-- sắp xếp -->
                <form action="/shop/sanpham.php" method="get">
                    <select name="" id="optPrice" onchange="sortByPrice()">
                        <option value="none">Mặc định</option>
                        <option value="asc">Giá tăng dần</option>
                        <option value="desc">Giá giảm dần</option>
                    </select>
                </form>

                <div class="loc">
                    <!-- lọc -->
                    <form action="/shop/sanpham.php" method="get">
                        <input type="text" name="txtPriceMin" id="txtPriceMin" placeholder="Giá thấp nhất">
                        <input type="text" name="txtPriceMax" id="txtPriceMax" placeholder="Giá cao nhất">
                        <input type="submit" value="Lọc">
                    </form>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>