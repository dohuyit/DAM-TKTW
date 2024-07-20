<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.user.css" />
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
                <h1>Quản lí người dùng</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body">
                  <div class="body-first">
                    <a href="index.php?action=add-user" id="btn-add-cate"><span>Thêm người dùng mới</span><i class="fa-solid fa-plus"></i></a>
                  </div>
                  <div class="body-second">
                    <table>
                      <thead>
                        <tr>
                          <th>Tên người dùng</th>
                          <th>Email</th>
                          <th>Mật khẩu</th>
                          <th>Khóa</th>
                          <th>Ủy quyền</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody id="user-table-body">
                        <?php foreach ($data_users as $data_user) :?>
                            <tr>
                          <td><p><?=$data_user['name_user']?></p></td>
                          <td><p><?=$data_user['email_user']?></p></td>
                          <td><p><?=$data_user['password']?></p></td>
                          <td>
                            <form class="toggle-box" action="">
                              <input class="toggle-input" type="checkbox" <?= $data_user['option_user'] ? 'checked' : '' ?> readonly>
                              <label>
                                <div class="handle"></div>
                              </label>
                            </form>
                          </td>
                          <td><p><?= $data_user['name_role'] ?></p></td>
                          <td>
                            <p>
                              <a href="index.php?action=update-user&id=<?=$data_user['id_user']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="index.php?action=delete-user&id=<?=$data_user['id_user']?>"><i class="fa-solid fa-trash"></i></a>
                            </p>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                    <ul class="list-page"></ul>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </main>
      <?php include_once "./Views/Admin/layout/footer.php"?>
      </div>
    </div>
    <script src="Common/assets/js/admin.js"></script>
    <script src="Common/assets/js/user.js"></script>
  </body>
</html>