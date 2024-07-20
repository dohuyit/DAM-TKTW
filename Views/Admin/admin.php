<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/admin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    //   google.charts.load('current', {'packages':['corechart']});
    //   google.charts.setOnLoadCallback(drawChart);

    //   function drawChart() {
    //     var data = google.visualization.arrayToDataTable([
    //       ['', '', { role: 'style' }],
    //       <?php foreach ($listProductsChart as $ProductChart): ?>
    //       ['<?=$ProductChart['name_cate']?>',<?=$ProductChart['product_count']?> , 'stroke-color: #003468; stroke-width: 4; fill-color: #326fac '],
    //       <?php endforeach;?>
    //     ]);

    //     var options = {
    //   title: 'Thống kê sản phẩm',
    //   hAxis: {
    //     title: 'Sản Phẩm theo danh mục',
    //     titleTextStyle: { color: '#333' },
    //     textStyle: { fontSize: 12 }, 
    //     slantedText: true, 
    //     slantedTextAngle: 45 
    //   },
    //   vAxis: { minValue: 0 },
    //   chartArea: {width: '100%', height: '100%'}
    // };

    //     var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    //     chart.draw(data, options);
    //   }

    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Danh mục', 'Số lượng', { role: 'style' }],
          <?php 
          $colors = ['#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#A133FF', '#FF8333'];
          $colorIndex = 0;
          foreach ($listProductsChart as $ProductChart): 
            $color = $colors[$colorIndex % count($colors)];
          ?>
          ['<?=$ProductChart['name_cate']?>', <?=$ProductChart['product_count']?>, 'color: <?=$color?>'],
          <?php 
            $colorIndex++;
          endforeach; 
          ?>
        ]);

        var options = {
          title: 'Thống kê sản phẩm',
          hAxis: {
            title: 'Sản Phẩm theo danh mục',
            titleTextStyle: { color: '#333' },
            textStyle: { fontSize: 12 },
            slantedText: true,
            slantedTextAngle: 45
          },
          vAxis: { minValue: 0 },
          chartArea: {width: '100%', height: '90%'},
          // legend: { position: 'right', alignment: 'center' }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <title>Document</title>
  </head>
  <body>
    <div class="wrapper">
      <?php include_once "./Views/Admin/layout/aside.php"?>
      <div class="main-wrapper">
      <?php include_once "./Views/Admin/layout/header.php"?>
        <main>
          <section>
            <div class="container">
              <div class="main-top">
                <h1>Dashboard</h1>
                <div class="body">
                  <div class="list-index">
                    <div class="card-item">
                      <div class="content">
                        <h3>EARNINGS (MONTHLY)</h3>
                        <p>$40,000</p>
                      </div>
                      <i class="fa-solid fa-calendar"></i>
                    </div>
                    <div class="card-item">
                      <div class="content">
                        <h3>EARNINGS (ANNUAL)</h3>
                        <p>4215,000</p>
                      </div>
                      <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                    <div class="card-item">
                      <div class="content">
                        <h3>TASKS</h3>
                        <p>50%</p>
                      </div>
                      <i class="fa-solid fa-paste"></i>
                    </div>
                    <div class="card-item">
                      <div class="content">
                        <h3>PENDING REQUESTS</h3>
                        <p>20</p>
                      </div>
                      <i class="fa-solid fa-comments"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="box-orders-products">
                  <h2>Đơn hàng cần xác nhận</h2>
                  <div class="list-orders">
                      <table >
                        <thead>
                          <th>Tên Khách Hàng</th>
                          <th>Ngày Đặt Hàng</th>
                          <th>Giỏ Hàng</th>
                          <th>Trạng Thái</th>
                          <th>Thao Tác</th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Đỗ Quốc Huy</td>
                            <td><span>7/5/2024</span></td>
                            <td>2 Sản Phẩm</td>
                            <td><p>Chờ xác nhận</p></td>
                            <td>
                              <a href="#"><i class="fa-solid fa-check"></i></a>
                              <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
                <!-- Số liệu cửa hàng -->
                 <div class="data-store">
                  <div class="container-site-map">
                    <h2>Biểu đồ doanh thu</h2>
                    <div class="body">
                      <!-- <p>Chưa có biểu đồ</p> -->
                      <div id="chart_div" style="width: 100%; height: auto;"></div>
                    </div>
                  </div>
                  <div class="container-user-store">
                     <h2>Người dùng mới</h2>
                     <div class="cart-user-store">
                      <img src="Common/assets/img/round-account-button-with-user-inside_icon-icons.com_72596.svg" alt="">
                      <p>Đỗ Quốc Huy</p>
                      <span>Xem chi tiết</span>
                     </div>
                     <div class="cart-user-store">
                      <img src="Common/assets/img/round-account-button-with-user-inside_icon-icons.com_72596.svg" alt="">
                      <p>Đỗ Quốc Huy</p>
                      <span>Xem chi tiết</span>
                     </div>
                     <div class="cart-user-store">
                      <img src="Common/assets/img/round-account-button-with-user-inside_icon-icons.com_72596.svg" alt="">
                      <p>Đỗ Quốc Huy</p>
                      <span>Xem chi tiết</span>
                     </div>
                     <div class="cart-user-store">
                      <img src="Common/assets/img/round-account-button-with-user-inside_icon-icons.com_72596.svg" alt="">
                      <p>Đỗ Quốc Huy</p>
                      <span>Xem chi tiết</span>
                     </div>
                  </div>
                 </div>
              </div>
            </div>
          </section>
        </main>
        <?php include_once "./Views/Admin/layout/footer.php"?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
  </body>
</html>
