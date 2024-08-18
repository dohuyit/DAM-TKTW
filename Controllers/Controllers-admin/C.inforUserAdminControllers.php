<?php
class inforUserAdminControllers
{

    public function __construct()
    {
        if (!isset($_SESSION['name_account'])) {
            header("location: index.php?action=login");
            die;
        }
    }

    private function checkUserRole()
    {
        if ($_SESSION['role'] !== 'admin') {
            echo "<script>alert('Bạn không có quyền truy cập trang này!');window.location.href='index.php';</script>";
            exit();
        }
    }
    public function listUser()
    {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $data_users = (new inforUserModel)->getAllUser();
        viewAdmin('myUser', [
            'data_users' => $data_users,
            'name_account' => $name_account
        ]);
    }

    public function addUser()
    {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $dataRole = (new inforUserModel)->getAllRole();
        viewAdmin('add-user', [
            'dataRole' => $dataRole,
            'name_account' => $name_account
        ]);
    }

    public function storeUser()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataForm = $_POST;
            $id_role = 1;
            if (empty($dataForm['name_account'])) {
                $errors['name_account'] = "Tên tài khoản không được để trống";
            }
            if (empty($dataForm['name_user'])) {
                $errors['name_user'] = "Tên tài khoản không được để trống";
            }
            if (empty($dataForm['email_user'])) {
                $errors['email_user'] = "Email không được để trống";
            } else {
                if ((new inforUserModel)->countAllInforUser($dataForm['email_user'])) {
                    $errors['email_user'] = "Email đã tồn tại, hãy chọn email khác";
                }
            }
            if (empty($dataForm['password'])) {
                $errors['password'] = "Mật khẩu không được để trống";
            }

            if (!empty($errors)) {
                $name_account = $_SESSION['name_account'] ?? '';
                return viewAdmin('add-user', [
                    'errors' => $errors,
                    'dataForm' => $dataForm,
                    'name_account' => $name_account
                ]);
            }
        }
        (new inforUserModel)->add($dataForm['name_account'], $dataForm['name_user'], $dataForm['email_user'], $dataForm['password'], $id_role);
        $_SESSION['alert'] = [
            'title' => 'Success',
            'message' => 'Thêm dữ liệu thành công!',
            'type' => 'success',
            'redirect' => 'index.php?action=admin-user',
        ];
        showAlert();
        exit();
    }

    public function updateUser()
    {
        $this->checkUserRole();
        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dataForm = $_POST;

            $id_user = $dataForm['id_user'];
            if ((new inforUserModel)->countAllInforUserExceptCurrent($dataForm['email_user'], $id_user)) {
                $errors['email_user'] = "Email đã tồn tại, hãy chọn email khác";
            }

            $img_user = '';
            $file_img_user = $_FILES['image_user'];
            if ($file_img_user['size'] > 0) {
                $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
                $ext = pathinfo($file_img_user['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $img_ext)) {
                    $errors['image_user'] = "File ảnh không đúng định dạng &#10006";
                } else {
                    $img_user = "Common/assets/img/" . $file_img_user['name'];
                    $dataForm['image_user'] = $img_user;
                    move_uploaded_file($file_img_user['tmp_name'], $img_user);
                }
            }

            if (!empty($errors)) {
                $dataRole = (new inforUserModel)->getAllRole();
                $name_account = $_SESSION['name_account'] ?? '';

                $user = (new inforUserModel)->getOneUser($id_user);
                return viewAdmin('update-user', [
                    'dataRole' => $dataRole,
                    'user' => $user,
                    'errors' => $errors,
                    'name_account' => $name_account,
                ]);
            }

            (new inforUserModel)->update($dataForm);
            //  echo '<script>alert("Cập nhật dữ liệu thành công"); window.location.href = "index.php?action=admin-user";</script>';
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Cập nhật dữ liệu thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=admin-user',
            ];
            showAlert();
            exit();
        }

        $dataRole = (new inforUserModel)->getAllRole();
        $id_user = $_GET['id'];
        $user = (new inforUserModel)->getOneUser($id_user);
        $name_account = $_SESSION['name_account'] ?? '';
        viewAdmin('update-user', [
            'dataRole' => $dataRole,
            'user' => $user,
            'errors' => $errors,
            'message' => $message,
            'name_account' => $name_account,
        ]);
    }

    public function deleteUser()
    {
        $id = $_GET['id'];
        (new inforUserModel)->delete($id);
        $_SESSION['alert'] = [
            'title' => 'Success',
            'message' => 'Xóa dữ liệu thành công!',
            'type' => 'success',
            'redirect' => 'index.php?action=admin-user',
        ];
        showAlert();
        exit();
    }
}
