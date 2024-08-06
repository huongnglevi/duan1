<div class="wrap__cart" style="font-size:24px">
    <div class="cart__title">
        <h1>Giỏ hàng của bạn</h1>
    </div>
    <?php 
            if(isset($carts) && $carts!=''){?>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4">Sản phẩm</div>
        <div class="col-2">Đơn giá</div>
        <div class="col-2">Số lượng</div>
        <div class="col-2">Số tiền</div>
    </div>
    <form action="?act=add_tt" method="POST">
        <div class="cart__items">

            <?php
                foreach($carts as $cart): ?>
            <div class="row cart__item">
                <div class="col-2 align__item"><input type="checkbox" name="idProducts[]" value="<?=$cart['id_sp']?>"
                        class="checkCarts">
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                        href="?act=delete_cart&id_sp=<?=$cart['id_sp']?>&id_cart=<?=$cart['id_giohang']?>"> <i
                            class="fa-solid fa-trash"></i></a>
                </div>
                <div class="col-4 cart__item-product">
                    <div class="cart__img">
                        <img src="./upload/img/sanpham/<?=$cart['hinh_anh']?>" alt="">
                    </div>

                    <div class="cart__content">
                        <div class="cart__name"><?=$cart['ten_sp']?></div>

                        <!-- <div class="detail_category">Danh mục : <span>Quần áo Bóng đá</span></div> -->

                    </div>

                </div>
                <div class="col-2 align__item"><?=number_format($cart['gia_sp'])?> vnđ</div>
                <div class="col-2 align__item">
                    <div class="quantity_sp" style="font-size:24px">
                        <?=$cart['so_luong']?>
                    </div>

                </div>
                <div class="col-2 align__item"><?=number_format($cart['gia'])?></div>
            </div>

            <?php endforeach; ?>


        </div>
        <button class="thanhtoan" style="border:none;outline:none;" type="submit" name="tt">
            Thanh Toán
        </button>
        <?php if(isset($thongbao)){
            echo $thongbao;
        }
        else {
            echo '';
        }?>


        <div class="choice__delete">
            <div class="choice" onclick="choicAll()">
                Chọn tất cả
            </div>
            <div class="choice" onclick="bochon()">
                Bỏ chọn
            </div>
            <div class="delete">
                <button name='delete_carts' onclick=" return confirm('Bạn có chắc chắn xóa không ..?')" type="submit"
                    style="border:none;outline:none;background-color:rgb(239 95 95)">Xóa mục đã
                    chọn</button>
            </div>







        </div>
    </form>
    <?php }
    else{
        echo '<h3>Đăng nhập để thực hiện chức năng</h3>';
    }
    
    ?>

</div>
<script>
var checkboxE = document.querySelectorAll('.checkCarts')
console.log(checkboxE)

function choicAll() {
    checkboxE.forEach(element => {
        element.checked = true

    });
}

function bochon() {
    checkboxE.forEach(element => {
        element.checked = false

    });
}
</script>