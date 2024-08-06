      <!-- category -->
      <div class="category">
          <h3>DANH MỤC SẢN PHẨM</h3>
          <div class="list_danhmuc" style="padding: 10px 0">
              <?php foreach($dsdm as $value): ?>
              <div id="card">
                  <div class="card-body">
                      <h5 class="card-title">
                          <a class="btn btn-outline-danger"
                              href="?act=searchsp_dm&iddm=<?php echo $value['id'] ?>"><?php echo $value['ten_danhmuc'] ?></a>
                      </h5>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
      </div>
      <!-- list and filter product -->
      <div class="detail">
          <div class="aside_item">
              <div class="sidebar_aside">
                  <div class="title">
                      <h3><i class="fa-solid fa-filter"></i>LỌC SẢN PHẨM</h3>
                  </div>
                  <div class="content_filter">
                      <div class="filter_name">
                          <h5>Theo tên</h5>
                          <form action="?act=search_tensp" method="post">
                              <div class="filter_search">
                                  <div class="search_sp">
                                      <i class="fa-solid fa-magnifying-glass"></i>
                                      <input type="text" placeholder="Nhập tên sản phẩm" name="ten_sp" />
                                  </div>
                                  <div class="submit" style="padding-top: 10px;">
                                      <input type="submit" value="Tìm kiếm" class="btn btn-success">
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="filter_price">
                          <h5>Theo giá</h5>
                          <div class="price" style="padding-bottom: 10px">
                              <a href="?act=search_gia1sp">Giá: 100.000 - 200.000 VNĐ</a>
                          </div>
                          <div class="price">
                              <a href="?act=search_gia2sp">Giá: 200.000 - 300.000 VNĐ</a>
                          </div>
                          <div class="price">
                              <a href="?act=search_gia3sp">Giá: 300.000 - 500.000 VNĐ</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="article">
                  <div class="list_prod">
                      <?php foreach($dssp as $value): ?>
                      <div class="sp">
                          <?php if($value['hinh_anh'] != null && $value['hinh_anh'] !=""): ?>
                          <img src="upload/img/sanpham/<?php echo $value['hinh_anh']; ?>" class="card-img-top"
                              alt="..." />
                          <?php endif; ?>
                          <div class="card-body">
                              <h5 class="name_prod"><a
                                      href="?act=ctsp&id=<?php echo $value['id'];?>" ><?php echo $value['ten_sp']; ?></a>
                              </h5>
                              <p class="card-price">
                                  <span>Giá: <?php echo number_format($value['gia']);?> VNĐ</span>
                              </p>
                              <p class="card-price">
                                  <span>Lượt xem: <?=$value['luot_xem']?></span>
                              </p>
                              <p class="mota">
                                  <?php echo $value['mo_ta']; ?>
                              </p>
                              <a href="?act=ctsp&id=<?php echo $value['id'];?>" class="btn btn-success">Mua
                                  ngay</a>
                          </div>
                      </div>
                      <?php endforeach;?>
                  </div>
              </div>
          </div>
      </div>