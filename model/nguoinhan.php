<?php 
    // Lấy thông tin người nhận từ id hóa đơn
    function get_nguoinhan($id_hoadon){
        $sql="select * from thong_tin_nguoi_nhan where id_hoadon=?";
        return pdo_query_one($sql,$id_hoadon);

    }
?>