<?php 
class inforUserClientsControllers{
    public function listInfor(){
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dataForm = $_POST;
            $id_user = $dataForm['id_user'];

            if ((new ModelsInforUserClients)->countAllInforUserClients($dataForm['email_user'], $id_user)) {
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
                $name_account = $_SESSION['name_account'] ?? '';
                $user = (new ModelsInforUserClients)->getOneUser($id_user);
                return viewClients('clients-inforUser', [
                    'user' => $user,
                    'errors' => $errors,
                    'name_account' => $name_account,
                ]);
            }
            (new ModelsInforUserClients)->update($dataForm);
            echo '<script>alert("Gửi dữ liệu thành công"); window.location.href = "index.php?action=inforUser&id=' . $_SESSION['name_account']['id_user'] . '";</script>';

        }
        $id_user = $_GET['id'];
        $userClients = (new ModelsInforUserClients)->getOneUser($id_user);
        $name_account = $_SESSION['name_account'] ?? '';
        viewClients('clients-inforUser', [
            'userClients' => $userClients,
            'errors' => $errors,
            'name_account' => $name_account,
        ]);
    }
}
?>
