<?php
    function danhsach_khachhang(){
        $sql = "select*from tai_khoan";
        $result = pdo_query($sql);
        return $result;
    }

    function add_khachhang($name_kh, $username, $password, $so_dt, $email, $dia_chi,$vai_tro){
        $sql = "insert into tai_khoan values(null,'$name_kh','$username', '$password', '$so_dt', '$email','$dia_chi', $vai_tro)";
        pdo_execute($sql);
    }

    function getone_khachhang($idkh){
        $sql = "select * from tai_khoan where id = $idkh";
        $result = pdo_query_one($sql);
        return $result;

    }
    function update_khachhang($name_kh, $username, $password, $so_dt, $email, $dia_chi,$vai_tro, $idkh){
        $sql = "update tai_khoan set ten='$name_kh', ten_dang_nhap='$username', mat_khau='$password', so_dt='$so_dt', email='$email', dia_chi='$dia_chi', vai_tro='$vai_tro' where id=$idkh ";
        pdo_execute($sql);
    }
    function delete_khachang($idkh){
        $sql = "delete from tai_khoan where id = $idkh";
        pdo_execute($sql);
    }
    function them_taikhoan($username, $pass, $email, $vai_tro){
        $sql = "insert into `tai_khoan` (`ten_dang_nhap`, `mat_khau`, `email`,`vai_tro`) values ('$username', '$pass', '$email', $vai_tro)";
        pdo_execute($sql);
    }
    function login($username, $password){
        $sql = "select * from tai_khoan where ten_dang_nhap='$username' and mat_khau='$password'";
        $result = pdo_query_one($sql);
        return $result;
    }
    function quenmatkhau($email){
        $sql = "select * from tai_khoan where email = '$email'";
        $result=pdo_query_one($sql);
        return $result;
    }
?>