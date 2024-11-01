<?php
class AdminProductsControllers
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

    public function listProducts()
    {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $dataAll = (new ModelProductsAdmin)->getAllProducts();
        viewAdmin('myProducts', ['dataAll' => $dataAll, 'name_account' => $name_account]);
    }

    public function addProducts()
    {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $dataCate = (new CategoryModel)->getAllCategories();
        viewAdmin('add-products', ['dataCate' => $dataCate, 'name_account' => $name_account]);
    }

    public function storeProducts()
    {
        $dataForm = $_POST;
        $dataImage = "";
        $file_image = $_FILES['image'];
        $errors = [];

        if (empty($dataForm['name'])) {
            $errors['name'] = 'Tên sản phẩm không được để trống';
        } else if (strlen($dataForm['name']) < 5) {
            $errors['name'] = 'Tên sản phẩm phải lớn hơn 5 ký tự';
        }

        if (empty($dataForm['original_price'])) {
            $errors['original_price'] = 'Giá sản phẩm không được để trống';
        }

        if (!is_numeric($dataForm['discount_number'])) {
            $errors['discount_number'] = 'Số % giảm giá phải là số';
        }

        // validate hình ảnh
        if ($file_image['size'] > 0) {
            $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
            $ext = pathinfo($file_image['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $img_ext)) {
                $errors['image'] = "File ảnh không đúng định dạng &#10006";
            }
        }

        if (!empty($errors)) {
            $dataCate = (new CategoryModel)->getAllCategories();
            $name_account = $_SESSION['name_account'] ?? '';
            return viewAdmin('add-products', [
                'dataCate' => $dataCate,
                'errors' => $errors,
                'dataForm' => $dataForm,
                'name_account' => $name_account
            ]);
        }

        if ($file_image['size'] > 0) {
            $dataImage = "Common/assets/img/" . $file_image['name'];
            move_uploaded_file($file_image['tmp_name'], $dataImage);
        }
        $dataForm['image'] = $dataImage;

        $original_price = isset($dataForm['original_price']) ? floatval($dataForm['original_price']) : 0;
        $discount_number = isset($dataForm['discount_number']) ? floatval($dataForm['discount_number']) : 0;
        $discount_price = $original_price * (1 - $discount_number / 100);
        $dataForm['discount_price'] = $discount_price;

        $dataForm['flash_sale'] = isset($dataForm['flash_sale']) ? intval($dataForm['flash_sale']) : 0;
        $dataForm['id_cate'] = isset($dataForm['id_cate']) ? intval($dataForm['id_cate']) : 0;
        $dataForm['desc'] = isset($dataForm['desc']) ? $dataForm['desc'] : "";

        (new ModelProductsAdmin)->add($dataForm);
        $_SESSION['alert'] = [
            'title' => 'Success',
            'message' => 'Thêm sản phẩm thành công!',
            'type' => 'success',
            'redirect' => 'index.php?action=admin-products',
        ];
        showAlert();
        exit();
    }

    public function updateProducts()
    {
        $this->checkUserRole();
        $message = "";
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dataUpdate = $_POST;
            $file_imgUD = $_FILES['image'];

            if ($file_imgUD['size'] > 0) {
                $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
                $ext = pathinfo($file_imgUD['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $img_ext)) {
                    $errors['image'] = "File ảnh không đúng định dạng &#10006";
                }
            }

            if ($file_imgUD['size'] > 0) {
                $dataImage = "Common/assets/img/" . $file_imgUD['name'];
                $dataUpdate['image'] = $dataImage;
                move_uploaded_file($file_imgUD['tmp_name'], $dataImage);
            }
            (new ModelProductsAdmin)->update($dataUpdate);
            $_SESSION['alert'] = [
                'title' => 'Success',
                'message' => 'Cập nhật dữ liệu thành công!',
                'type' => 'success',
                'redirect' => 'index.php?action=admin-products',
            ];
            showAlert();
            exit();
        }
        $dataCate = (new CategoryModel)->getAllCategories();
        $id_products = $_GET['id'];
        $products = (new ModelProductsAdmin)->getOneProducts($id_products);
        $name_account = $_SESSION['name_account'] ?? '';
        viewAdmin(
            'update-products',
            [
                'dataCate' => $dataCate,
                'products' => $products,
                'errors' => $errors,
                'message' => $message,
                'name_account' => $name_account,
            ]
        );
    }
    // ================ Xóa sản phẩm ===============//
    public function deleteProducts()
    {
        $id = $_GET['id'];
        (new ModelProductsAdmin)->delete($id);
        // header("location: index.php?action=admin-products");
        $_SESSION['alert'] = [
            'title' => 'Success',
            'message' => 'Xóa sản phẩm thành công!',
            'type' => 'success',
            'redirect' => 'index.php?action=admin-products',
        ];
        showAlert();
        exit();
    }
}
