<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Common/assets/css/reset.css" />
  <link rel="stylesheet" href="Common/assets/css/a.products.css" />
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
              <h1>Sản Phẩm</h1>
            </div>
            <!-- main body -->
            <div class="main-content">
              <div class="body">
                <div class="body-first">
                  <a href="index.php?action=add-products" id="btn-add-cate"><span>Thêm sản phẩm mới</span><i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="body-second">
                  <table>
                    <thead>
                      <th>Ảnh </th>
                      <th>Tên sản phẩm</th>
                      <th>Loại sản phẩm</th>
                      <th>Giá gốc</th>
                      <th>Giảm giá</th>
                      <th>Flash Sale</th>
                      <th>Thao tác</th>
                    </thead>
                    <tbody>
                      <?php foreach ($dataAll as $data) : ?>
                        <tr>
                          <td><img src="<?= $data['image'] ?>" alt=""></td>
                          <td>
                            <p><?= $data['name'] ?></p>
                          </td>
                          <td>
                            <p><?= $data['name_cate'] ?></p>
                          </td>
                          <td>
                            <p><?= $data['original_price'] . ".000đ" ?></p>
                          </td>
                          <td>
                            <p><?= $data['discount_number'] . "%" ?></p>
                          </td>
                          <td>
                            <form class="toggle-box" action="">
                              <input class="toggle-input" type="checkbox" <?= $data['flash_sale'] ? 'checked' : '' ?> readonly>
                              <label>
                                <div class="handle"></div>
                              </label>
                            </form>
                          </td>
                          <td>
                            <p>
                              <a href="index.php?action=update-products&id=<?= $data['id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="index.php?action=delete-products&id=<?= $data['id'] ?>"><button onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa-solid fa-trash"></i></button></a>
                            </p>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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