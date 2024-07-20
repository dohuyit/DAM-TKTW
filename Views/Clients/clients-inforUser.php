<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Danh mục sản phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/clients-category-all.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <div class="wrapper">
    <?php include_once "./Views/Clients/layout/header.php" ?>
          <main>
            <section>
              <div class="main-heading">
                <div class="container">
                  <div><h1><span>Trang chủ</span>/<span><?=$name_cate?></span></h1></div>
                </div>
                <div class="banner-collection">
                  <img src="<?= $img_cate?>" alt="">
                </div>
              </div>
              <div class="main-body">
                <div class="container">
                  
                </div>
              </div>
            </section>
         </main>
         <?php include_once "./Views/Clients/layout/footer.php" ?>
    </div>
    <script src="Common/assets/js/clients-category.js"></script>
  </body>
</html>
