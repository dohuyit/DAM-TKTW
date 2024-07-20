<?php
class ProductsClientController {
    // sản phẩm theo danh mục
    public function ProductsByCate() {
        $id_cate = $_GET['id_cate'];
        $dataProducts = (new ModelProductsClients)->getProductsByCate($id_cate);  // Chỉ truyền vào id_cate
        $cate_data = (new CategoryModel)->getAllCategories();
        $name_cate = (new CategoryModel)->getOneCategories($id_cate)['name_cate'];
        $img_cate = (new CategoryModel)->getOneCategories($id_cate)['img_cate'];
        $name_user = $_SESSION['name_user'] ?? '';
        viewClients('clients-category', [
            'dataProducts' => $dataProducts,
            'cate_data' => $cate_data,
            'name_cate' => $name_cate,
            'img_cate' => $img_cate,
            'name_user' => $name_user
        ]);
    }

    // chi tiết sản phẩm
    public function ProductsContent() {
        $cate_data = (new CategoryModel)->getAllCategories();
        $product_id = $_GET['product_id'];
        $productModel = new ModelProductsClients();
        $productById = $productModel->getOneProducts($product_id);
        $similarProducts = $productModel->getProductsByCate($productById['id_cate'], $product_id);
        $comments = (new commentModelClients)->getCommentsByProduct($product_id);
        $name_user = $_SESSION['name_user'] ?? '';
        viewClients('clients-product', [
            'cate_data' => $cate_data,
            'productById' => $productById,
            'similarProducts' => $similarProducts,
            'comments' => $comments,
            'name_user' => $name_user
        ]);
    }

    // bình luận sản phẩm
    public function addComment() {
      if (!isset($_SESSION['name_user'])) {
          header('Location: index.php?action=login-clients');
          exit();
      }
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $product_id = $_POST['id'];
          $user_id = $_SESSION['id_user']; 
          $content = $_POST['content_comments'];
          (new commentModelClients)->addComment($product_id, $user_id, $content);
          header("Location: index.php?action=productContent&product_id=$product_id");
          exit();
      }
   }

   public function searchProducts(){
    $name_user = $_SESSION['name_user'] ?? '';
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
        'name_user' => $name_user,
        'cate_data' => $cate_data,
    ]);
   }
  
}