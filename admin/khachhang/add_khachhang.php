<div class="col-md-8">
    <h3>Thêm khách hàng mới</h3>
    <form method="post" action="?act=insert_kh">
        <div class="mb-3">
            <label for="name" class="form-label">Tên khách hàng</label>
            <input type="text" class="form-control" placeholder="Nhập tên khách hàng" name="name_kh" />
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên đăng nhập</label>
            <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username" />
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="pass" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Nhập email" name="email" />
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="dia_chi" />
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="so_dt" />
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select class="form-control" id="" name="vai_tro">
                <option value="0">Khách hàng</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="btn_insert">Thêm mới</button>
    </form>
</div>