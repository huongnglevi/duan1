<?php
    //thêm sản phẩm vào giỏ hàng
    //thêm id tk vào bảng giỏ hàng
    function insert_tk_cart($id_tk){
        $conn=pdo_get_connection();
        $sql="insert into gio_hang(id_tk) values(?) ";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$id_tk]);
       $lastID=$conn->lastInsertId();
       return $lastID;
    }
   //Kiểm tra id tk có trong giỏ hàng chưa, nếu có r thì không thêm id tk nx
   function check_idtk_cart($id_tk){
    $sql="select * from gio_hang where id_tk=?";
    return pdo_query_one($sql,$id_tk);
   } 
   //lấy id giỏ hàng từ id tk;
   function get_id_cart($id_tk){  
    $sql= "select id from gio_hang where id_tk=?";
    return pdo_query_one($sql,$id_tk);
   }
   //Kiểm tra sản phẩm có trong chi tiết sản phẩm chưa
   function check_idsp_ctgh($id_sp,$id_cart){
    $sql= "select * from chi_tiet_giohang where id_sp=? and id_giohang=?";
    return pdo_query_one($sql,$id_sp,$id_cart);
   }
   // update số lượng sản phẩm trong chi tiết sản phẩm + số lượng
   function update_soluong($so_luong,$id_sp){
    $sql="update chi_tiet_giohang set so_luong = so_luong + ? where id_sp=?";
    pdo_execute($sql,$so_luong,$id_sp);
   }
   //update giá theo số lượng mới
   function update_gia($id_sp,$gia){
        $sql= "update chi_tiet_giohang set gia=? where id_sp=?";
        pdo_execute($sql,$gia,$id_sp);
   }
   //Thêm sản phẩm vào chi tiết giỏ hàng
   function insert_sp_ctgh($id_giohang,$id_sp,$so_luong,$gia){
    $sql="insert into chi_tiet_giohang(id_giohang,id_sp,so_luong,gia)
    values(?,?,?,?)";
    pdo_execute($sql,$id_giohang,$id_sp,$so_luong,$gia);
   }
   //Hiển thị giỏ hàng
   function show_gh($id){
    $sql= "SELECT chi_tiet_giohang.*, gio_hang.id_tk,san_pham.ten_sp,san_pham.gia as gia_sp,san_pham.hinh_anh
     FROM chi_tiet_giohang JOIN gio_hang 
     ON chi_tiet_giohang.id_giohang = gio_hang.id JOIN san_pham 
     ON chi_tiet_giohang.id_sp=san_pham.id where gio_hang.id_tk=?";
      return pdo_query($sql,$id);

   }
   //xóa sản phẩm khỏi giỏ hàng
   function delete_sp_cart($id_sp,$id_cart){
    $sql= "delete from chi_tiet_giohang where id_sp=? and id_giohang=?";
    pdo_execute($sql,$id_sp,$id_cart);
    }
   ?>