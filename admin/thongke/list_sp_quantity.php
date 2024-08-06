<div class="col-md-8">
    <div class="thongke_spdm">
        <!-- thống kê sản phẩm theo danh mục -->
        <h3>Thống kê sản phẩm trong danh mục</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã loại</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Số lượng</th>
                </tr>
                <?php
                foreach($dsthongke_dm as $value){
              ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['ten_danhmuc'] ?></td>
                    <td><?php echo $value['so_luong'] ?></td>
                </tr>
                <?php 
                }
              ?>
            </thead>
        </table>
        <!-- biểu đồ tròn-->
        <div>
            <div class="col-md-8">
                <html>

                <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load("current", {
                        packages: ["corechart"]
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Danh mục', 'Số lượng'],
                            <?php
                  foreach($dsthongke_dm as $value){
                    extract($value);
                    echo "['$ten_danhmuc', $so_luong],";
                  }
                ?>
                        ]);
                        var options = {
                            title: 'Biểu đồ số lượng sản phẩm ',
                            is3D: true,
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                    }
                    </script>
                </head>

                <body>
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </body>

                </html>
            </div>
        </div>
    </div>

    <div class="thongke_hoadon" style="padding: 20px 0">
        <!-- thống kê đơn hàng theo ngày -->
        <h3>Thống kê đơn hàng theo ngày</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ngày</th>
                    <th scope="col">Số lượng hóa đơn</th>
                    <th scope="col">Doanh thu</th>
                </tr>
                <?php
                foreach($dsthongke_day as $value){
              ?>
                <tr>
                    <td><?php echo $value['ngay'] ?></td>
                    <td><?php echo $value['so_luong'] ?></td>
                    <td><?php echo number_format($value['total']) ?> nvđ</td>
                </tr>
                <?php 
                }
              ?>
            </thead>
        </table>
        <!-- biểu đồ cột-->
        <div>
            <div class="col-md-8">

                <html>

                <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawVisualization);

                    function drawVisualization() {
                        // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                            ['Ngày', 'Số lượng'],
                            <?php
                foreach($dsthongke_day as $hoadon){
                  extract($hoadon);
                  echo "['$ngay', $so_luong],";
                }
                ?>
                        ]);

                        var options = {
                            title: 'Biểu đồ thống kê số lượng đơn hàng theo ngày',
                            hAxis: {
                                title: 'Ngày'
                            },
                            seriesType: 'bars',
                            colors: ['#d95f02', '#1b9e77']
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
                        chart.draw(data, options);
                    }
                    </script>
                </head>

                <body>
                    <div id="chart_div2" style="width: 900px; height: 500px;"></div>
                </body>

                </html>

            </div>
        </div>
    </div>

</div>