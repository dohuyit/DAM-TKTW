<?php 
class ClientsControllers{
    
    // public function __construct()
    // {
    //     $this->checkAccess('user');
    // }

    // private function checkAccess($requiredRole) {
    //     if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
    //         if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    //             header('Location: index.php?action=admin');
    //         } else {
    //             header('Location: index.php?action=login-clients');
    //         }
    //         exit();
    //     }
    // }

    public function myClients(){
        $cate_data = (new CategoryModel)->getAllCategories();
        $products_sale = (new ModelClients)->getProductsSales();
        $products_favourite = (new ModelClients)->getProductsFavourite(); 
        $diamond_products = (new ModelClients)->getDiamond();
        $gold_products = (new ModelClients)->getGold();
        $pearl_products = (new ModelClients)->getPearl();
        $valentine_products = (new ModelClients)->getValentine();
        $watch_products = (new ModelClients)->getWatch();
        $name_user = $_SESSION['name_user'] ?? '';
        viewClients("clients",[
            'cate_data' => $cate_data,
            'products_sale' => $products_sale,
            'products_favourite' => $products_favourite,
            'diamond_products' => $diamond_products,
            'gold_products' => $gold_products,
            'pearl_products' => $pearl_products,
            'valentine_products' => $valentine_products,
            'watch_products' => $watch_products,
            'name_user' =>$name_user
        ]);
    }
}
?>