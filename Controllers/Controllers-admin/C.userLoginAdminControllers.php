<?php 

class AdminUserControllers{
    public function login(){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name_user = $_POST['name_user'];
            $password = $_POST['password'];
            $dataUser = (new userAdminModels)->getAllUser($name_user);

            if (empty($name_user) || empty($password)) {
                if (empty($name_user) && empty($password)) {
                    $errors['name_user'] = "Tên tài khoản không được để trống";
                    $errors['password'] = "Mật khẩu không được để trống";
                } else if (empty($name_user)) {
                      $errors['name_user'] = "Tên tài khoản không được để trống";
                } else if (empty($password)) {
                      $errors['password'] = "Mật khẩu không được để trống";
                };
              } else {
                if ($dataUser) {
                    if ($password === $dataUser['password']) {
                        $_SESSION['name_user'] = $dataUser;
                        echo "<script>alert('Đăng nhập thành công!');window.location.href='index.php?action=admin';</script>";
                    } else {
                        $errors['password'] = "Mật khẩu không đúng, hãy nhập lại";
                    }
                } else {
                    $errors['name_user'] = "Tài khoản không đúng, hãy nhập lại";
                }
            }
        }
        viewAdmin('a.login',[
            'errors' => $errors ?? '',
            'name_user' => $name_user ?? ''
        ]
        );
    }

    public function viewLogout(){
        viewAdmin('a.logout');
    }

    public function logout(){
        unset($_SESSION['name_user']);
        header('location: index.php?action=view-logout-admin');
    }
}
?>