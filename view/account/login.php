<!-- form login -->
<div class="form-login" style="padding-top: 30px; " id="form_dn">
    <form action="?act=login" method="post" class="form_login">
        <h1 style="padding-bottom: 20px; font-size: 28px;text-align:center">ĐĂNG NHẬP</h1>
        <div class="user">
            <p style="font-size: 20px; font-weight: 500;">
                Tên đăng nhập
            </p>
            <input style="height: 45px; width: 500px; padding: 0 10px" type="text" name="username" id="ten_dn" />
            <div class='valid_ten_dn spanvalid'></div>
        </div>
        <div class="pass">
            <p style="font-size: 20px; font-weight: 500">
                Mật khẩu
            </p>
            <input style="height: 45px; width: 500px; padding: 0 10px" type="password" name="pass" id="mk_dn" />
            <div class='valid_mk_dn spanvalid'></div>
        </div>
        <?php if(isset($thongbao) && $thongbao != ""): ?>
        <p class="thongbao" style="color: red">
            <?php echo $thongbao; ?>
        </p>
        <?php endif; ?>
        <p>
            Bạn chưa có tài khoản?
            <a style="color: red" href="?act=register">Đăng ký ngay</a>
        </p>
        <p>
            Không thể đăng nhập?
            <a style="color: red" href="?act=quenpass">Quên mật khẩu</a>
        </p>
        <br />
        <input type="submit" value="Đăng nhập" name="btn_login" class="btn btn-success">
        <br><br>
    </form>
</div>
<script>
var form_dn = document.getElementById('form_dn')
var ten_dn = document.querySelector('#ten_dn')
var mk_dn = document.querySelector('#mk_dn')
var thongbao = document.querySelector('.thongbao')

var valid_ten_dn = document.querySelector('.valid_ten_dn')
var valid_mk_dn = document.querySelector('.valid_mk_dn')

ten_dn.addEventListener('focus', function() {
    valid_ten_dn.innerHTML = ""
    thongbao.innerHTML = ""
})
mk_dn.addEventListener('focus', function() {
    valid_mk_dn.innerHTML = ""
    thongbao.innerHTML = ""



})
form_dn.addEventListener('submit', function(e) {
    var is_empty_ten_dn = false
    var is_empty_mk_dn = false
    if (ten_dn.value == '') {
        valid_ten_dn.innerHTML = "Tên tài khoản không được để trống"
        is_empty_ten_dn = true;
    }
    if (mk_dn.value == '') {
        is_empty_mk_dn = true

        valid_mk_dn.innerHTML = "Mật khẩu không được để trống"
    }

    if (is_empty_ten_dn == true || is_empty_mk_dn == true) {
        e.preventDefault()
    }
})
</script>