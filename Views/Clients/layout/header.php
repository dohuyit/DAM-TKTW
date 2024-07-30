<header>
        <div class="header-top">
          <div class="container">
            <div class="row-body">
              <div class="col-4">
                <div class="item-col">
                  <i class="fa-solid fa-user-group"></i>
                  <span>Quan hệ cổ đông</span>
                </div>
                <div class="item-col">
                  <i class="fa-solid fa-location-dot"></i>
                  <span>Cửa hàng</span>
                </div>
                <div class="item-col">
                  <i class="fa-solid fa-phone-volume"></i>
                  <span>1800 2005</span>
                </div>
              </div>
              <div class="col-4">
                <a href="index.php"><img src="Common/assets/img/pnj-logo.png" alt="" /></a>
              </div>
              <div class="col-4">
                <div class="item-col">
                  <a href="#">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span>Giỏ hàng</span>
                  </a>
                </div>
                <div class="item-col">
                    <?php if(!isset($_SESSION['name_account'])) : ?>
                    <a href="index.php?action=login">
                    <i class="fa-solid fa-user-tie"></i>
                    <span>Tài khoản của tôi</span>
                    </a>
                    <?php else :?>
                      <i class="fa-solid fa-user-tie"></i>
                      <span>Xin chào, <?=$name_account['name_account']?></span>
                    <?php endif;?>
                  <?php if(isset($_SESSION['name_account'])) : ?>
                  <div class="tab-component">
                    <ul class="list-component">
                      <li>
                        <i class="fa-solid fa-circle-user"></i
                        ><a href="index.php?action=inforUser&id=<?=$_SESSION['name_account']['id_user']?>">Tài Khoản</a>
                      </li>
                      <li>
                        <i class="fa-solid fa-right-from-bracket"></i
                        ><a href="index.php?action=logout">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-menu">
          <div class="container">
            <nav>
              <ul class="list-nav">
                <li><a href="index.php">Trang chủ</a></li>
                <li>
                  <a href="index.php?action=search-products">Trang sức </a>
                  <ul class="list-nav-child">
                  <?php foreach ($cate_data as $cate) : ?>
                   <li class="item-nav-child">
                    <figure>
                      <a href="index.php?action=productsByCate&id_cate=<?=$cate['id_cate']?>"><img src="<?=$cate['img_cate']?>" alt=""></a>
                      <figcaption><a href="index.php?action=productsByCate&id_cate=<?=$cate['id_cate']?>"><?=$cate['name_cate']?></a></figcaption>
                    </figure>
                   </li>
                   <?php endforeach;?>
                  </ul>
                </li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Khuyến mại</a></li>
                <li><a href="#">Liên hệ</a></li>
              </ul>
              <form action="index.php?action=search-products" method="post">
                <input type="search" name="keyword" id="search" />
                <button type="submit" name="btn-search">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
            </nav>
          </div>
        </div>
      </header>