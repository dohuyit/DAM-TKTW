<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh mục sản phẩm</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="Common/assets/css/reset.css" />
  <link rel="stylesheet" href="Common/assets/css/clients-category-all.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="icon" href="Common/assets/img/pnj-icon.ico" type="image/x-icon" />
</head>

<body>
  <div class="wrapper">
    <?php include_once "./Views/Clients/layout/header.php" ?>
    <main>
      <section>
        <div class="main-heading">
          <div class="container">
            <div>
              <h1><span>Trang chủ</span>/<span><?= $name_cate ?></span></h1>
            </div>
          </div>
          <div class="banner-collection">
            <img src="<?= $img_cate ?>" alt="">
          </div>
        </div>
        <div class="main-body">
          <div class="container">
            <div class="title-main">
              <a href="index.php?action=search-products">
                <h2>Trang sức</h2>
              </a>
              <ul class="list-cate">
                <?php foreach ($cate_data as $cate) : ?>
                  <li><a href="index.php?action=productsByCate&id_cate=<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></a></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="filter-box">
              <div class="filter-wrap">
                <div class="filter-item">
                  <select name="" id="">
                    <option value="" hidden selected>Chủng loại</option>
                    <option value="">Kim cương</option>
                    <option value="">Vàng</option>
                    <option value="">Ngọc Trai</option>
                    <option value="">Đá màu</option>
                  </select>
                </div>
                <div class="filter-item">
                  <select name="" id="">
                    <option value="" hidden selected>Giới tính</option>
                    <option value="">Nam</option>
                    <option value="">Nữ</option>
                  </select>
                </div>
                <div class="filter-item">
                  <select name="" id="">
                    <option value="" hidden selected>Giá Sản Phẩm</option>
                    <option value="">Từ 30,000,000đ trở lên</option>
                    <option value="">Từ 20,000,000đ trở lên</option>
                    <option value="">Từ 10,000,000đ trở lên</option>
                    <option value="">Dưới 10,000,000đ</option>
                  </select>
                </div>
              </div>
              <div class="sort-wrap">
                <select name="" id="">
                  <option value="1">Sản phẩm mới nhất</option>
                  <option value="2">Từ A đến Z</option>
                  <option value="2">Từ Z đến A</option>
                  <option value="3">Giá từ thấp đến cao</option>
                  <option value="4">Giá từ cao đến thấp</option>
                </select>
              </div>
            </div>
            <div class="list-content-products">
              <?php foreach ($dataProducts as $product) : ?>
                <div class="item-products">
                  <a href="index.php?action=productContent&product_id=<?= $product['id'] ?>" class="box-img">
                    <img src="<?= $product['image'] ?>" alt="" />
                    <img src="Common/assets/img/PNJfast-Giaotrong3h.svg" alt="" class="tag-social">
                    <img src="Common/assets/img/icon-tragop-2.svg" alt="" class="tag-social">
                  </a>
                  <h3 class="title-products">
                    <a href="index.php?action=productContent&product_id=<?= $product['id'] ?>"><?= $product['name'] ?></a>
                  </h3>
                  <p class="price-products"><?= $product['original_price'] . ".000đ" ?></p>
                  <p class="rating-products">
                    <span>
                      <?php for ($i = 0; $i < 5; $i++) : ?>
                        <i class="fa-solid fa-star"></i>
                      <?php endfor; ?>
                    </span>
                    <span>200k đã bán</span>
                  </p>
                  <!-- <ul class="component-products">
                    <li><i class="fa-regular fa-heart"></i></li>
                    <li class="add-cart">
                      <i class="box1 fa-solid fa-cart-shopping"></i>
                      <span class="check"><i class="fa-solid fa-check"></i></span>
                      <i class="box2 fa-solid fa-parachute-box"></i>
                    </li>
                    <li>
                      <i class="fa-solid fa-plus"><a href="#"></a></i>
                    </li>
                  </ul> -->
                </div>
              <?php endforeach; ?>
            </div>
            <ul class="list-page">
            </ul>
          </div>
        </div>
      </section>
    </main>
    <?php include_once "./Views/Clients/layout/footer.php" ?>
  </div>
  <script src="Common/assets/js/clients-category.js"></script>
</body>

</html>