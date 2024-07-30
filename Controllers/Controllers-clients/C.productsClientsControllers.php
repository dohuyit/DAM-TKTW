<?php
class ProductsClientController {

    public function checkUserRole() {
        if(!isset($_SESSION['role'])){
            $_SESSION['role'] = "";
        }
        if ($_SESSION['role'] === 'admin') {
            echo "<script>alert('Bạn không có quyền truy cập trang này!');window.location.href='index.php?action=admin';</script>";
            exit();
        }
    }

    // sản phẩm theo danh mục
    public function ProductsByCate() {
        $this->checkUserRole(); 
        $id_cate = $_GET['id_cate'];
        $dataProducts = (new ModelProductsClients)->getProductsByCate($id_cate); 
        $cate_data = (new CategoryModel)->getAllCategories();
        $name_cate = (new CategoryModel)->getOneCategories($id_cate)['name_cate'];
        $img_cate = (new CategoryModel)->getOneCategories($id_cate)['img_cate'];
        $name_account = $_SESSION['name_account'] ?? '';
        viewClients('clients-category', [
            'dataProducts' => $dataProducts,
            'cate_data' => $cate_data,
            'name_cate' => $name_cate,
            'img_cate' => $img_cate,
            'name_account' => $name_account
        ]);
    }

    // chi tiết sản phẩm
    public function ProductsContent() {
        $this->checkUserRole(); 
        $cate_data = (new CategoryModel)->getAllCategories();
        $product_id = $_GET['product_id'];
        $productModel = new ModelProductsClients();
        $productModel->increaseViewCount($product_id);
        $productById = $productModel->getOneProducts($product_id);
        $similarProducts = $productModel->getProductsByCate($productById['id_cate'], $product_id);
        $comments = (new commentModelClients)->getCommentsByProduct($product_id);
        $name_account = $_SESSION['name_account'] ?? '';
        viewClients('clients-product', [
            'cate_data' => $cate_data,
            'productById' => $productById,
            'similarProducts' => $similarProducts,
            'comments' => $comments,
            'name_account' => $name_account
        ]);
    }

    // bình luận sản phẩm
    public function addComment() {
      if (!isset($_SESSION['name_account'])) {
          header('Location: index.php?action=login-clients');
          exit();
       }
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $product_id = $_POST['id'];
          $user_id = $_SESSION['name_account']['id_user']; 
          $content = $_POST['content_comments'];
          (new commentModelClients)->addComment($product_id, $user_id, $content);
          header("Location: index.php?action=productContent&product_id=$product_id");
          exit();
      }
   }

   // tìm kiếm sản phẩm
   public function searchProducts(){
    $this->checkUserRole(); 
    $name_account = $_SESSION['name_account'] ?? '';
    $cate_data = (new CategoryModel)->getAllCategories();
    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $productsBySearch = (new ModelProductsClients)->searchProducts($keyword);
    } else {
        $keyword = null;
        $productsBySearch = '';
    }
    $productsAll = (new ModelProductsClients)->getAllProductsClients();
    viewClients('clients-category-all',[
        'productsBySearch' => $productsBySearch,
        'productsAll' => $productsAll,
        'name_account' => $name_account,
        'cate_data' => $cate_data,
    ]);
   }
}
