<?php 
  if(is_array($sp)){
    extract($sp);
  }
?>
<!--Chi tiết sản phẩm-->
<div class="wrap__detail" style=" margin: 20px 0;">

    <div class="detail__first">
        <div class="detail__first-img">
            <img src="./upload/img/sanpham/<?=$hinh_anh?>" alt="">
        </div>
        <div class="detail__first-content">
            <div class="detail__title">
                <?=$ten_sp?>
            </div>
            <div class="detail_category">Danh mục :
                <?php foreach($dsdm as $value): ?>
                <span>
                    <?php if($value['id'] == $id_dm){
                                echo $value['ten_danhmuc']; 
                                } 
                            ?>
                </span>
                <?php endforeach; ?>
            </div>
            <div class="detail__price">
                Giá: <?= number_format($gia)?> vnđ
            </div>
            <div class="detail__quantity">
                <div class="detail__quantity-title">
                    Số lượng
                </div>

                <form action="" method="POST">
                    <!-- ?act=add_cart&id= -->
                    <div class="quantity">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <input type="hidden" value="<?=$gia?>" name="gia">
                        <div class="decrease" onclick="increase()">-</div>
                        <!-- <div class="number">1</div> -->
                        <input type="number" value="1" min="1" name="so_luong_sp" class="number">
                        <div class="increase" onclick="decrease()">+</div>
                    </div>
            </div>
            <div class="quantiti_kho">
                Số lượng còn: <?=$so_luong?>
            </div>
            <div class="action">

                <?php if(isset($_SESSION['user']) && isset($_SESSION['user1'])): ?>
                <button class="buy__now">Mua ngay</button>
                <button class="addCart" type="submit" name="btn_addcart">Thêm vào giỏ hàng</button>
                <?php endif; ?>
                <?php if(!isset($_SESSION['user']) && !isset($_SESSION['user1'])){
                        echo 'Đăng nhập để thực hiện chức năng mua ngay và thêm vào giỏ hàng';
                } ?>
            </div>
            </form>



            <div class="line"></div>
            <h3>Đặc điểm nổi bật</h3>
            <p>Chất liệu: Denim <br>
                Thành phần: 98% Cotton + 2% Spandex<br>
                Công nghệ Laser Marking tạo các vệt hiệu ứng chuẩn xác trên sản phẩm<br>
                Vải Denim được wash trước khi may nên không rút và hạn chế ra màu sau khi giặt<br>
                Bề mặt quần không thô ráp<br>
                Co giãn tốt giúp quần ôm vừa vặn, thoải mái<br>
                Dáng Slim Fit ôm tôn dáng, giúp bạn "hack" đôi chân dài và gọn đẹp<br>
                Người mẫu: 179 cm - 75 kg, mặc quần size 32<br>
                Tự hào sản xuất tại Việt Nam<br>
                Lưu ý: Sản phẩm vẫn sẽ bạc màu sau một thời gian dài sử dụng theo tính chất tự nhiên</p>
        </div>

    </div>
    <div class="line"></div>
    <h2>Bình luận</h2>
    <div class="comment">
        <!-- bình luận -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            $("#comment").load("view/binhluan/binhluanform.php", {
                id_sp: <?php echo $sp['id'] ?>
            });
        });
        </script>
        <div class="row mb" id="comment">
        </div>
    </div>

    <h4>Sản phẩm liên quan</h4>
    <div class="product__relative">
        <!-- Sản phẩm liên quan -->
        <?php foreach($sp_lienquan as $value):?>
        <div class="sp" style="width: 20rem">
            <?php if($value['hinh_anh'] != null && $value['hinh_anh'] !=""): ?>
            <img src="upload/img/sanpham/<?php echo $value['hinh_anh']; ?>" class="card-img-top" alt="..." />
            <?php endif; ?>
            <div class="card-body">
                <h5 class="name_prod"><a
                        href="?act=ctsp&id=<?php echo $value['id'];?>"><?php echo $value['ten_sp']; ?></a></h5>
                <p class="card-price">
                    <span>Giá: <?php echo number_format($value['gia']) ; ?> VNĐ</span>
                </p>
                <p class="card-price">
                    <span>Lượt xem: <?=$value['luot_xem']?></span>
                </p>
                <p class="mota">
                    <?php echo $value['mo_ta']; ?>
                </p>
                <a href="?act=ctsp&id=<?php echo $value['id'];?>" class="btn btn-success">Mua ngay</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>

</div>
<div class="wrap_tt <?php if(isset($showtc)){echo 'block';} ?> ">
    <div class="themthanhcong">
        <h5>Thêm vào giỏ hàng thành công</h5>
        <a href="?act=gio_hang"> <button class='btn btn-success'>Xem giỏ hàng</button></a>
        <button class='btn btn-primary ttmua'>Tiếp tục xem sản phẩm</button>
    </div>
</div>

<script>
var decreaseE = document.querySelector('.decrease')
var numberE = document.querySelector('.number')
var increaseE = document.querySelector('.increase')
var init = 0;

function decrease() {
    init = numberE.value;
    init++
    numberE.value = init
}

function increase() {
    init = numberE.value;

    init--
    if (init < 1) {
        init = 1;
    }
    numberE.value = init
}
var thongbao = document.querySelector('.wrap_tt')
var addcart = document.querySelector('.addCart')
var ttmua = document.querySelector('.ttmua')
ttmua.addEventListener('click', function() {
    thongbao.classList.remove('block')

})
thongbao.addEventListener('click', function() {
    thongbao.classList.remove('block')
})
addcart.addEventListener('click', function() {
    thongbao.classList.add('block')
})
</script>










<!-- footer -->