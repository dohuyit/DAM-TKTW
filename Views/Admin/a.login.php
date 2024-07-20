<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/a.login.css" />
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
    <div class="wrapper-main">
      <section class="card-body">
        <article>
          <h3><img src="Common/assets/img/pnj-logo.png" alt="" /></h3>
          <p>Sign in to my Website Admin</p>
        </article>
        <form action="" method="post">
          <div class="item-form">
            <label for="">Username</label>
            <input
              type="text"
              name="name_user"
              id=""
              placeholder="Tài khoản của bạn..."
              value="<?= htmlspecialchars($name_user ?? '' )?>"
            />
            <?php if (isset($errors['name_user'])) :?>
                <p class="errors-form"><span>&#10006</span><span><?=$errors['name_user']?></span></p>
            <?php endif ?>
          </div>
          <div class="item-form">
            <label for="">Password</label>
            <input
              type="password"
              name="password"
              id=""
              placeholder="Mật khẩu của bạn..."
            />
            <?php if (isset($errors['password'])) :?>
                <p class="errors-form"><span>&#10006</span><span><?=$errors['password']?></span></p>
            <?php endif ?>
          </div>
          <div class="form-check">
            <input type="checkbox" name="" id="" />
            <label for="">Remember me</label>
          </div>
          <button type="submit" class="btn-submit">Login</button>
          <div class="signin-orther-title">
            <h4>Sign in with</h4>
            <div class="form-media">
              <span><i class="fa-brands fa-google"></i></span>
              <span><i class="fa-brands fa-facebook"></i></span>
              <span><i class="fa-brands fa-github"></i></span>
              <span><i class="fa-brands fa-discord"></i></span>
            </div>
          </div>
        </form>
      </section>
    </div>
  </body>
</html>
