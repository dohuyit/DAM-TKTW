<header>
          <div class="container">
            <div class="header-body">
              <form action="" method="post">
                <input type="text" />
                <button type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
              </form>
              <div class="header-user">
                <div class="icon-item">
                  <i class="fa-solid fa-envelope"></i>
                  <i class="fa-solid fa-bell"></i>
                </div>
                <div class="user-item">
                  <div class="main-user">
                    <i class="fa-solid fa-user"></i>
                    <p>
                      <span>Xin chào,</span>
                      <span><?=$name_account['name_account']?></span>
                    </p>
                  </div>
                  <div class="tab-component-user">
                    <ul class="list-component-user">
                      <li>
                        <i class="fa-solid fa-circle-user"></i
                        ><a href="#">Tài Khoản</a>
                      </li>
                      <li>
                        <i class="fa-solid fa-right-from-bracket"></i
                        ><a href="index.php?action=logout">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </header>