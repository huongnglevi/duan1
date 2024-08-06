<div class="list__donhang">
    <table class="table">
        <thead>

            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Cập nhập trạng thái</th>
                <th scope="col">Hình thức thanh toán</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($donhangs as $donhang):?>
            <tr>
                <td><?=$donhang['id']?></td>
                <td><?=$donhang['ten_dang_nhap']?></td>
                <td>
                    <?php $donhang_sp=get_sp_cthd($donhang['id']); foreach($donhang_sp as $donhangsp): ?>
                    <?php $sp=get_one_sp($donhangsp['id_sp']); echo $sp['ten_sp'].'<br>'?>

                    <?php endforeach;?>
                </td>
                <td><?=$donhang['tong_tien']?></td>
                <td><?php
                    if($donhang['trang_thai']==0){
                        echo 'Chưa xác nhận';
                    }
                    else if($donhang['trang_thai']==1){
                        echo 'Đã xác nhận';
                    } else if($donhang['trang_thai']==2){
                        echo 'Đã giao hàng';
                    }else if($donhang['trang_thai']==3){
                        echo 'Người dùng đã xác nhận';
                    }else if($donhang['trang_thai']==4){
                        echo 'Đã hủy';
                    }


                ?></td>

                <td>
                    <?php 
                        if($donhang['trang_thai']==0){
                         echo '<a href="?act=xacnhan_donhang&id='.$donhang['id'].'"><button class="btn btn-primary">Xác nhận</button></a>';
                        }else  if($donhang['trang_thai']==1){
                         echo '<a href="?act=cancel_donhang&id='.$donhang['id'].'"><button class="btn btn-danger">Hủy đơn hàng</button></a>';
                         echo '<a href="?act=dagiao_donhang&id='.$donhang['id'].'"><button class="btn btn-success">Đã giao</button></a>';
                        }
                    ?>
                </td>
                <td><?php 
                    if($donhang['httt']==0){
                        echo "Thanh toán khi nhận hàng";
                    }else if($donhang['httt']==1){
                        echo "Thanh toán online";
                    }

                ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>