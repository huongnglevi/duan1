<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style-home.css" />
</head>

<body>
    <div class="container">
        <!-- header-menu -->
        <div class="header">
            <div class="logo">
                <img src="./assets/img/logo.jpg" alt="" />
            </div>
            <nav>
                <ul>
                    <li><a href="?act=home">Trang chủ</a></li>
                    <li><a href="?act=product">Sản phẩm</a></li>
                    <li><a href="?act=don_hang">Đơn hàng</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
            <div class="box">
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search..." />
                </div>
                <div class="cart_user">
                    <div class="cart">
                        <a href="?act=gio_hang">
                            <i class="fa-solid fa-cart-shopping" style="color: black"></i>
                        </a>
                    </div>
                    <div class="user" style="padding: 0 20px;">
                        <a href="?act=login">
                            <i class="fa-solid fa-user" style="color: black"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>