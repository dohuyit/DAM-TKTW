<?php 
class UserControllers{
    public function loginUser(){
        $errors = [];
        if(isset($_SESSION['name_account']) && $_SESSION['role'] == 'user'){
            header("location: index.php");
            die;
        }else if(isset($_SESSION['name_account']) && $_SESSION['role'] == 'admin'){
            header("location: index.php?action=admin");
            die;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name_account = $_POST['name_account'];
            $password = $_POST['password'];
            $dataUser = (new userModels)->getLoginUser($name_account);

            if (empty($name_account) || empty($password)) {
                if (empty($name_account) && empty($password)) {
                    $errors['name_account'] = "Tên tài khoản không được để trống";
                    $errors['password'] = "Mật khẩu không được để trống";
                } else if (empty($name_account)) {
                      $errors['name_account'] = "Tên tài khoản không được để trống";
                } else if (empty($password)) {
                      $errors['password'] = "Mật khẩu không được để trống";
                };
              } else {
                if ($dataUser) {
                    if($dataUser['option_user'] != 0){
                        echo "<script>alert('Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên!');</script>";
                    }else{
                        if ($password === $dataUser['password']) {
                            $_SESSION['name_account'] = $dataUser;
                            $_SESSION['role'] = $dataUser['name_role'];
                            if ($dataUser['name_role'] === 'admin') {
                                echo "<script>alert('Đăng nhập thành công!');window.location.href='index.php?action=admin';</script>";
                            } else {
                              echo "<script>alert('Đăng nhập thành công!');window.location.href='index.php';</script>";
                            }
                        } else {
                            $errors['password'] = "Mật khẩu không đúng, hãy nhập lại";
                        }
                    }
                } else {
                    $errors['name_account'] = "Tài khoản không đúng, hãy nhập lại";
                }
            }
        }
        viewClients('clients-login',[
            'errors' => $errors ?? '',
            'name_account' => $name_account ?? ''
        ]
        );
    }

    public function registerUser() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name_account = $_POST['name_account'];
            $email = $_POST['email_user'];
            $password = $_POST['password'];
            $role = 2;

            if (empty($name_account) || empty($password) || empty($email)) {
                if (empty($name_account)) {
                    $errors['name_account'] = "Tên tài khoản không được để trống";
                }
                if (empty($email)) {
                    $errors['email_user'] = "Email không được để trống";
                }
                if (empty($password)) {
                    $errors['password'] = "Mật khẩu không được để trống";
                }
            } else {
                $userModel = (new userModels);
                if ($userModel->countAllEmailUser($name_account, $email)) {
                    $errors['email_user'] = "Email hoặc Tên đã tồn tại, hãy chọn email khác";
                    $errors['name_account'] = "Email hoặc Tên đã tồn tại, hãy chọn email khác";
                } else {
                    $userModel->registerUser($name_account, $email, $password, $role);
                    echo "<script>alert('Đăng kí thành công!');window.location.href='index.php?action=login';</script>";
                    die();
                }
            }
        }

        viewClients('clients-register', [
            'errors' => $errors,
            'name_account' => $name_account ?? '',
            'email' => $email ?? '',
            'password' => $password ?? ''
        ]);
    }

    public function viewLogout(){
        viewAdmin('a.logout');
    }

    public function logoutUser(){
        if($_SESSION['role'] === 'admin'){
            unset($_SESSION['name_account']);
            echo "<script>alert('Đăng xuất thành công!');window.location.href='index.php?action=view-logout';</script>";
        }else {
            unset($_SESSION['name_account']);
            echo "<script>alert('Đăng xuất thành công!');window.location.href='index.php';</script>";
        }
    }
}
?>