     <!-- form register -->
     <div class="form-register" style="padding: 20px">
         <div class="mask d-flex align-items-center h-100 gradient-custom-3">
             <div class="container h-100">
                 <div class="row d-flex justify-content-center align-items-center h-100">
                     <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                         <div class="card" style="border-radius: 15px;">
                             <div class="card-body p-5">
                                 <h2 class="text-uppercase text-center mb-5">ĐĂNG KÝ TÀI KHOẢN</h2>

                                 <form action="?act=register" method="post" id="form_register">
                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="tendn">Họ và tên</label>
                                         <input type="text" id="ho_ten" class="form-control form-control-lg"
                                             name="name_kh" />
                                         <span class='valid_hoten spanvalid'></span>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="tendn">Tên đăng nhập</label>

                                         <input type="text" id="ten_dn" class="form-control form-control-lg"
                                             name="username" />
                                         <span class='valid_tendk spanvalid'></span>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="email_dk">Email xác minh</label>
                                         <input type="email" id="email_dk" class="form-control form-control-lg"
                                             name="email" />
                                         <span class='valid_emaildk spanvalid'></span>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="email_dk">Số điện thoại</label>
                                         <input type="text" id="sdt" class="form-control form-control-lg"
                                             name="so_dt" />
                                         <span class='valid_sdt spanvalid'></span>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="email_dk">Địa chỉ</label>
                                         <input type="text" id="dia_chi" class="form-control form-control-lg"
                                             name="dia_chi" />
                                         <span class='valid_dc spanvalid'></span>
                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="mk_dk">Mật khẩu</label>

                                         <input type="password" id="mk_dk" class="form-control form-control-lg"
                                             name="pass" />
                                         <span class='valid_mk_dk spanvalid'></span>

                                     </div>

                                     <div class="form-outline mb-4">
                                         <label class="form-label" for="mk2_dk">Nhập lại mật khẩu</label>

                                         <input type="password" id="mk2_dk" class="form-control form-control-lg"
                                             name="repeat_pass" />
                                         <span class='valid_mk2_dk spanvalid'></span>

                                     </div>
                                     <div class="form-outline mb-4">
                                         <input type="hidden" id="form3Example4cdg" class="form-control form-control-lg"
                                             name="vai_tro" value="0" />
                                     </div>
                                     <?php if(isset($err) && $err !=""): ?>
                                     <p style="color: red">
                                         <?php echo $err; ?>
                                     </p>
                                     <?php endif; ?>
                                     <div class="d-flex justify-content-center">
                                         <input type="submit" value="Đăng ký" name="btn_insert" class="btn btn-success">
                                     </div>
                                     <?php if(isset($thongbao) && $thongbao !=""): ?>
                                     <p class="text-center text-muted mt-5 mb-0">
                                         <?php echo $thongbao; ?>
                                         <a href="?act=login" class="fw-bold text-danger ">Đăng nhập ngay</a>
                                     </p>
                                     <?php endif; ?>
                                     <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a
                                             href="?act=login" class="fw-bold text-danger "><u>Đăng nhập</u></a></p>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
var ten_dn = document.getElementById('ten_dn')
var email_dk = document.getElementById('email_dk')
var mk_dk = document.getElementById('mk_dk')
var mk2_dk = document.getElementById('mk2_dk')
var ho_ten = document.getElementById('ho_ten')
var sdt_dk = document.getElementById('sdt')
var dia_chi = document.getElementById('mk2_dk')

//Thông báo
var valid_tendk = document.querySelector('.valid_tendk')
var valid_emaildk = document.querySelector('.valid_emaildk')
var valid_mk_dk = document.querySelector('.valid_mk_dk')
var valid_mk2_dk = document.querySelector('.valid_mk2_dk')
var valid_hoten = document.querySelector('.valid_hoten')
var valid_dc = document.querySelector('.valid_dc')
var valid_sdt = document.querySelector('.valid_sdt')

//
var form_register = document.getElementById('form_register')



function valid_empty() {

    var is_empty_ten_dn = false;
    var is_empty_email_dk = false;
    var is_empty_mk_dk = false;
    var is_empty_mk2_dk = false;
    var is_empty_hoten = false;
    var is_empty_sdt = false;
    var is_empty_dc = false;
    if (ho_ten.value == "") {
        is_empty_hoten = true;

        valid_hoten.innerHTML = "Không để trống trường này"
    }
    if (sdt.value == "") {
        is_empty_sdt = true;

        valid_sdt.innerHTML = "Không để trống trường này"
    }
    if (dia_chi.value == "") {
        is_empty_dc = true;

        valid_dc.innerHTML = "Không để trống trường này"
    }


    if (ten_dn.value == "") {
        is_empty_ten_dn = true;

        valid_tendk.innerHTML = "Không để trống trường này"
    }



    if (email_dk.value == "") {
        is_empty_email_dk = true;

        valid_emaildk.innerHTML = "Không để trống trường này"
    }
    if (mk_dk.value == "") {
        is_empty_mk_dk = true;

        valid_mk_dk.innerHTML = "Không để trống trường này"
    }
    if (mk2_dk.value == "") {
        is_empty_mk2_dk = true;

        valid_mk2_dk.innerHTML = "Không để trống trường này"
    }
    if (is_empty_ten_dn == false && is_empty_email_dk == false && is_empty_mk_dk == false && is_empty_mk2_dk == false &&
        is_empty_hoten == false && is_empty_sdt == false && is_empty_dc == false) {
        return true;

    } else {
        return false;
    }

}


ten_dn.addEventListener('focus', function() {

    valid_tendk.innerHTML = ''
})
email_dk.addEventListener('focus', function() {

    valid_emaildk.innerHTML = ''
})
mk_dk.addEventListener('focus', function() {

    valid_mk_dk.innerHTML = ''
})
mk2_dk.addEventListener('focus', function() {

    valid_mk2_dk.innerHTML = ''
})
ho_ten.addEventListener('focus', function() {

    valid_hoten.innerHTML = ''
})
sdt.addEventListener('focus', function() {

    valid_sdt.innerHTML = ''
})
dia_chi.addEventListener('focus', function() {

    valid_dc.innerHTML = ''
})
// valid length
function valid_length() {

    var is_length_ten_dn = false;
    var is_length_email_dk = false;
    var is_length_mk_dk = false;
    var is_length_mk2_dk = false;
    if (ten_dn.value.length < 5) {
        is_length_ten_dn = true;

        valid_tendk.innerHTML = "Tên đăng nhập phải lớn hơn 5 ký tự"
    }
    if (email_dk.value == "") {
        is_length_email_dk = true;

        valid_emaildk.innerHTML = "Không để trống trường này"
    }
    if (mk_dk.value.length < 8) {
        is_length_mk_dk = true;

        valid_mk_dk.innerHTML = "Độ dài mật khẩu phải lớn hơn 8"
    }
    if (mk2_dk.value.length < 8) {
        is_length_mk2_dk = true;

        valid_mk2_dk.innerHTML = "Độ dài mật khẩu phải lớn hơn 8"
    }
    if (is_length_ten_dn == false && is_length_email_dk == false && is_length_mk_dk == false && is_length_mk2_dk ==
        false) {
        return true;

    } else {
        return false;
    }

}
// valid pass
function valid_pass() {
    if (mk_dk.value != mk2_dk.value) {
        valid_mk2_dk.innerHTML = "Mật khẩu không khớp"
        return false
    } else {
        return true
    }
}

function isValidEmail() {
    email = email_dk.value
    // Biểu thức chính quy để kiểm tra địa chỉ email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}




form_register.addEventListener('submit', function(e) {
    valid_empty()
    if (valid_empty()) {
        valid_length()
        if (valid_length()) {
            valid_pass()
            if (valid_pass()) {

            }
        }
    }
    if (isValidEmail() == false) {
        valid_emaildk.innerHTML = 'email không phù hợp'
    }

    if (valid_empty() == true && valid_length() == true && valid_pass() == true && isValidEmail() == true) {

    } else {
        e.preventDefault()

    }


})
     </script>