<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Common/assets/css/reset.css" />
  <link rel="stylesheet" href="Common/assets/css/a.add-products.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
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
          <div class="container">
            <div class="title-main">
              <h1>Thêm Sản Phẩm</h1>
            </div>
            <!-- main body -->
            <div class="main-content">
              <form action="index.php?action=store-products" method="post" enctype="multipart/form-data">
                <div class="item-form">
                  <div class="heading-item"><label for="">Tên sản phẩm</label></div>
                  <input type="text" name="name" id="name" placeholder="Tên sản phẩm...">
                  <?php if (isset($errors['name'])) : ?>
                    <p class="errors-text"><?= $errors['name'] ?></p>
                  <?php endif; ?>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Giá sản phẩm</label></div>
                  <input type="text" name="original_price" id="original_price" placeholder="Giá sản phẩm">
                  <?php if (isset($errors['original_price'])) : ?>
                    <p class="errors-text"><?= $errors['original_price'] ?></p>
                  <?php endif; ?>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Giảm Giá</label></div>
                  <input type="number" name="discount_number" id="discount_number" placeholder="Số % khuyến mại..." min="0" max="100">
                  <?php if (isset($errors['discount_number'])) : ?>
                    <p class="errors-text"><?= $errors['discount_number'] ?></p>
                  <?php endif; ?>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Giá khuyến mại</label></div>
                  <input type="text" name="discount_price" id="discount_price" readonly>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Tùy chọn sản phẩm</label></div>
                  <div class="option-sale">
                    <input value="0" name="flash_sale" id="default" type="radio" />
                    <label for="default">Mặc Định</label>
                    <input value="1" name="flash_sale" id="sale" type="radio" />
                    <label for="sale">Flash-sale</label>
                  </div>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Ảnh sản phẩm</label></div>
                  <img src="" alt="" id="img-show">
                  <input type="file" name="image" id="input-file">
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Thể loại</label></div>
                  <select name="id_cate" id="">
                    <?php foreach ($dataCate as $cate) : ?>
                      <option value="<?= $cate['id_cate'] ?>" <?= isset($dataForm['id_cate']) ? (($dataForm['id_cate'] == $cate['id_cate']) ? 'selected' : '') : '' ?>>
                        <?= $cate['name_cate'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="item-form">
                  <div class="heading-item"><label for="">Mô tả</label></div>
                  <textarea name="desc" cols="30" rows="10"></textarea>
                </div>
                <div class="btn-form">
                  <button type="submit">Thêm sản phẩm</button>
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
  <script src="Common/assets/js/add-products.js"></script>
</body>

</html>