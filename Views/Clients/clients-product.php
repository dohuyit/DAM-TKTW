<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trang sức cao cấp PNJ</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/detailed-products.css" />
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
        <section id="main-products">
          <div class="container">
            <h1><span>Trang chủ</span>/<span>Sản Phẩm</span></h1>
            <div class="main-products-detailed">
              <div class="img-products">
                <img src="<?=$productById['image']?>" alt="">
              </div>
              <div class="infor-products">
                <div class="title-products">
                  <img src="Common/assets/img/PNJfast-Giaotrong3h.svg" alt="" />
                  <h2><?=$productById['name']?></h2>
                </div>
                <div class="id-products">
                  <span>Mã Sản Phẩm: </span>
                  <p><?="PNJ000" .$productById['id']?></p>
                </div>
                <div class="price-products">
                  <p><?=$productById['original_price'] . ".000đ"?></p>
                  <p>Chỉ cần trả trước 40% giá trị đơn hàng</p>
                </div>
                <div class="phone-products">
                  <p>
                    <span>Gọi</span><i class="fa-solid fa-phone-volume"></i><span>1800 100500(Free)</span
                    ><span>để nhận được ưu đãi độc quyền</span>
                  </p>
                </div>
                <button type="submit" class="btn-buy">Mua ngay
                  <p>Miễn phí giao hàng tận nhà hoặc nhận tại cửa hàng</p>
                </button>
                <button type="submit" class="btn-add-cart">
                  Thêm vào giỏ hàng
                </button>
                <div class="desc-note">
                  <p class="item">
                    <span
                      >Giá sản phẩm thay đổi tuỳ trọng lượng vàng và đá</span
                    >
                  </p>
                  <p class="item">
                    <span
                      >Đổi sản phẩm trong 48h tại hệ thống cửa hàng PNJ
                    </span>
                  </p>
                  <p class="item">
                    <span></span>
                      Miễn phí giao siêu tốc 3H PNJFast tại 19 tỉnh thành, trễ
                      tặng voucher 100K, xem thêm
                    </span>
                  </p>
                </div>
                <div class="bottom-infor-products">
                  <img src="Common/assets/img/pnj-logo.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="description-products">
    <div class="container">
        <div class="list-desc">
            <!-- Thông số sản phẩm -->
            <div class="tab-item">
                <h3 class="title-tab">Thông số và mô tả</h3>
                <div class="content-tab">
                    <p><?=$productById['desc']?></p>
                </div>
            </div>

            <!-- Bình luận -->
            <div class="tab-item">
                <h3 class="title-tab">Bình luận</h3>
                <div class="content-tab">
                    <h4>Bình luận từ khách hàng</h4>
                    <?php if (empty($comments)): ?>
                        <p class="text-empty">Chưa có bình luận</p>
                    <?php else: ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <div class="title-comment">
                                  <p>
                                    <?=$comment['name_user']?>
                                  </p>
                                  <span>
                                    <?php for ($i=0; $i < 5; $i++) : ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php endfor;?>
                                  </span> 
                                  <span><?=$comment['day_comments']?></span>
                                </div>
                                <p class="text-comments"><?=$comment['content_comments']?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['name_user'])): ?>
                        <button id="btn-comment">Viết bình luận</button>
                    <?php else: ?>
                        <p class="text-login-form-comment">Vui lòng <a href="index.php?action=login-clients">đăng nhập</a> để viết bình luận!!!</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="inner-overlay-comment" id="innerOverlayComment">
                <form action="index.php?action=add-comment" method="POST" class="container-comment">
                    <input type="hidden" name="id" value="<?=$productById['id']?>">
                    <h3>Viết bình luận</h3>
                    <div class="icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="box-comment">
                        <textarea name="content_comments" id="comment" cols="30" rows="10" placeholder="Viết bình luận của bạn"></textarea>
                    </div>
                    <button type="submit">Gửi bình luận</button>
                </form>
            </div>
        </div>
    </div>
</section>
        <section id="products-same">
          <div class="container">
            <div class="wrapper-products">
              <h2>Bạn có thể thích &#10004</h2>
              <div class="container-products">
                <div class="list-products">
                  <?php foreach ($similarProducts as $similar) :?>
                    <div class="item-products">
                          <a href="index.php?action=productContent&product_id=<?=$similar['id']?>"   class="box-img">
                            <img src="<?=$similar['image']?>" alt="" />
                            <img src="Common/assets/img/PNJfast-Giaotrong3h.svg" alt="" class="tag-social">
                            <img src="Common/assets/img/icon-tragop-2.svg" alt="" class="tag-social">
                          </a>
                          <h3 class="title-products">
                           <a href="index.php?action=productContent&product_id=<?=$similar['id']?>"
                           ><?=$similar['name']?></a>
                          </h3>
                          <p class="price-products"><?=$similar['original_price'] . ".000đ"?></p>
                          <p class="rating-products">
                         <span>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </span>
                        <span>200k đã bán</span>
                      </p>
                      <ul class="component-products">
                        <li><i class="fa-regular fa-heart"></i></li>
                        <li class="add-cart">
                          <i class="box1 fa-solid fa-cart-shopping"></i>
                          <span class="check"
                            ><i class="fa-solid fa-check"></i
                          ></span>
                          <i class="box2 fa-solid fa-parachute-box"></i>
                        </li>
                        <li>
                          <i class="fa-solid fa-plus"><a href="#"></a></i>
                        </li>
                      </ul>
                    </div>
                  <?php endforeach;?>
                </div>
              </div>
              <div class="direction">
                <button class="prev" type="button" id="btn-left">
                  <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="next" type="button" id="btn-right">
                  <i class="fa-solid fa-angle-right"></i>
                </button>
              </div>
            </div>
          </div>
        </section>
      </main>
      <?php include_once "./Views/Clients/layout/footer.php" ?>
      <audio src="./audio/ting.mp3" controls id="audio_blink"></audio>
    </div>
    <script src="Common/assets/js/detailed-products.js"></script>
  </body>
</html>
