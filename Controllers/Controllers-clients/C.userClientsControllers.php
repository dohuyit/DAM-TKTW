<?php 
class ClientsUserControllers{

    public function loginClients(){
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name_user = $_POST['name_user'];
            $password = $_POST['password'];
            $dataUser = (new userClientsModels)->getAllUserClients($name_user);

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
                        $_SESSION['id_user'] = $dataUser['id_user'];
                        $_SESSION['name_user'] = $dataUser;
                        $_SESSION['role'] = $dataUser['name_role'];
                        if ($dataUser['name_role'] === 'admin') {
                            echo "<script>alert('Đăng nhập thành công!');window.location.href='index.php?action=admin';</script>";
                        } else {
                          echo "<script>alert('Đăng nhập thành công!');window.location.href='index.php';</script>";
                        }
                    } else {
                        $errors['password'] = "Mật khẩu không đúng, hãy nhập lại";
                    }
                } else {
                    $errors['name_user'] = "Tài khoản không đúng, hãy nhập lại";
                }
            }
        }
        viewClients('clients-login',[
            'errors' => $errors ?? '',
            'name_user' => $name_user ?? ''
        ]
        );
    }

    public function registerClients() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_user = $_POST['name_user'];
            $email = $_POST['email_user'];
            $password = $_POST['password'];
            $role = 2;

            if (empty($name_user) || empty($password) || empty($email)) {
                if (empty($name_user)) {
                    $errors['name_user'] = "Tên tài khoản không được để trống";
                }
                if (empty($email)) {
                    $errors['email_user'] = "Email không được để trống";
                }
                if (empty($password)) {
                    $errors['password'] = "Mật khẩu không được để trống";
                }
            } else {
                $userModel = new userClientsModels();
                if ($userModel->countAllEmailUser($name_user, $email)) {
                    $errors['email_user'] = "Email hoặc Tên đã tồn tại, hãy chọn email khác";
                    $errors['name_user'] = "Email hoặc Tên đã tồn tại, hãy chọn email khác";
                } else {
                    $userModel->registerUserClients($name_user, $email, $password, $role);
                    echo "<script>alert('Đăng kí thành công!');window.location.href='index.php?action=login-clients';</script>";
                    die();
                }
            }
        }

        viewClients('clients-register', [
            'errors' => $errors,
            'name_user' => $name_user ?? '',
            'email' => $email ?? '',
            'password' => $password ?? ''
        ]);
    }

    public function logoutClients(){
        unset($_SESSION['name_user']);
        header('location: index.php?action=login-clients');
    }
}
?>