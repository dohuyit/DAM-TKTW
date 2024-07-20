<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.category.css" />
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
                <h1>Danh mục</h1>
              </div>
              <!-- main body -->
              <div class="main-content">
                <div class="body-category">
                  <div class="body-first">
                    <div id="btn-add-cate"><span>Thêm danh mục mới</span><i class="fa-solid fa-plus"></i></div>
                    <form action="index.php?action=store-cate" method="post" id="form-add-cate" class="form" enctype="multipart/form-data">
                      <div class="form-main">
                        <div class="item-child">
                          <h3>Tên Danh Mục</h3>
                          <input type="text" name="name_cate" id="" placeholder="Tên danh mục...">
                          <?php if(isset($errors['name_cate'])) :?>
                            <p class="errors-text"><?=$errors['name_cate']?></p>
                          <?php endif;?>
                        </div>
                        <div class="item-child">
                          <h3>Ảnh Danh Mục</h3>
                          <input type="file" name="img_cate" id="">
                        </div>
                      </div>
                      <button type="submit">Thêm danh mục</button>
                    </form>
                  </div>
                  <div class="body-second">
                    <table>
                      <thead>
                        <th>Tên danh mục</th>
                        <th>Ảnh danh mục</th>
                        <th>Thao tác</th>
                      </thead>
                      <tbody>
                        <?php foreach ($dataCateAll as $dataCate) : ?>
                        <tr>
                          <td><p><?=$dataCate['name_cate']?></p></td>
                          <td><img src="<?=$dataCate['img_cate']?>" alt=""></td>
                          <td>
                            <p>
                              <a href="index.php?action=update-cate&id=<?=$dataCate['id_cate']?>" class="update-form"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a href="index.php?action=delete-cate&id=<?=$dataCate['id_cate']?>"><i class="fa-solid fa-trash"></i></a>
                            </p>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
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
    <script src="Common/assets/js/a.category.js"></script>
  </body>
</html>
