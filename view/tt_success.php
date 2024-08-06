<!-- Thanh toán thành công -->
<div class="wrap_success">
    <div class="wrap__sucess2">
        <h1>Đặt hàng thành công</h1>
        <div class="tt_nguoinhan">
            <h3 style="font-size: 24px;">Thông tin người nhận</h3>
            <div class="hoten">Họ và tên: <?=$ho_ten?></div>
            <div class="sdt">Số điện thoại: <?=$sdt?></div>
            <div class="email__nguoinhan">Email: <?=$email?></div>
            <div class="diachi">Địa chỉ: <?=$dia_chi?></div>
        </div>
        <div class="ttgio_hang">
            <h3 style="font-size: 24px;">Sản phẩm</h3>
            <?php foreach($idProducttts as $idProducttt): ?>
            <?php
             
                 $cart_product=get_sp_frcart($id_tk,$idProducttt);

                 if(is_array($cart_product)){
                    extract($cart_product);
                   
                 }
                 delete_sp_cart($idProducttt,$id_cart);
                ?>
            <input type="hidden" name="id_producttt[]" value="<?=$id_sp?>">
            <div class="ttgio_hang-item">
                <img src="./upload/img/sanpham/<?=$hinh_anh?>" style="width: 100px;height: 120px" alt="">
                <div class="ttgio_hang-itemcontent">
                    <div class="ttgio_hang__title"><?=$ten_sp?></div>
                    <div class="ttgio_hang__soluong">Số lượng : <?=$so_luong?></div>
                    <div class="ttgio_hang__price">Giá: <?=number_format($gia)?> vnđ</div>
                </div>


            </div>
            <?php endforeach; ?>
            <div class="line"></div>

            <div class="tt_donhang">
                <div class="tamtinh">Tạm tính: <?=number_format($tong_tien)?> vnđ</div>
                <div class="phivc">Phí vận chuyển: Miễn phí</div>
                <div class="line"></div>
                <div class="tong">Tổng: <?=number_format($tong_tien)?></div>
                <input type="hidden" value="<?=$total?>" name="total">
            </div>
        </div>
        <a href="?act=don_hang"><button class="btn btn-success">Xem đơn hàng</button></a>
    </div>
</div>
</div>