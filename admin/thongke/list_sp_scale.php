
<div class="col-md-8">
  <div class="thongke_scale" style = "padding: 20px 0">
    <!-- thống kê đơn hàng theo ngày -->
    <h3>Thống kê doanh số</h3>
    
    <!-- biểu đồ -->
    <div>
      <div style = "padding-bottom: 30px" >
      <html>
        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
              // Some raw data (not necessarily accurate)
              var data = google.visualization.arrayToDataTable([
                ['Tháng', 'Doanh thu'],
                <?php
                foreach($dsthongke_scale as $scale){
                  extract($scale);
                  echo "['$thang', $tong_doanh_thu ],";
                }
                ?>                
              ]);

              var options = {
                title : 'Biểu đồ thống kê doanh thu theo tháng',
                hAxis: {title: 'Tháng'},
                seriesType: 'bars',
              };

              var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
              chart.draw(data, options);
            }
          </script>
        </head>
        <body>
          <div id="chart_div1" style="width: 900px; height: 500px;"></div>
        </body>
      </html>
      <br/>
      <br/>
      <!-- chart_quantity -->
      <html>
        <head>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawVisualization);

            function drawVisualization() {
              // Some raw data (not necessarily accurate)
              var data = google.visualization.arrayToDataTable([
                ['Tháng', 'Số lượng'],
                <?php
                foreach($dsthongke_scale as $scale){
                  extract($scale);
                  echo "['$thang', $so_luong_donhang ],";
                }
                ?>                
              ]);

              var options = {
                title : 'Biểu đồ thống kê doanh thu theo tháng',
                hAxis: {title: 'Tháng'},
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
