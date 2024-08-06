<?php
    session_start();
    include "../../model/pdo.php";
    include "../../model/binhluan.php";
    include "../../model/sanpham.php";
    $id_sp = $_REQUEST['id_sp'];
    $dsbl = danhsach_binhluan();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.tttk {
    display: flex;
}

.tttk img {
    border-radius: 50%;
    height: 30px;
}

.form form {
    display: flex;
}

.ndbl p {
    font-size: 10px;
    margin-left: 30px;
}
</style>

<body>
    <div class="container">
        <div class="binhluan">
            <?php foreach ($dsbl as $value):?>
            <?php if($value['id_sp'] == $id_sp): ?>
            <div class="ndbl">
                <div class="tttk">
                    <h6><?php echo '<i class="fa-solid fa-user"></i>  '.$value['ten_dang_nhap']."  <br />  <br />".$value['noi_dung'] ?>
                    </h6>
                </div>
                <p><?php echo "ngày bình luận: ".$value['ngay_bl']?></p>
            </div>
            <?php endif; ?>
            <?php endforeach;?>
            <h3>Bình luận tại đây</h3>
            <hr>
            <?php
        if (isset($_SESSION['user'])) {
        ?>

            <div class="nhapbl">
                <div class="tttk">
                    <p><?php echo $_SESSION['user1']['ten_dang_nhap']; ?></p>
                </div>
                <div class="form">
                    <form action="./?act=add_cmt&id=<?=$id_sp?>" method="POST">
                        <input type="hidden" name="idpro" value="<?=$id_sp?>">
                        <input type="text" name="noi_dung" class="form-control" id="" placeholder="nhập bình luận">
                        <input type="submit" name="gui_bl" class="btn btn-success" class="gui" value="Gửi">
                    </form>
                </div>
            </div>
            <?php
        } else {
            echo "vui lòng đăng nhập để bình luận";
        }
        // if (isset($_POST['gui_bl'])) {
        //     if (isset($_POST['noi_dung']) && $_POST['noi_dung'] != "") {
        //         $noi_dung = $_POST['noi_dung'];
        //         $id_sp = $_POST['idpro'];
        //         $id_tk = $_SESSION['user1']['id'];
        //         $date = getdate();
        //         $ngay_bl = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
        //         add_binhluan($noi_dung, $id_tk, $id_sp, $ngay_bl);
        //         header("location: ".$_SERVER['HTTP_REFERER']);
        //     }
        // }
        ?>
        </div>
    </div>
</body>

</html>