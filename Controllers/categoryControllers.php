<?php 
class CategoryControllers{
    public function listCategory(){
        $name_user = $_SESSION['name_user'] ?? '';
        $dataCateAll = (new CategoryModel)->getAllCategories();
        viewAdmin('myCategory',['dataCateAll'=>$dataCateAll,'name_user'=>$name_user]);
    }

    public function storeCategory(){
        $FormCate = $_POST;
        $img_cate = '';
        $file_img_cate = $_FILES['img_cate'];
        $errors = [];
        
        if(empty($FormCate['name_cate'])){
            $errors['name_cate'] = "Tên danh mục không được để trống";
        }else if(strlen($FormCate['name_cate']) < 5){
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
        $name_user = $_SESSION['name_user'] ?? '';
            return viewAdmin('myCategory', [
                'errors' => $errors,
                'FormCate' => $FormCate,
                'dataCateAll' => $dataCateAll,
                'name_user' => $name_user,
            ]);
        }
    
        if($file_img_cate['size'] > 0){
            $img_cate = "Common/assets/img/" . $file_img_cate['name'];
            move_uploaded_file($file_img_cate['tmp_name'], $img_cate);
        }
        
        $FormCate['img_cate'] = $img_cate;
        (new CategoryModel)->add($FormCate);
        header("location: index.php?action=category");
    }
    

    public function updateCategory(){
        $message = '';
        $errors = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $FormCate = $_POST;
          $file_img_cate = $_FILES['img_cate'];
        if ($file_img_cate['size'] > 0) {
            $img_ext = ['jpg', 'png', 'gif', 'svg', 'webp', 'avif'];
            $ext = pathinfo($file_img_cate['name'], PATHINFO_EXTENSION);
            if (!in_array($ext, $img_ext)) {
                $errors['img_cate'] = "File ảnh không đúng định dạng &#10006";
            }
        }
        if($file_img_cate['size'] > 0){
            $img_cate = "Common/assets/img/" . $file_img_cate['name'];
            $FormCate['img_cate']=$img_cate;
            move_uploaded_file($file_img_cate['tmp_name'],$img_cate);
        }
        (new CategoryModel)->update($FormCate);
        $message = '<script>alert("Cập nhật dữ liệu thành công"); window.location.href = "index.php?action=category";</script>';
        }
        $id_cate = $_GET['id'];
        $category = (new CategoryModel)->getOneCategories($id_cate);
        $name_user = $_SESSION['name_user'] ?? '';
        viewAdmin('update-category',
        [
        'category' => $category,
        'errors' => $errors,
        'message' => $message,
        'name_user' => $name_user,
        ]
      );
    }

    public function deleteCategory(){
        $id = $_GET['id'];
        (new CategoryModel)->delete($id);
        header("location: index.php?action=category");
        die;
    }
}
?>