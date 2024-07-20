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
                          <th>Tên người dùng</th>
                          <th>Nội dung</th>
                          <th>Thời gian bình luận</th>
                          <th>Thao tác</th>
                        </tr>
                      </thead>
                      <tbody id="user-table-body">
                        <?php foreach ($data_views as $view ) :?>
                          <tr>
                          <td><p><?= $view['name_user']?></p></td>
                          <td><p><?= $view['content_comments']?></p></td>
                          <td><p><?= $view['day_comments']?></p></td>
                          <td class="button-close"><a href="index.php?action=delete-comment&id_delete=<?=$view['id_comments']?>"><i class="fa-solid fa-circle-xmark"></i></a></td>
                        </tr>
                        <?php endforeach ?>
                        <!-- Thêm nhiều thẻ <tr> tương tự -->
                      </tbody>
                    </table>
                    <a href="index.php?action=admin-comment" class="btn-revert"><span><i class="fa-solid fa-arrow-rotate-left"></i></span>Quay Lại</a>
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
