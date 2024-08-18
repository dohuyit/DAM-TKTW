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
  <link rel="stylesheet" href="Common/assets/css/clients-inforUser.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <div class="wrapper">
    <?php include_once "./Views/Clients/layout/header.php" ?>
    <main>
      <section>
        <div class="container">
          <div class="main-body">
            <div class="title-main">
              <h1>Thông tin cá nhân</h1>
            </div>
            <div class="information">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="box-image">
                  <img src="<?= isset($userClients['image_user']) && !empty($userClients['image_user']) ? $userClients['image_user'] : 'Common/assets/img/default-img.jpg' ?>" alt="" id="img-show">
                  <div class="input-wrap">
                    <label for="input-file" class="custom-file-upload">
                      <span>Chọn Ảnh</span>
                      <i class="fa-solid fa-camera-retro"></i>
                    </label>
                    <input id="input-file" type="file" name="image_user" />
                    <input type="hidden" name="image_user" value="<?= $userClients['image_user'] ?>">
                  </div>
                </div>
                <div class="box-content">
                  <div class="item-infor">
                    <label for="" class="label-heading">Tên người dùng</label>
                    <input type="text" name="name_user" id="" placeholder="Nhập tên người dùng..." value="<?= $userClients['name_user'] ?>">
                  </div>
                  <div class="item-infor">
                    <label for="" class="label-heading">Email</label>
                    <input type="email" name="email_user" id="" placeholder="Nhập email..." value="<?= $userClients['email_user'] ?>">
                  </div>
                  <div class="item-infor">
                    <label for="" class="label-heading">Giới tính</label>
                    <!-- <select name="gender_user" id="">
                      <option value="0" <?= ($userClients['gender_user'] == 0) ? 'selected' : '' ?>>Nam</option>
                      <option value="1" <?= ($userClients['gender_user'] == 1) ? 'selected' : '' ?>>Nữ</option>
                    </select> -->
                    <div class="radio-inputs">
                      <label>
                        <input type="radio" class="radio-input female" name="gender_user" value="1" <?= ($userClients['gender_user'] == 1) ? 'checked' : '' ?>>
                        <span class="radio-tile female">
                          <span class="radio-icon">
                            <i class="fa-solid fa-person-dress"></i>
                          </span>
                          <strong>Nữ</strong>
                        </span>
                      </label>

                      <label>
                        <input type="radio" class="radio-input male" name="gender_user" value="0" <?= ($userClients['gender_user'] == 0) ? 'checked' : '' ?>>
                        <span class="radio-tile male">
                          <span class="radio-icon">
                            <i class="fa-solid fa-person"></i>
                          </span>
                          <strong>Nam</strong>
                        </span>
                      </label>
                    </div>
                  </div>
                  <div class="item-infor">
                    <label for="" class="label-heading">Địa chỉ</label>
                    <textarea name="address_user" id="" cols="30" rows="10" placeholder="Nhập địa chỉ của bạn..."><?= $userClients['address_user'] ?></textarea>
                  </div>
                  <input type="hidden" name="id_user" value="<?= $userClients['id_user'] ?>">
                  <div class="btn-item">
                    <button type="submit">Lưu thay đổi</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </section>
    </main>
    <?php include_once "./Views/Clients/layout/footer.php" ?>
  </div>
  <script src="Common/assets/js/admin.js"></script>
</body>

</html>