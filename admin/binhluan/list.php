<div class="col-md-10">
    <h3>Danh sách bình luận</h3>
    <!-- <a href="?act=addkh" class="btn btn-success">Thêm mới</a> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nội dung bình luận</th>
                <th scope="col">User</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ngày bình luận</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dsbl as $value): ?>
                <th scope="row">
                    <?php echo $value['id'] ?>
                </th>
                <td>
                    <?php echo $value['noi_dung']; ?>
                </td>
                <td>
                    <?php echo $value['ten_dang_nhap']; ?>
                </td>
                <td>
                    <?php echo $value['ten_sp']; ?>
                </td>
                <td>
                    <?php echo $value['ngay_bl']; ?>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không? Hành động này không thể hoàn tác')" class="btn btn-danger" href="?act=delete_bl&idbl=<?php echo $value['id']; ?>" >Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>
