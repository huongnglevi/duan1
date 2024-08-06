<div class="col-md-8">
    <h3>Sửa thông tin khách hàng</h3>
    <form method="post" action="?act=edit_account&?act=edit_account&idkh=<?php echo $list_kh['id'] ?>">
        <input type="hidden" value="<?php echo $list_kh['id'] ?>" name="idkh">
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" placeholder="Nhập tên khách hàng" name="name_kh"
                value="<?php echo $list_kh['ten'] ?>" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Nhập tên khách hàng" name="username"
                value="<?php echo $list_kh['ten_dang_nhap'] ?>" />
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật khẩu</label>
            <input type="text" class="form-control" placeholder="Nhập mật khẩu" name="pass"
                value="<?php echo $list_kh['mat_khau'] ?>" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Nhập email" name="email"
                value="<?php echo $list_kh['email'] ?>" />
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi"
                value="<?php echo $list_kh['dia_chi'] ?>" />
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="so_dt"
                value="<?php echo $list_kh['so_dt'] ?>" />
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="" name="vai_tro" value="<?php echo $list_kh['vai_tro'] ?>">
                <option value="0" <?php if($list_kh['vai_tro'] == "0"): ?> selected <?php endif; ?>>Khách hàng</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="btn_update">Chỉnh sửa</button>
    </form>
</div>