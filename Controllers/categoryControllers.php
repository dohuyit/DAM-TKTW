<?php
class CategoryControllers
{
    public function __construct()
    {
        if (!isset($_SESSION['name_account'])) {
            header("location: index.php?action=login");
            die();
        }
    }
    private function checkUserRole()
    {
        if ($_SESSION['role'] !== 'admin') {
            echo "<script>alert('Bạn không có quyền truy cập trang này!');window.location.href='index.php';</script>";
            exit();
        }
    }
    public function listCategory()
    {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $dataCateAll = (new CategoryModel)->getAllCategories();
        viewAdmin('myCategory', ['dataCateAll' => $dataCateAll, 'name_account' => $name_account]);
    }

    public function storeCategory()
    {
        $FormCate = $_POST;
        $img_cate = '';
        $file_img_cate = $_FILES['img_cate'];
        $errors = [];

        if (empty($FormCate['name_cate'])) {
            $errors['name_cate'] = "Tên danh mục không được để trống";
        } else if (strlen($FormCate['name_cate']) < 5) {
            $errors['name_cate'] = "Tên danh mục phải nhiều hơn 5 ký tự";
        }

        if ($file_img_cate['size'] > 0) {
            $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
            $ext = pathinfo($file_img_cate['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $img_ext)) {
                $errors['img_cate'] = "File ảnh không đúng định dạng";
            }
        }

        if (!empty($errors)) {
            $dataCateAll = (new CategoryModel)->getAllCategories();
            $name_account = $_SESSION['name_account'] ?? '';
            return viewAdmin('myCategory', [
                'errors' => $errors,
                'FormCate' => $FormCate,
                'dataCateAll' => $dataCateAll,
                'name_account' => $name_account,
            ]);
        }

        if ($file_img_cate['size'] > 0) {
            $img_cate = "Common/assets/img/" . $file_img_cate['name'];
            move_uploaded_file($file_img_cate['tmp_name'], $img_cate);
        }

        $FormCate['img_cate'] = $img_cate;
        (new CategoryModel)->add($FormCate);
        // header("location: index.php?action=category");
        $_SESSION['alert'] = [
            'title' => 'Success',
            'message' => 'Thêm dữ liệu thành công!',
            'type' => 'success',
            'redirect' => 'index.php?action=category',
        ];
        showAlert();
        exit();
    }


    public function updateCategory()
    {
        $this->checkUserRole();
        $message = '';
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $FormCate = $_POST;
            $file_img_cate = $_FILES['img_cate'];
            if ($file_img_cate['size'] > 0) {
                $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
                $ext = pathinfo($file_img_cate['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $img_ext)) {
                    $errors['img_cate'] = "File ảnh không đúng định dạng &#10006";
                }
            }
            if ($file_img_cate['size'] > 0) {
                $img_cate = "Common/assets/img/" . $file_img_cate['name'];
                $FormCate['img_cate'] = $img_cate;
                move_uploaded_file($file_img_cate['tmp_name'], $img_cate);
            }
            (new CategoryModel)->update($FormCate);
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Cập nhật dữ liệu thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=category',
            ];
            showAlert();
            exit();
        }
        $id_cate = $_GET['id'];
        $category = (new CategoryModel)->getOneCategories($id_cate);
        $name_account = $_SESSION['name_account'] ?? '';
        viewAdmin(
            'update-category',
            [
                'category' => $category,
                'errors' => $errors,
                'message' => $message,
                'name_account' => $name_account,
            ]
        );
    }

    // public function deleteCategory(){
    //     $id = $_GET['id'];
    //     (new CategoryModel)->delete($id);
    //     $_SESSION['alert'] = [
    //         'title' => 'Success',
    //         'message' => 'Xóa dữ liệu thành công!',
    //         'type' => 'success',
    //         'redirect' => 'index.php?action=category',
    //     ];
    //     showAlert();
    //     exit();
    // }


    public function deleteCategory()
    {
        $id = $_GET['id'];

        try {
            (new CategoryModel)->delete($id);
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Xóa dữ liệu thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=category',
            ];
        } catch (PDOException $e) {
            $_SESSION['alert'] = [
                'title' => 'Error',
                'message' => 'Không thể xóa danh mục này vì có sản phẩm liên kết!',
                'type' => 'error',
                'redirect' => 'index.php?action=category',
            ];
        }
        showAlert();
        exit();
    }
}
