<div class ="list_KH" style="padding: 20px;">
    <h3>Danh sách khách hàng</h3>
    <a href="?act=insert_kh" class="btn btn-success">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" style="font-size: 20px;">STT</th>
                <th scope="col" style="font-size: 20px;">Tên khách hàng</th>
                <th scope="col" style="font-size: 20px;">Tên đăng nhập</th>
                <th scope="col" style="font-size: 20px;">Mật khẩu</th>
                <th scope="col" style="font-size: 20px;">Địa chỉ</th>
                <th scope="col" style="font-size: 20px;">Email</th>
                <th scope="col" style="font-size: 20px;">Số điện thoại</th>
                <th scope="col" style="font-size: 20px;">Quyền hạn</th>
                <th scope="col" style="font-size: 20px;">Hành động</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($dskh as $key => $value): ?>
            <tr>
                <th scope="row">
                    <?php echo $key + 1; ?>
                </th>
                <td>
                    <?php echo $value['ten']; ?>
                </td>
                <td>
                    <?php echo $value['ten_dang_nhap']; ?>
                </td>
                <td>
                    <?php echo $value['mat_khau']; ?>
                </td>
                <td>
                    <?php echo $value['so_dt']; ?>
                </td>
                <td>
                    <?php echo $value['email']; ?>
                </td>
                <td>
                    <?php echo $value['dia_chi']; ?>
                </td>
                <td>
                    <?php 
                        if($value['vai_tro'] == "0"){
                            echo "Khách hàng";
                        } else{
                            echo "Admin";
                        }
                    ?>
                </td>
                <td>
                    <a href="?act=edit_kh&idkh=<?php echo $value['id']; ?>" class="btn btn-warning">Sửa</a>
                    <?php if($value['vai_tro'] == "0"): ?>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không? Hành động này không thể hoàn tác')" class="btn btn-danger" 
                        href="?act=delete_kh&idkh=<?php echo $value['id']; ?>" >Xóa</a>
                    <?php endif; ?>
                 
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>
  
