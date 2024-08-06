   <!-- detail_account -->
   <div class="detail">
       <div class="aside_item">
           <div class="aside">
               <div class="title">
                   <h3> Xin chào
                       <?php if(isset($_SESSION['user1'])){
                  echo $_SESSION['user1']['ten_dang_nhap'];
                } ?>
                   </h3>
               </div>
               <div class="content">
                   <ul>
                       <li>
                           <a href="#">
                               <i class="fa-solid fa-address-card" style="color: blue"></i> Thông tin tài khoản
                           </a>
                       </li>
                       <li>
                           <a href="?act=don_hang">
                               <i class="fa-solid fa-cart-shopping" style="color: orange"></i> Đơn hàng
                           </a>
                       </li>
                       <?php if(isset($_SESSION['user1']) && $_SESSION['user1']['vai_tro'] == 1): ?>
                       <li>
                           <a href="./admin/?act=home">
                               <i class="fa-solid fa-house" style="color: red;"></i> Đến trang quản trị
                           </a>
                       </li>
                       <?php endif;?>
                       <li><a href="./?act=don_hang_danhan"> <i class="fa-solid fa-bag-shopping"
                                   style="color: green"></i> Lịch sử đơn
                               hàng</a></li>
                       <li>
                           <a href="?act=logout">Đăng xuất <i class="fa-solid fa-right-to-bracket"
                                   style="color: red;"></i>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
           <div class="article2" style=' background-color: white; height: 100%; width: 80%; margin-left: 40px;'>
               <?php if(isset($_SESSION['user1'])){
                extract($_SESSION['user1']);
              } else{
                echo 'Không tạo sesion';
              }
            ?>
               <div class="list_infor">
                   <h2>Thông tin tài khoản</h2>
                   <div class="noidung">
                       <div>
                           <p>Họ và tên: </p>
                       </div>
                       <div class="trangthai">
                           <p>
                               <?php if(isset($ten) && $ten != ""){
                            echo "$ten"; 
                            }else{
                                echo "Chưa cập nhật";
                            }
                        ?>
                           </p>
                       </div>
                   </div>
                   <div class="noidung">
                       <div>
                           <p>Email:</p>
                       </div>
                       <div class="trangthai">
                           <p>
                               <?php if(isset($email) && $email != ""){
                            echo "$email"; 
                            }else{
                                echo "Chưa cập nhật";
                            }
                        ?>
                           </p>
                       </div>
                   </div>
                   <div class="noidung">
                       <div>
                           <p>Số điện thoại:</p>
                       </div>
                       <div class="trangthai">
                           <p>
                               <?php if(isset($so_dt) && $so_dt != ""){
                            echo "$so_dt"; 
                            }else{
                                echo "Chưa cập nhật";
                            }
                        ?>
                           </p>
                       </div>
                   </div>
                   <div class="noidung">
                       <div>
                           <p>Địa chỉ:</p>
                       </div>
                       <div class="trangthai">
                           <p>
                               <?php if(isset($dia_chi) && $dia_chi != ""){
                            echo "$dia_chi"; 
                            }else{
                                echo "Chưa cập nhật";
                            }
                        ?>
                           </p>
                       </div>
                   </div>
               </div>
               <div class="list_infor">
                   <h2>Thông tin Đăng nhập</h2>
                   <div class="noidung">
                       <div>
                           <p>Tên đăng nhập:</p>
                       </div>
                       <div class="trangthai">
                           <p>
                               <?php if(isset($ten_dang_nhap) && $ten_dang_nhap != ""){
                            echo "$ten_dang_nhap"; 
                            }else{
                                echo "Chưa cập nhật";
                            }
                        ?>
                           </p>
                       </div>
                   </div>
                   <div class="noidung">
                       <div>
                           <p>Mật khẩu:</p>
                       </div>
                       <form action="" type="password">
                           <div class="trangthai">
                               <p>
                                   <?php if(isset($mat_khau) && $mat_khau != ""){
                              echo md5($mat_khau); 
                              }else{
                                  echo "Chưa cập nhật";
                              }
                          ?>
                               </p>
                           </div>
                       </form>

                   </div>
                   <?php if(isset($_SESSION['user1']) && $_SESSION['user1']['vai_tro'] == 0): ?>
                   <button class="btn btn-primary">
                       <a href="?act=edit_account&idkh=<?php echo $id ?>">Cập nhật</a>
                   </button>
                   <?php endif;?>

               </div>
           </div>
       </div>
   </div>
  