<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Common/assets/css/reset.css" />
  <link rel="stylesheet" href="Common/assets/css/clients-login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"> -->
  <title>Document</title>
</head>
<link rel="icon" href="Common/assets/img/pnj-icon.ico" type="image/x-icon" />

<body>
  <div class="wrapper-main">
    <div class="custom-shape-divider-top-1720948200">
      <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
      </svg>
    </div>

    <section class="card-body">
      <article>
        <h3><img src="Common/assets/img/pnj-logo.png" alt="" /></h3>
        <p>Chào mừng đến với website của tôi</p>
      </article>
      <form action="" method="post">
        <div class="item-form">
          <label for="">Tên tài khoản</label>
          <input type="text" name="name_account" id="" placeholder="Tài khoản của bạn..." value="<?= htmlspecialchars($name_account ?? '') ?>" />
          <?php if (isset($errors['name_account'])) : ?>
            <p class="errors-form"><span>&#10006</span><span><?= htmlspecialchars($errors['name_account']) ?></span></p>
          <?php endif ?>
        </div>
        <div class="item-form">
          <label for="">Password</label>
          <input type="password" name="password" id="" placeholder="Mật khẩu của bạn..." />
          <?php if (isset($errors['password'])) : ?>
            <p class="errors-form"><span>&#10006</span><span><?= htmlspecialchars($errors['password']) ?></span></p>
          <?php endif ?>
        </div>
        <div class="form-check">
          <input type="checkbox" name="" id="" />
          <label for="">Remember me</label>
        </div>
        <button type="submit" class="btn-submit">Login</button>
        <div class="signin-orther-title">
          <p>Don't have an account? <a href="index.php?action=register">signup</a></p>
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