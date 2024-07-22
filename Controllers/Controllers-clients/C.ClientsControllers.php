<?php 
class ClientsControllers {

    public function checkUserRole() {
        if(!isset($_SESSION['role'])){
            $_SESSION['role'] = "";
        }
        if ($_SESSION['role'] === 'admin') {
            echo "<script>alert('Bạn không có quyền truy cập trang này!');window.location.href='index.php?action=admin';</script>";
            exit();
        }
    }

    public function myClients() {
        $this->checkUserRole(); 
        $cate_data = (new CategoryModel)->getAllCategories();
        $products_sale = (new ModelClients)->getProductsSales();
        $products_favourite = (new ModelClients)->getProductsFavourite(); 
        $diamond_products = (new ModelClients)->getDiamond();
        $gold_products = (new ModelClients)->getGold();
        $pearl_products = (new ModelClients)->getPearl();
        $valentine_products = (new ModelClients)->getValentine();
        $watch_products = (new ModelClients)->getWatch();
        $name_user = $_SESSION['name_user'] ?? '';
        viewClients("clients", [
            'cate_data' => $cate_data,
            'products_sale' => $products_sale,
            'products_favourite' => $products_favourite,
            'diamond_products' => $diamond_products,
            'gold_products' => $gold_products,
            'pearl_products' => $pearl_products,
            'valentine_products' => $valentine_products,
            'watch_products' => $watch_products,
            'name_user' => $name_user
        ]);
    }
}
?>
