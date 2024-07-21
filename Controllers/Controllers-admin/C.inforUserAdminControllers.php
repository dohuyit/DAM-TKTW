<?php 
class inforUserAdminControllers{

    public function __construct()
    {
        if(!isset($_SESSION['name_user'])){
            header("location: index.php?action=login");
            die;
        }
    }
    public function listUser(){
        $name_user = $_SESSION['name_user'] ?? '';
        $data_users = (new inforUserModel)->getAllUser();
        viewAdmin('myUser',[
            'data_users' => $data_users,
            'name_user' => $name_user
        ]);
    }

    public function addUser(){
        $name_user = $_SESSION['name_user'] ?? '';
        $dataRole= (new inforUserModel)->getAllRole();
        viewAdmin('add-user',[
            'dataRole' => $dataRole,
            'name_user' => $name_user
        ]);
    }

    public function storeUser(){
        $dataForm = $_POST;
        $img_user = '';
        $errors =[];
        $file_img_user = $_FILES['image_user'];
        if ($file_img_user['size'] > 0) {
            $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
            $ext = pathinfo($file_img_user['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $img_ext)) {
                $errors['image'] = "File ảnh không đúng định dạng &#10006";
            }
        }
    
        if (!empty($errors)) {
            $dataRole= (new inforUserModel)->getAllRole();
            return viewAdmin('add-user', [
                'dataRole' => $dataRole,
                'errors' => $errors,
                'dataForm' => $dataForm,
            ]);
        }
    
        if ($file_img_user['size'] > 0) {
            $img_user = "Common/assets/img/" . $file_img_user['name'];
            move_uploaded_file($file_img_user['tmp_name'], $img_user);
        }
        $dataForm['image_user'] = $img_user;
        (new inforUserModel)->add($dataForm);
        header("location: index.php?action=admin-user");
    }

    public function updateUser(){
        $message = '';
        $errors =[];
        if($_SERVER['REQUEST_METHOD'] == "POST"){
        $dataForm = $_POST;
        $img_user = '';
        $file_img_user = $_FILES['image_user'];
        if ($file_img_user['size'] > 0) {
            $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
            $ext = pathinfo($file_img_user['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $img_ext)) {
                $errors['image_user'] = "File ảnh không đúng định dạng &#10006";
            }
        }
    
        if ($file_img_user['size'] > 0) {
            $img_user = "Common/assets/img/" . $file_img_user['name'];
            $dataForm['image_user'] = $img_user;
            move_uploaded_file($file_img_user['tmp_name'], $img_user);
        }

        (new inforUserModel)->update($dataForm);
        $message = '<script>alert("Cập nhật dữ liệu thành công"); window.location.href = "index.php?action=admin-user";</script>';
        }
        $dataRole= (new inforUserModel)->getAllRole();
        $id_user = $_GET['id'];
        $user = (new inforUserModel)->getOneUser($id_user);
         $name_user = $_SESSION['name_user'] ?? '';
         viewAdmin('update-user',
         [ 
            'dataRole' => $dataRole,
            'user' => $user,
            'errors' => $errors,
            'message' => $message,
            'name_user' => $name_user,
         ]
        );
        
    }

    public function deleteUser(){
        $id = $_GET['id'];
        (new inforUserModel)->delete($id);
        echo '<script>alert("Xóa dữ liệu thành công"); window.location.href = "index.php?action=admin-user";</script>';
        die;
    }
}
?>