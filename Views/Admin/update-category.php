<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.update-category.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" href="Common/assets/img/pnj-icon.ico" type="image/x-icon" />
    <title>Document</title>
  </head>
  <body>
    <div class="wrapper">
    <?php include_once "./Views/Admin/layout/aside.php" ?>
      <div class="main-wrapper">
      <?php include_once "./Views/Admin/layout/header.php" ?>
        <main>
          <section>
            <?= $message ?>
            <div class="container">
              <div class="title-main">
                <h1>Sửa danh mục</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body-category">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="item-form">
                        <label for="">Tên Danh Mục:</label>
                        <input type="text" id="" name="name_cate" placeholder="Tên danh mục..." value="<?=$category['name_cate']?>"/>
                    </div>
                    <div class="item-form">
                        <label for="">Ảnh Danh Mục:</label>
                        <img src="<?=$category['img_cate']?>" alt="">
                        <input type="file" id="" name="img_cate"/>
                        <input type="hidden" name="img_cate" value="<?=$category['img_cate']?>">
                    </div>
                    <input type="hidden" name="id_cate" value="<?=$category['id_cate']?>">
                    <div class="btn-form">
                        <button type="submit">Cập nhập</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </main>
        <?php include_once "./Views/Admin/layout/footer.php" ?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
    <script src="Common/assets/js/a.category.js"></script>
  </body>
</html>
