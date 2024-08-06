<?php
    //thêm thông tin vào hóa đơn
    function insert_hoadon($id_tk,$id_cart,$tong_tien,$httt){
        $conn=pdo_get_connection();
        $sql= "insert into hoa_don(id_tk,id_giohang,tong_tien,httt) values(?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$id_tk,$id_cart,$tong_tien,$httt]);
        $lastID= $conn->lastInsertId();
        return $lastID;   
    }

    //thêm sản phẩm vào chi tiết hóa đơn
    function insert_cthd($id_hoadon,$id_sp,$so_luong,$gia){
        $sql = "insert into chi_tiet_hoadon(id_hoadon,id_sp,so_luong,gia) values(?, ?, ?, ?)";
        pdo_execute($sql ,$id_hoadon,$id_sp,$so_luong,$gia);
    }
    //Thêm thông tin người nhận
    function insert_nguoinhan($id_hoadon,$ho_ten,$sdt,$email,$dia_chi){
        $sql = "insert into thong_tin_nguoi_nhan(id_hoadon,ho_ten,sdt,email,dia_chi_nhan_hang) values(?, ?, ?, ?, ?)";
        pdo_execute($sql, $id_hoadon,$ho_ten,$sdt,$email,$dia_chi);
    }
    // lấy danh sách hóa đơn theo tài khoản
    function get_hd_idtk($id_tk){
        $sql = "select * from hoa_don where id_tk =? order by id desc";
        return pdo_query($sql,$id_tk);
    }
    function get_hd_static($id_tk,$static){
        $sql = "select * from hoa_don where id_tk =? and trang_thai=? order by id desc";
        return pdo_query($sql,$id_tk,$static);
    }
    // lấy chi tiết hóa đơn theo id hóa đơn
    function get_cthd_id($id_hd){
        $sql="select * from chi_tiet_hoadon where id_hoadon=? order by id desc";
        return pdo_query($sql,$id_hd);

    }
   function change_donhang($change,$id){
    $sql="update hoa_don set trang_thai=? where id=?";
    pdo_execute($sql,$change,$id);
   }
   // Lấy dữ liệu từ hóa đơn và tên tài khoản
   function get_all_hoadon(){
    $sql = "SELECT hoa_don.*, tai_khoan.ten_dang_nhap FROM hoa_don JOIN tai_khoan ON hoa_don.id_tk=tai_khoan.id order by hoa_don.id desc";
    return pdo_query($sql);
   } 
   // lấy sản phẩm trong chi tiết hóa đơn theo id hóa đơn
   function get_sp_cthd($id_hd){
    $sql = "select * from chi_tiet_hoadon where id_hoadon=? order by id desc";
    return pdo_query($sql,$id_hd);
   }
?>