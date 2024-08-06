<?php
    function load_thongke_sanpham_danhmuc(){
        $sql = "select danhmuc.id, danhmuc.ten_danhmuc, COUNT(*) 'so_luong' from danhmuc join san_pham on danhmuc.id = san_pham.id_dm group by danhmuc.id, danhmuc.ten_danhmuc
        order by so_luong desc";
        return pdo_query($sql);
    }
    function load_thongke_doanhthu(){
        $sql = "SELECT MONTH(created_at) AS thang, COUNT(*) AS so_luong_donhang, SUM(hoa_don.tong_tien) AS tong_doanh_thu FROM hoa_don WHERE YEAR(created_at) = 2023 AND trang_thai = 3 GROUP BY MONTH(created_at)";
        return pdo_query($sql);
    }
    function load_thongke_sanpham_theongay(){
        $sql = "SELECT date(hoa_don.created_at) as ngay, SUM(tong_tien) as total,COUNT(id) as so_luong FROM hoa_don where hoa_don.trang_thai = 3 GROUP BY date(hoa_don.created_at);";
        return pdo_query($sql);
    }
?>