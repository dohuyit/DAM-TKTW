<?php
class UserControllers
{
    public function loginUser()
    {
        $errors = [];
        if (isset($_SESSION['name_account']) && $_SESSION['role'] == 'user') {
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Bạn đã đăng nhập thành công!',
                'type' => 'success',
                'redirect' => 'index.php'
            ];
            showAlert();
            exit();
        } else if (isset($_SESSION['name_account']) && $_SESSION['role'] == 'admin') {
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Bạn đã đăng nhập thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=admin'
            ];
            showAlert();
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                }
            } else {
                if ($dataUser) {
                    if ($dataUser['option_user'] != 0) {
                        $_SESSION['alert'] = [
                            'title' => 'Lỗi!!!',
                            'message' => 'Tài khoản của bạn đã bị khóa, liên hệ quản trị viên!',
                            'type' => 'error',
                            'redirect' => 'index.php?action=login',
                        ];
                        showAlert();
                        exit();
                    } else {
                        if ($password === $dataUser['password']) {
                            $_SESSION['name_account'] = $dataUser;
                            $_SESSION['role'] = $dataUser['name_role'];
                            $_SESSION['alert'] = [
                                'title' => 'Success',
                                'message' => 'Đăng nhập thành công!',
                                'type' => 'success',
                                'redirect' => $dataUser['name_role'] === 'admin' ? 'index.php?action=admin' : 'index.php'
                            ];
                            showAlert();
                            exit();
                        } else {
                            $errors['password'] = "Mật khẩu không đúng, hãy nhập lại";
                        }
                    }
                } else {
                    $errors['name_account'] = "Tài khoản không đúng, hãy nhập lại";
                }
            }
        }
        viewClients('clients-login', [
            'errors' => $errors ?? '',
            'name_account' => $name_account ?? ''
        ]);
    }


    public function registerUser()
    {
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
                } else {
                    $userModel->registerUser($name_account, $email, $password, $role);
                    $_SESSION['alert'] = [
                        'title' => 'Success',
                        'message' => 'Đăng kí thành công!',
                        'type' => 'success',
                        'redirect' => 'index.php?action=login',
                    ];
                    showAlert();
                    exit();
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

    public function viewLogout()
    {
        viewAdmin('a.logout');
    }

    public function logoutUser()
    {
        if ($_SESSION['role'] === 'admin') {
            unset($_SESSION['name_account']);
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Đăng xuất thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=view-logout',
            ];
            showAlert();
            exit();
        } else {
            unset($_SESSION['name_account']);
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Đăng xuất thành công!',
                'type' => 'success',
                'redirect' => 'index.php',
            ];
            showAlert();
            exit();
        }
    }

    public function fogotPassword()
    {
        sendMail('huydonganh2005@gmail.com', 'Đỗ Huy IT', 'Học Web Vui Lắm');
    }
}
