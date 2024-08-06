<!-- Thanh toan -->
<h1 style='text-align:center;margin: 20px 0;'>Thanh toán</h1>
<form action="?act=accept_tt" method="POST" id='form_tt'>

    <div class="wrap__thanhtoan">
        <div class="ttgiao_hang">
            <h3>Thông tin giao hàng</h3>
            <div class="ttgiao_hang-hinhthuctt">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" id='hoten_tt'
                        value="<?=$_SESSION['user1']['ten']?>" />
                    <div class='valid_hoten_tt spanvalid'></div>

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" id='email_tt'
                        value="<?=$_SESSION['user1']['email']?>" />
                    <div class='valid_email_tt spanvalid'></div>

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id='sdt_tt'
                        value="<?=$_SESSION['user1']['so_dt']?>" />
                    <div class='valid_sdt_tt spanvalid'></div>

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" id='dc_tt'
                        value="<?=$_SESSION['user1']['dia_chi']?>" />
                    <div class='valid_diachi_tt spanvalid'></div>

                </div>
                <div class="pttt">
                    <h3>Hình thức thanh toán</h3>
                    <div class="pttt__group">
                        <input type="radio" name="tt_code" class="pttt__check" value="0" id='radio1'>
                        <span>Thanh toán khi nhận hàng</span>
                    </div>
                    <div class="pttt__group">
                        <input type="radio" name="tt_code" value="1" id='radio2'>
                        <span>Chuyển khoản</span>
                    </div>
                    <div class='valid_ht_tt spanvalid'></div>

                </div>
            </div>
        </div>
        <div class="ttgio_hang">
            <h3>Sản phẩm</h3>
            <?php foreach($idProducts as $idProduct): ?>
            <?php
                 $cart_product=get_sp_frcart($id_tk,$idProduct);

                 if(is_array($cart_product)){
                    extract($cart_product);
                    $total+=$gia;
                 }
            
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
                <div class="tamtinh">Tạm tính: <?=number_format($total)?> vnđ</div>
                <div class="phivc">Phí vận chuyển: Miễn phí</div>
                <div class="line"></div>
                <div class="tong">Tổng: <?=number_format($total)?> vnđ</div>
                <input type="hidden" value="<?=$total?>" name="total">
            </div>

        </div>

    </div>
    <button class="btn btn-success" name="accept_tt" type="submit" value="hihi">Xác nhận mua hàng</button>

</form>


<script>
var hoten_tt = document.getElementById('hoten_tt')
var email_tt = document.getElementById('email_tt')
var sdt_tt = document.getElementById('sdt_tt')
var dc_tt = document.getElementById('dc_tt')
//Thông báo
var valid_hoten_tt = document.querySelector('.valid_hoten_tt')
var valid_email_tt = document.querySelector('.valid_email_tt')
var valid_sdt_tt = document.querySelector('.valid_sdt_tt')
var valid_diachi_tt = document.querySelector('.valid_diachi_tt')
///action
var form_tt = document.getElementById('form_tt')

var radio1 = document.querySelector('#radio1')
var radio2 = document.querySelector('#radio2')
var valid_radio = document.querySelector('.valid_ht_tt')

function valid_empty() {

    var is_empty_hoten_tt = false;
    var is_empty_email_tt = false;
    var is_empty_sdt_tt = false;
    var is_empty_dc_tt = false;
    if (hoten_tt.value == "") {
        is_empty_hoten_tt = true;

        valid_hoten_tt.innerHTML = "Không để trống trường này"
    }
    if (email_tt.value == "") {
        is_empty_email_tt = true;

        valid_email_tt.innerHTML = "Không để trống trường này"
    }
    if (sdt_tt.value == "") {
        is_empty_sdt_tt = true;

        valid_sdt_tt.innerHTML = "Không để trống trường này"
    }
    if (dc_tt.value == "") {
        is_empty_dc_tt = true;

        valid_diachi_tt.innerHTML = "Không để trống trường này"
    }
    if (is_empty_hoten_tt == false && is_empty_email_tt == false && is_empty_sdt_tt == false && is_empty_dc_tt ==
        false) {
        return true;

    } else {
        return false;
    }

}
hoten_tt.addEventListener('focus', function() {
    valid_hoten_tt.innerHTML = ''
})
email_tt.addEventListener('focus', function() {
    valid_email_tt.innerHTML = ''
})
sdt_tt.addEventListener('focus', function() {
    valid_sdt_tt.innerHTML = ''
})
dc_tt.addEventListener('focus', function() {
    valid_diachi_tt.innerHTML = ''
})

function check_httt() {
    if (radio1.checked == false && radio2.checked == false) {
        valid_radio.innerHTML = 'Vui lòng chọn hình thức thanh toán'
        return false;
    } else {
        return true;
    }

}
radio1.addEventListener('change', function() {
    valid_radio.innerHTML = ''
})
radio2.addEventListener('change', function() {
    valid_radio.innerHTML = ''
})

function isValidEmail() {
    email = email_tt.value
    // Biểu thức chính quy để kiểm tra địa chỉ email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

form_tt.addEventListener('submit', function(e) {
    valid_empty()
    check_httt()
    if (isValidEmail() == false) {
        valid_email_tt.innerHTML = 'email không phù hợp'
    }
    if (valid_empty() && check_httt() && isValidEmail() == true) {} else {
        e.preventDefault()
    }
})
</script>

<!-- footer -->