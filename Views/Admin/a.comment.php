<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.comment.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="icon" href="Common/assets/img/pnj-icon.ico" type="image/x-icon" />
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
                <h1>Phản hồi từ khách hàng</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body">
                  <div class="body-main-table">
                    <table>
                      <thead>
                        <tr>
                          <th>Ảnh sản phẩm</th>
                          <th>Tên sản phẩm</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody id="user-table-body">
                        <?php foreach ($data_comments as $commentsValue) :?>
                            <tr>
                          <td><img src="<?=$commentsValue['image']?>" alt=""></td>
                          <td><p><?=$commentsValue['name']?></p></td>
                          <td class="button-view">
                              <a href="index.php?action=admin-view-comment&id=<?=$commentsValue['id']?>"><i class="fa-solid fa-eye"></i></a>
                          </td>
                        </tr>
                        <?php endforeach;?>
                        <!-- Thêm nhiều thẻ <tr> tương tự -->
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
