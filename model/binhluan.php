<?php
    function add_binhluan($noi_dung, $id_tk, $id_sp, $ngay_bl){
    $sql = "insert into binh_luan (noi_dung, id_tk, id_sp, ngay_bl) values('$noi_dung','$id_tk','$id_sp','$ngay_bl')";
    pdo_execute($sql);
    }
    function danhsach_binhluan(){
        $sql = "SELECT binh_luan.id, binh_luan.noi_dung, tai_khoan.ten_dang_nhap, san_pham.ten_sp, binh_luan.id_sp, binh_luan.ngay_bl FROM binh_luan LEFT JOIN tai_khoan ON binh_luan.id_tk = tai_khoan.id LEFT JOIN san_pham ON san_pham.id = binh_luan.id_sp;";
        $result = pdo_query($sql);
        return $result;
    }
    function delete_binhluan($id){
        $sql = "delete from binh_luan where id = $id";
        pdo_execute($sql);
    }
?>