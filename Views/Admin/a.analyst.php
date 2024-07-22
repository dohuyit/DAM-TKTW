<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.analyst.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
              <div class="title-main">
                <h1>Thống kê sản phẩm</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="item-chart">
                  <div id="chart-product">
                  <script type="text/javascript">
                    google.charts.load("current", { packages: ["corechart"] });
                    google.charts.setOnLoadCallback(drawColumnChart);
                    function drawColumnChart() {
                      var data = google.visualization.arrayToDataTable([
                        ["Năm", "Lượt thăm", { role: "style" }],
                        <?php foreach ($dataProducts as $product): ?>
                        ["<?= $product['name_cate']?>",<?= $product['product_count']?>, "stroke-color: #024369; stroke-width: 4; fill-color: #6bbceb"],
                        <?php endforeach;?>
                      ]);
                      var options = {
                        title: "Thống kê sản phẩm",
                        hAxis: {
                          title: "Sản phẩm theo danh mục",
                          titleTextStyle: { color: "#333" },
                          textStyle: { fontSize: 12 },
                          slantedText: true,
                          slantedTextAngle: 45,
                        },
                        vAxis: { minValue: 0 },
                        chartArea: { width: "100%", height: "100%" },
                      };
                    
                      var chart = new google.visualization.ColumnChart(
                        document.getElementById("chart-product")
                      );
                      chart.draw(data, options);
                    }
                  </script>
                  </div>
                  <p>Thống kê sản phẩm theo danh mục</p>
                </div>
                <div class="item-chart">
                  <div id="chart-user">
                  <script type="text/javascript">
                    google.charts.load("current", { packages: ["corechart"] });
                    google.charts.setOnLoadCallback(drawPieChart);
                        function drawPieChart() {
                          var data = google.visualization.arrayToDataTable([
                            ['', ''],
                            <?php foreach ($dataUsers as $user): ?>
                            ["<?=$user['name_role']?>", <?=$user['count_accounts']?>],
                            <?php endforeach;?>
                          ]);
                          var options = {
                            title: "Thống kê số tài khoản",
                            pieHole: 0.4,
                          };
                        
                          var chart = new google.visualization.PieChart(
                            document.getElementById("chart-user")
                          );
                          chart.draw(data, options);
                        }
                  </script>
                  </div>
                  <p>Thống kê người dùng theo vai trò</p>
                </div>
              </div>
            </div>
          </section>
        </main>
        <?php include_once "./Views/Admin/layout/footer.php" ?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
  </body>
</html>
