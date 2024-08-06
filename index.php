<?php    
    include_once("./model/pdo.php");
    include_once("./model/danhmuc.php");
    include_once("./model/sanpham.php");
    include_once("./model/khachhang.php");
    include_once("./model/giohang.php");
    include_once("./model/thanhtoan.php");
    include_once("./model/hoadon.php");
    include_once('./model/nguoinhan.php');
    include_once('./model/binhluan.php');
    session_start();
    $act=$_GET['act'] ??'';
    $view='./view/home.php';
    $spnew=load_sp_new();
    $sptop4view=get_sp_view_top4();
    $dsdm = load_all_danhmuc();
    $dssp = load_all_sp();
    switch ($act) {
        case 'home':
            $title="Home";
            
        
            $view='./view/home.php';
            break;
        case "product":
            
           
            $view = "./view/product.php";
            break;
        case "searchsp_dm":
            if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
                $dssp = searchsp_danhmuc($_GET['iddm']);
            }
            $view = "view/product.php";
            break;
            // tìm kiếm sp theo tên
            case "search_tensp":
            if(isset($_POST['ten_sp']) && $_POST['ten_sp'] != ""){
                $dssp = search_tensp($_POST['ten_sp']);
            }
            $view = "view/product.php";
            break; 
            // tìm kiếm sp theo giá
            case "search_gia1sp":
            $dssp = search_gia1sp();
            $view = "view/product.php";
            break;
            case "search_gia2sp":
            $dssp = search_gia2sp();
            $view = "view/product.php";
            break;
            case "search_gia3sp":
            $dssp = search_gia3sp();
            $view = "view/product.php";
            break;  
        case 'ctsp':
            $slide_show='';

            $title="Chi tiết sản phẩm";
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            tangview($_GET['id']);
            $sp_lienquan = sp_lienquan($_GET['id']);
            $sp=get_one_sp($id);
            if($_SERVER['REQUEST_METHOD']==='POST'){
                if(isset($_SESSION['user1'])){
                    $id_tk=$_SESSION['user1']['id'];
                }
              
                if(isset($_POST['btn_addcart'])){
                    $id_sp=$_POST['id'];
                    $so_luong=$_POST['so_luong_sp'];
                    $gia=$_POST['gia'];
                    $tonggia=$so_luong*$gia;               
                    // kiểm tra id tk có trong giỏ hàng chưa
                    $checkID_tk=get_id_cart($id_tk);
                    //
    
                    if(!is_array($checkID_tk) && $checkID_tk!==""){
                        $id_giohang=insert_tk_cart($id_tk);
                        insert_sp_ctgh($id_giohang,$id_sp,$so_luong,$tonggia);
                    }
                    if(is_array($checkID_tk) && $checkID_tk!=''){  
                        $id_cart=$checkID_tk['id'];               
                        $checkID_sp=check_idsp_ctgh($id_sp,$id_cart);
                        if(is_array($checkID_sp) && $checkID_sp!=''){
                        update_soluong($so_luong,$id_sp);
                        $newsp=check_idsp_ctgh($id_sp,$id_cart);
                        $new_sl=$newsp['so_luong'];
                        $new_gia=$gia * $new_sl;
                        update_gia($id_sp,$new_gia);   
                        }
                                                        
                    }
                    if(is_array($checkID_tk) && !is_array($checkID_sp)){
                        extract($checkID_tk);
                        insert_sp_ctgh($id,$id_sp,$so_luong,$tonggia);
                    }
                }
                $showtc='';

            }
            //
            


            //

            $view='./view/detail_product.php';

            break;
        case 'gio_hang':
            $slide_show='';

            $title= 'Giỏ hàng';
            $thongbao="";
            if(isset($_SESSION['user1'])){
                $id=$_SESSION['user1']['id'];
                // $show_cart=show_cart($id);

                $carts=show_gh($id);
            }
            else {
                $carts= '';
            }
            $view= './view/cart.php';
            break;
            //login
        // case 'add_cart':
           
        //     if(isset($_SESSION['user1'])){
        //         $id_tk=$_SESSION['user1']['id'];
        //     }
          
        //     if(isset($_POST['btn_addcart'])){
        //         $id_sp=$_POST['id'];
        //         $so_luong=$_POST['so_luong_sp'];
        //         $gia=$_POST['gia'];
        //         $tonggia=$so_luong*$gia;               
        //         // kiểm tra id tk có trong giỏ hàng chưa
        //         $checkID_tk=get_id_cart($id_tk);
        //         //

        //         if(!is_array($checkID_tk) && $checkID_tk!==""){
        //             $id_giohang=insert_tk_cart($id_tk);
        //             insert_sp_ctgh($id_giohang,$id_sp,$so_luong,$tonggia);
        //         }
        //         if(is_array($checkID_tk) && $checkID_tk!=''){  
        //             $id_cart=$checkID_tk['id'];               
        //             $checkID_sp=check_idsp_ctgh($id_sp,$id_cart);
        //             if(is_array($checkID_sp) && $checkID_sp!=''){
        //             update_soluong($so_luong,$id_sp);
        //             $newsp=check_idsp_ctgh($id_sp,$id_cart);
        //             $new_sl=$newsp['so_luong'];
        //             $new_gia=$gia * $new_sl;
        //             update_gia($id_sp,$new_gia);   
        //             }
                                                    
        //         }
        //         if(is_array($checkID_tk) && !is_array($checkID_sp)){
        //             extract($checkID_tk);
        //             insert_sp_ctgh($id,$id_sp,$so_luong,$tonggia);
        //         }
        //          //
        //          $slide_show='';
        //         $showtc='';
        //          $title="Chi tiết sản phẩm";
        //          if(isset($_GET['id'])){
        //              $id=$_GET['id'];
        //          }
        //          tangview($_GET['id']);
        //          $sp_lienquan = sp_lienquan($_GET['id']);
        //          $sp=get_one_sp($id);
        //          $view='./view/detail_product.php';            
        //     }   
        //     break;
        case 'delete_cart':
            $slide_show='';
            $thongbao="";


            if(isset($_GET['id_sp']) && isset($_GET['id_cart'])){
                $id_sp=$_GET['id_sp'];
                $id_cart=$_GET['id_cart'];
                delete_sp_cart($id_sp,$id_cart);
            }
            if(isset($_SESSION['user1'])){
                $id=$_SESSION['user1']['id'];
                // $show_cart=show_cart($id);
                $carts=show_gh($id);
                
            }
            $view='./view/cart.php';
            break;
        case'delete_carts':
            $slide_show='';
            if(isset($_POST['delete_carts']) && isset($_GET['id'])){
                
            }
            if(isset($_SESSION['user1'])){
                $id=$_SESSION['user1']['id'];
                // $show_cart=show_cart($id);
                $carts=show_gh($id);
                
            }
            $view='./view/cart.php';
            break;

          
        //chuyển tới trang thanh toán
        case 'add_tt':
            $thongbao="";

            if(isset($_SESSION['user1']) && $_SESSION['user1']!=''){
                $id_tk=$_SESSION['user1']['id'];
                $carts=show_gh($id_tk);
               
            }
            if(isset($_POST['tt']) && isset($_POST['idProducts']))
            {
                $idProducts=$_POST['idProducts'];
                $total=0;
                $view='./view/thanhtoan.php';
                $thongbao="";
            }
            else if(isset($_POST['tt']) && !isset($_POST['idProducts'])){
                $thongbao="Vui lòng chọn sản phẩm để thanh toán";
                $view='./view/cart.php';
           
            }else if(isset($_POST['delete_carts']) && isset($_POST['idProducts'])){
                $idProducts=$_POST['idProducts'];
                $get_idcart=get_id_cart($id_tk);
                $id_cart=$get_idcart['id'];
                foreach($idProducts as $idProduct){
                    delete_sp_cart($idProduct,$id_cart);
                }
                header('location: ?act=gio_hang');
                $view='./view/cart.php';

            }
           
            break;
        case 'accept_tt':
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!= ''){
                $id_tk=$_SESSION['user1']['id'];  
            }
            $id_carts=get_id_cart($id_tk);
          
            if(isset($_POST['id_producttt'])){
                $idProducttts=$_POST['id_producttt'];//[1,2,3,5]
            }
            if(isset($_POST['accept_tt']) && $_POST['accept_tt']!=''){
                $id_cart=$id_carts['id'];
                $tong_tien=$_POST['total'];
              
                $httt=$_POST['tt_code'];
                
                $id_hoadon=insert_hoadon($id_tk,$id_cart,$tong_tien,$httt);
                $ho_ten=$_POST['ho_ten'];
                $sdt=$_POST['sdt'];
                $email=$_POST['email'];
                $dia_chi=$_POST['dia_chi'];
                insert_nguoinhan($id_hoadon,$ho_ten,$sdt,$email,$dia_chi);
            }
            foreach($idProducttts as $idProducttt){
                $cart_product=get_sp_frcart($id_tk,$idProducttt);
                $id_sp=$cart_product['id_sp'];
                $gia=$cart_product['gia'];
                $so_luong=$cart_product['so_luong'];
                insert_cthd($id_hoadon,$id_sp,$so_luong, $gia);
               
            }
            
            $view='./view/tt_success.php';
            break;
        case 'cancel_donhang':
            $slide_show='';
            if(isset($_GET['id'])){
                $id_donhang=$_GET['id'];
                $change=4;
                change_donhang($change,$id_donhang);
            }
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $bills=get_hd_idtk($id_tk);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case 'mua_lai':
            $slide_show='';
                if(isset($_GET['id'])){
                    $id_donhang=$_GET['id'];
                    $change=0;
                    change_donhang($change,$id_donhang);
                }
                if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                    $id_tk=$_SESSION['user1']['id'];
                    $bills=get_hd_idtk($id_tk);
                }
                $title='Đơn hàng';
                $view='./view/don_hang.php';
                break;
        case 'da_nhan':
            $slide_show='';
                if(isset($_GET['id'])){
                    $id_donhang=$_GET['id'];
                    $change=3;
                    change_donhang($change,$id_donhang);
                }
                $danhan='';
                if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                    $id_tk=$_SESSION['user1']['id'];
                    $static=3;
                    $bills=get_hd_static($id_tk,$static);
                }
                $title='Đơn hàng';
                $view='./view/don_hang.php';
                break;
        
        // Hiển thị đơn hàng
        case 'don_hang':
            $all='';
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $bills=get_hd_idtk($id_tk);
            }
            else if(!isset($_SESSION['user1']) && !isset($_SESSION['user'])){
                $bills='';
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case 'don_hang_xacnhan':
            $xacnhan='';
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $static=0;
                $bills=get_hd_static($id_tk,$static);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case 'don_hang_danggiao':
            $danggiao='';
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $static=1;
                $bills=get_hd_static($id_tk,$static);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case 'don_hang_dagiao':
            $dagiao='';
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $static=2;
                $bills=get_hd_static($id_tk,$static);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case 'don_hang_danhan':
                $danhan='';
                $slide_show='';
                if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                    $id_tk=$_SESSION['user1']['id'];
                    $static=3;
                    $bills=get_hd_static($id_tk,$static);
                }
                $title='Đơn hàng';
                $view='./view/don_hang.php';
                break;
        case 'don_hang_dahuy':
            $dahuy='';
            $slide_show='';
            if(isset($_SESSION['user1']) && $_SESSION['user1']!=""){
                $id_tk=$_SESSION['user1']['id'];
                $static=4;
                $bills=get_hd_static($id_tk,$static);
            }
            $title='Đơn hàng';
            $view='./view/don_hang.php';
            break;
        case "login":
            $slide_show='';

            if(isset($_POST['btn_login'])){
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $arr = login($username, $password);
                if(is_array($arr)){
                $_SESSION['user'] = $username;
                $_SESSION['user1'] = $arr;
                }
                else {
                $thongbao =  "Tài khoản mật khẩu không đúng. Vui lòng điền lại thông tin";
                }
            }
            if(isset($_SESSION['user'])){
                header("location: ?act=detail_account");
            }
            $view = "./view/account/login.php";
            break;
            // đăng ký
         case "register":
            $slide_show='';

            if(isset($_POST['btn_insert'])){
                $name_kh = $_POST['name_kh'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $so_dt = $_POST['so_dt'];
                $dia_chi = $_POST['dia_chi'];
                $password = $_POST['pass'];
                $repeat_pass = $_POST['repeat_pass'];
                $vaitro = $_POST['vai_tro'];
                if($password == $repeat_pass){
                add_khachhang($name_kh,$username, $password, $so_dt, $email, $dia_chi, $vaitro);
                }
                else{
                $err = "Mật khẩu nhập lại không khớp. Vui lòng nhập lại";
                }
                $thongbao = "Đăng ký thành công";
            }
            $view = "./view/account/register.php";
            break;
        case "detail_account":  
            $slide_show='';
            
            $view = "./view/account/detail_account.php";
            break;
        // view bình luận
        case 'add_cmt':
            if (isset($_POST['gui_bl'])) {
                if (isset($_POST['noi_dung']) && $_POST['noi_dung'] != "") {
                    $noi_dung = $_POST['noi_dung'];
                    $id_sp = $_POST['idpro'];
                    $id_tk = $_SESSION['user1']['id'];
                    $date = getdate();
                    $ngay_bl = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'];
                    add_binhluan($noi_dung, $id_tk, $id_sp, $ngay_bl);
                    
                }
            }
            $title="Chi tiết sản phẩm";
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            tangview($_GET['id']);
            $sp_lienquan = sp_lienquan($id);
            
            $sp=get_one_sp($id);
           
            $view='./view/detail_product.php';
            break;
            // đăng xuất
        case 'logout':
            $slide_show='';

            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                
                header('location: ?act=login');
            }
            if(isset($_SESSION['user1'])){
                unset($_SESSION['user1']);
            }
            break;
            // update tài khoản
        case "edit_account":
            $slide_show='';
            if(isset($_SESSION['user1'] )){
                unset($_SESSION['user1']);
            }
            if(isset($_GET['idkh']) && $_GET['idkh'] > 0){
                $list_kh = getone_khachhang($_GET['idkh']);
            }
            if(isset($_POST['btn_update'])){
                $name_kh = $_POST['name_kh'];
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $so_dt = $_POST['so_dt'];
                $vai_tro = $_POST['vai_tro'];
                $idkh = $_POST['idkh'];
                update_khachhang($name_kh, $username, $password, $so_dt, $email, $dia_chi,$vai_tro, $idkh);
                $_SESSION['user1'] = getone_khachhang($_GET['idkh']);
                header("location: ?act=detail_account");
            }
            $view = "./view/account/edit_account.php";
            break;
        
        case "quenpass":
            if(isset($_POST['btn_submit']) && $_POST['btn_submit']){
                $email = $_POST['email'];
                $arr = quenmatkhau($email);
                if(is_array($arr)){
                $pass = $arr['mat_khau'];
                }
            }
            $view = "view/account/quenpass.php";
            break;

        // case "demo":
        //     if(isset($_POST['gui'])){
        //         $httt=$_POST['tt_code'];
            
        //     } 
        //     $view='demo.php';
        //     break;
        default:
            # code...
            $view= './view/home.php';
            break;
    }
    include_once('./view/header.php');
    if(!isset($slide_show)){
    include_once('./view/slide_show.php');

    }
    include_once($view);
    
    include_once('./view/footer.php');

?>