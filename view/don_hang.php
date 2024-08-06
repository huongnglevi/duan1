<!-- Đơn hàng -->
<div class="wrap__donhang">
    <h1>Đơn hàng của bạn</h1>
    <div class="donhang__items">
        <div class="donhang_nav">
            <div class="donhang_all all <?php if(isset($all)){echo 'duongkeduoi';} ?>"><a href="?act=don_hang">Tất
                    cả</a></div>
            <div class="donhang_all xacnhan <?php if(isset($xacnhan)){echo 'duongkeduoi';} ?>"><a
                    href="?act=don_hang_xacnhan">Chờ xác nhận</a></div>
            <div class="donhang_all danggiao <?php if(isset($danggiao)){echo 'duongkeduoi';} ?>"><a
                    href="?act=don_hang_danggiao">Đang giao</a></div>
            <div class="donhang_all damua <?php if(isset($dagiao)){echo 'duongkeduoi';} ?>"><a
                    href="?act=don_hang_dagiao">Đã giao</a></div>
            <div class="donhang_all all <?php if(isset($danhan)){echo 'duongkeduoi';} ?>"><a
                    href="?act=don_hang_danhan">
                    Đã nhận
                </a></div>
            <div class="donhang_all dahuy <?php if(isset($dahuy)){echo 'duongkeduoi';} ?>"><a
                    href="?act=don_hang_dahuy">Đã hủy</a></div>
        </div>
        <?php if(isset($bills) && $bills!=''){foreach($bills as $bill):?>


        <div class="donhang__item">
            <h3>Mã Đơn hàng <?php echo $bill['id'] ?></h3>
            <!-- Thông tin người nhận -->
            <?php $info_nguoinhan=get_nguoinhan($bill['id']);
            if(is_array($info_nguoinhan)){
                extract($info_nguoinhan);
            }
            
            ?>
            <div class="tt_nguoinhan">
                <h3 style="font-size: 24px;">Thông tin người nhận</h3>
                <div class="hoten">Họ và tên: <?=$ho_ten?></div>
                <div class="sdt">Số điện thoại: <?=$sdt?></div>
                <div class="email__nguoinhan">Email: <?=$email?></div>
                <div class="diachi">Địa chỉ: <?=$dia_chi_nhan_hang?></div>
            </div>

            <!-- end -->
            <h3 style=" font-size:24px; margin-left: 47px;">Sản phẩm</h3>
            <?php $chitiet_bills=get_cthd_id($bill['id']);
                foreach($chitiet_bills as $chi_tiet_bill): ?>
            <?php $sp=get_tensp_img($chi_tiet_bill['id_sp']);
                if(is_array($sp)){
                    extract($sp);
                } ?>

            <div class="donhang__item-sp">
                <div class="donhang__img"><img src="./upload/img/sanpham/<?=$hinh_anh?>" alt=""
                        style="height: 120px; width: 100px;">
                </div>
                <div class="donhang__title"><?=$ten_sp?></div>
                <div class="donhang__soluong">Số lượng: <?=$chi_tiet_bill['so_luong']?></div>
                <div class="donhang_gia">Giá: <?=number_format($chi_tiet_bill['gia'])?> vnđ</div>
            </div>
            <?php endforeach; ?>
            <div class="donhang__total">Tổng tiền:<?=number_format($bill['tong_tien'])?> vnđ</div>
            <div class="donhang__trangthai">Trạng thái: <?php if($bill['trang_thai']==0){
                echo "Chưa xác nhận";   
            } else if($bill['trang_thai']==1){
                echo 'Đang giao';
            }
            else if($bill['trang_thai']==2){
                echo 'Đã giao';
            }else if($bill['trang_thai']== 3){
                echo 'Đã Nhận';
            }else if($bill['trang_thai']== 4){
                echo 'Đã hủy';
            }
            ?>

            </div>
            <?php if($bill['trang_thai']==0){?>
            <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng?')"
                href="?act=cancel_donhang&id=<?=$bill['id']?>"> <button class="btn btn-danger">Hủy đơn hàng</button></a>
            <?php
            }else if($bill['trang_thai']==2){?>
            <a href="?act=da_nhan&id=<?=$bill['id']?>">
                <button class="btn btn-success">Xác nhận đã nhận được hàng</button></a>

            <?php
            } else if($bill['trang_thai']==5){?>
            <a onclick="return confirm('Bạn có chắc chắn muốn mua lại?')" href="?act=mua_lai&id=<?=$bill['id']?>">
                <button class="btn btn-success">Mua lại</button></a>

            <?php };?>

        </div>
        <?php endforeach; }
        else echo '<h3>Vui lòng đăng nhập để sử dụng chức năng này</h3>';?>

    </div>
</div>
<!-- footer -->