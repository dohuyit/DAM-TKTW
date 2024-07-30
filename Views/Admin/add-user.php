<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.add-user.css" />
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
    <?php include_once "./Views/Admin/layout/aside.php"?>
      <div class="main-wrapper">
      <?php include_once "./Views/Admin/layout/header.php"?>
        <main>
          <section>
            <div class="container">
              <div class="title-main">
                <h1>Thêm admin</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body">
                    <form action="index.php?action=store-user" method="post" enctype="multipart/form-data">
                      <div class="box-content">
                        <div class="item-content">
                          <label for="">Tên tài khoản admin</label>
                          <input type="text" name="name_account" id="" placeholder="Nhập tên người dùng...">
                          <?php if(isset($errors['name_account'])) :?>
                            <p class="errors-text"><?=$errors['name_account']?></p>
                          <?php endif;?>
                        </div>
                        <div class="item-content">
                          <label for="">Tên admin</label>
                          <input type="text" name="name_user" id="" placeholder="Nhập tên người dùng...">
                          <?php if(isset($errors['name_user'])) :?>
                            <p class="errors-text"><?=$errors['name_user']?></p>
                          <?php endif;?>
                        </div>
                        <div class="item-content">
                          <label for="">Email</label>
                          <input type="email" name="email_user" id="" placeholder="Nhập email...">
                          <?php if(isset($errors['email_user'])) :?>
                            <p class="errors-text"><?=$errors['email_user']?></p>
                          <?php endif;?>
                        </div>
                        <div class="item-content">
                          <label for="">Mật khẩu</label>
                          <input type="password" name="password" id="" placeholder="Nhập mật khẩu...">
                          <?php if(isset($errors['password'])) :?>
                            <p class="errors-text"><?=$errors['password']?></p>
                          <?php endif;?>
                        </div>
                        <div class="btn-item">
                          <button type="submit">Thêm tài khoản</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </section>
        </main>
        <?php include_once "./Views/Admin/layout/footer.php"?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
  </body>
</html>
