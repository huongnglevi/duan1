     <!-- form register -->
    <div class="form-login" style="padding-top: 30px; text-align: center">
        <form action="" method="post">
          <h1 style="padding-bottom: 20px; font-size: 28px">QUÊN MẬT KHẨU</h1>
            <p style="padding-bottom: 10px; font-size: 20px; font-weight: 500">
              Email xác minh
            </p>
            <input
              style="height: 45px; width: 500px; padding: 0 10px"
              type="email"
              name="email"
            />
          <br><br>
          <input type="submit" value="Xác nhận" name="btn_submit" class="btn btn-success">
          <br><br>
          <?php if(isset($pass) && $pass !=""): ?>
            <p>
            Mật khẩu của bạn là: <?php echo $pass ?>
            <a style="color: red;" href="?act=login">Đăng nhập ngay</a>
          </p>
          <?php endif; ?>  
        </form>
    </div>
 
