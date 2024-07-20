<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.update-products.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>
  </head>
  <body>
    <div class="wrapper">
    <?php include_once "./Views/Admin/layout/aside.php" ?>
      <div class="main-wrapper">
      <?php include_once "./Views/Admin/layout/header.php" ?>
        <main>
          <section>
          <<?= $message?>>
            <div class="container">
              <div class="title-main">
                <h1>Cập nhật Sản Phẩm</h1>
              </div>
              <!-- main body -->
               <div class="main-content">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="item-form">
                    <div class="heading-item"><label for="">Tên sản phẩm</label></div>
                    <input type="text" name="name" id="name" placeholder="Tên sản phẩm..." value="<?=$products['name']?>">
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Giá sản phẩm</label></div>
                    <input type="text" name="original_price" id="original_price" placeholder="Giá sản phẩm" value="<?=$products['original_price']?>">
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Giảm Giá</label></div>
                    <input type="number" name="discount_number" id="discount_number" placeholder="Số % khuyến mại..." value="<?=$products['discount_number']?>" min="0">
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Giá khuyến mại</label></div>
                    <input type="text" name="discount_price" id="discount_price" readonly value="<?=$products['discount_price']?>">
                  </div>
                  <div class="item-form">
                   <div class="heading-item"><label for="">Tùy chọn sản phẩm</label></div>
                   <select name="flash_sale" id="flash_sale">
                     <option value="0" <?= ($products['flash_sale'] == 0) ? 'selected' : '' ?>>Mặc định</option>
                     <option value="1" <?= ($products['flash_sale'] == 1) ? 'selected' : '' ?>>Flash-sale</option>
                   </select>
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Ảnh sản phẩm</label></div>
                    <img src="<?=$products['image']?>" alt="" class="image-update-form">
                    <input type="file" name="image" id="">
                    <input type="hidden" name="image" value="<?=$products['image']?>">
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Thể loại</label></div>
                    <select name="id_cate" id="">
                      <?php foreach ($dataCate as $cate) : ?>
                        <option value="<?= $cate['id_cate'] ?>" <?= ($cate['id_cate'] == $products['id_cate']) ? 'selected' : '' ?>>
                        <?= $cate['name_cate'] ?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="item-form">
                    <div class="heading-item"><label for="">Mô tả</label></div>
                    <textarea name="desc" id="" cols="30" rows="10"><?=$products['desc']?></textarea>
                  </div>
                  <input type="hidden" name="id" value="<?=$products['id']?>">
                  <div class="btn-form">
                    <button type="submit">Cập nhật sản phẩm</button>
                  </div>
                </form>
               </div>
            </div>
          </section>
        </main>
        <?php include_once "./Views/Admin/layout/footer.php" ?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
    <script src="Common/assets/js/update-products.js"></script>
  </body>
</html>
