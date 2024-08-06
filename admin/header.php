<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title>admin</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <div class="container">
        <div class="admin__aside">
            <div class="admin__aside-title">
                Drashboard
            </div>
            <div class="admin__aside-nav">
                <ul style=' padding-left:0;'>
                    <li class="<?php if(isset($list_home_active)){echo 'active_color';} ?>"><a href="?act=home"> <i
                                class="fa-solid fa-house" style="margin: 0 10px; color:#1f1d1d"></i>Trang
                            chủ</a>
                    </li>
                    <li class="<?php if(isset($list_sanpham_active)){echo 'active_color';} ?>"> <a
                            href="./?act=list_sp"> <i class="fa-solid fa-cart-shopping"
                                style="margin: 0 10px; color:#1f1d1d"></i>Sản phẩm</a> </li>
                    <li class="<?php if(isset($list_dm_active)){echo 'active_color';} ?>"> <a href="./?act=list_dm"><i
                                class="fa-solid fa-list" style="margin: 0 10px; color:#1f1d1d"></i>
                            Danh mục</a></li>
                    <li class="<?php if(isset($list_kh_active)){echo 'active_color';} ?>"> <a href="./?act=dskh"> <i
                                class="fa-solid fa-user" style="margin: 0 10px; color:#1f1d1d"></i>Khách hàng</a></li>
                    <li class="<?php if(isset($list_tk_active)){echo 'active_color';} ?>"> <a href="./?act=thongke"><i
                                class="fa-solid fa-chart-simple" style="margin: 0 10px; color:#1f1d1d"></i> Thống kê</a>
                    </li>
                    <li class="<?php if(isset($list_bl_active)){echo 'active_color';} ?>"> <a href="./?act=dsbl"><i
                                class="fa-solid fa-comment" style="margin: 0 10px; color:#1f1d1d"></i>Bình luận</a></li>
                    <li class="<?php if(isset($list_dh_active)){echo 'active_color';} ?>"> <a
                            href="./?act=list_donhang"><i class="fa-solid fa-tags"
                                style="margin: 0 10px; color:#1f1d1d"></i>Đơn hàng</a></li>
                    <li> <a href="../?act=home"><i class="fa-solid fa-house-user"
                                style="margin: 0 10px; color:#1f1d1d"></i>Về trang người dùng</a></li>

                </ul>
            </div>
        </div>
        <div class="admin__article">
            <div class="admin__article__header">
                <div class="search">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="decor">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-solid fa-bell"></i>
                    <i class="fa-solid fa-circle-user"></i>
                </div>
            </div>
            <script>
            function changeBackground(currentClick) {
                var list_li = document.querySelectorAll('li')
                console.log(list_li)
                console.log(currentClick)

                for (var i = 0; i < list_li.length; i++) {
                    list_li[i].style.backgroundColor = '';
                }
                currentClick.style.backgroundColor = '#c3c4c6';

            }
            </script>