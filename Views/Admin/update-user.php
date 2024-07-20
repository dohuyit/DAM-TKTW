<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.update-user.css" />
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
            <?=$message ?>
            <div class="container">
              <div class="title-main">
                <h1>Cập nhật người dùng</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="box-image">
                        <div class="image-wrap">
                          <img src="<?=$user['image_user']?>" alt="">
                        </div>
                        <div class="input-wrap">
                          <label for="file-upload" class="custom-file-upload">
                            <span>Chọn Ảnh</span>
                            <i class="fa-solid fa-camera-retro"></i>
                          </label>
                         <input id="file-upload" type="file" name="image_user"/>
                         <input type="hidden" name="image_user" value="<?=$user['image_user']?>">
                        </div>
                      </div>
                      <div class="box-content">
                        <div class="item-content">
                          <label for="">Tên người dùng</label>
                          <input type="text" name="name_user" id="" placeholder="Nhập tên người dùng..." value="<?=$user['name_user']?>">
                        </div>
                        <div class="item-content">
                          <label for="">Email</label>
                          <input type="email" name="email_user" id="" placeholder="Nhập email..." value="<?=$user['email_user']?>">
                        </div>
                        <div class="item-content">
                          <label for="">Giới tính</label>
                          <select name="gender_user" id="">
                            <option value="0" <?= ($user['gender_user'] == 0) ? 'selected' : '' ?>>Nam</option>
                            <option value="1" <?= ($user['gender_user'] == 1) ? 'selected' : '' ?>>Nữ</option>
                          </select>
                        </div>
                        <div class="item-content">
                          <label for="">Mật khẩu</label>
                          <input type="password" name="password" id="" placeholder="Nhập mật khẩu..." value="<?=$user['password']?>">
                        </div>
                        <div class="item-content">
                          <label for="">Ngày sinh</label>
                          <input type="date" name="birday_user" id="" value="<?=$user['birday_user'] ?? ''?>">
                        </div>
                        <div class="item-content">
                          <label for="">Địa chỉ</label>
                          <textarea name="address_user" id="" cols="30" rows="10" placeholder="Nhập địa chỉ của bạn..."><?=$user['address_user']?></textarea>
                        </div>
                        <div class="item-content">
                          <label for="">Vai trò</label>
                          <select name="id_role" id="">
                            <?php foreach ($dataRole as $role) :?>
                            <option value="<?=$role['id_role']?>" <?=($role['id_role'] == $user['id_role']) ? 'selected' : ''?>>
                              <?=$role['name_role']?>
                            </option>
                            <?php endforeach;?>
                          </select>
                        </div>
                        <div class="item-content">
                          <label for="">Trạng thái hoạt động</label>
                          <select name="option_user" id="">
                            <option value="0" <?= ($user['option_user'] == 0) ? 'selected' : '' ?>>Hoạt Động</option>
                            <option value="1" <?= ($user['option_user'] == 0) ? 'selected' : '' ?>>Dừng Hoạt Động</option>
                          </select>
                        </div>
                        <input type="hidden" name="id_user" value="<?=$user['id_user']?>">
                        <div class="btn-item">
                          <button type="submit">Cập nhật người dùng</button>
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
