  <!-- list sản phẩm -->
  <div class="prod">
      <div class="group" style="padding: 0 100px;"></div>
      <h3>SẢN PHẨM MỚI</h3>
      <div class="line0"></div>
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="item">
          <!-- Sản phẩm -->
          <?php foreach($spnew as $sp) :?>
          <div class="sp" style="width: 20rem">
              <img src="./upload/img/sanpham/<?=$sp['hinh_anh']?>" class="card-img-top" alt="..." />
              <div class="card-body">
                  <h5 class="name_prod"><a href="?act=ctsp&id=<?=$sp['id']?>"><?=$sp['ten_sp']?></a></h5>
                  <p class="card-price">
                      <span>Giá sản phẩm: <?php echo number_format($sp['gia'])?> VNĐ</span>
                  </p>
                  <p class="mota">
                      <?= $sp['mo_ta']?>
                  </p>
                  <a href="?act=ctsp&id=<?=$sp['id']?>" class="btn btn-success">Mua ngay</a>
              </div>
          </div>
          <?php endforeach; ?>
      </div>
      <h3 style="padding-top: 30px">SẢN PHẨM ĐƯỢC XEM NHIỀU NHẤT</h3>
      <div class="line0"></div>
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="item">
          <!-- Sản phẩm -->
          <?php foreach($sptop4view as $sp) :?>
          <div class="sp" style="width: 20rem">
              <img src="./upload/img/sanpham/<?=$sp['hinh_anh']?>" class="card-img-top" alt="..." />
              <div class="card-body">
                  <h5 class="name_prod"><a href="?act=ctsp&id=<?=$sp['id']?>"><?=$sp['ten_sp']?></a></h5>
                  <p class="card-price">
                      <span>Giá sản phẩm: <?php echo number_format($sp['gia'])?> VNĐ</span>
                  </p>
                  <p class="mota">
                      <?= $sp['mo_ta']?>
                  </p>
                  <a href="?act=ctsp&id=<?=$sp['id']?>" class="btn btn-success">Mua ngay</a>
              </div>
          </div>
          <?php endforeach; ?>


      </div>
  </div>