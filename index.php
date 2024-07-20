<?php 
session_start();
// Common folder
require_once "Common/env.php";
require_once "Common/PDO.php";
// MODELS
require_once "Models/category.php";
// === Phần Admin ===//
require_once "Models/Models-admin/M.Admin.php";
require_once "Models/Models-admin/M.productsAdmin.php";
require_once "Models/Models-admin/M.userLoginAdmin.php";
require_once "Models/Models-admin/M.inforUserAdmin.php";
require_once "Models/Models-admin/M.commentAdmin.php";
// === Phần Clients ===//
require_once "Models/Models-clients/M.Clients.php";
require_once "Models/Models-clients/M.productsClients.php";
require_once "Models/Models-clients/M.userClients.php";
require_once "Models/Models-clients/M.commentClients.php";
// CONTROLERS
require_once "Controllers/categoryControllers.php";
// === Phần Admin ===//
require_once "Controllers/Controllers-admin/C.AdminControllers.php";
require_once "Controllers/Controllers-admin/C.productsAdminControllers.php";
require_once "Controllers/Controllers-admin/C.userLoginAdminControllers.php";
require_once "Controllers/Controllers-admin/C.inforUserAdminControllers.php";
require_once "Controllers/Controllers-admin/M.commentAdminControllers.php";
// === Phần Clients ===//
require_once "Controllers/Controllers-clients/C.ClientsControllers.php";
require_once "Controllers/Controllers-clients/C.productsClientsControllers.php";
require_once "Controllers/Controllers-clients/C.userClientsControllers.php";
$action = $_GET["action"] ?? "";
pdo_get_connection();
match ($action) {
    // Phần clients page
    "" => (new ClientsControllers)->myClients(),
    "productsByCate" => (new ProductsClientController)->ProductsByCate(),
    "productContent" => (new ProductsClientController)->ProductsContent(),
    "add-comment" => (new ProductsClientController)->addComment(),
    "search-products" => (new ProductsClientController)->searchProducts(),
    "login-clients" =>(new ClientsUserControllers)->loginClients(),
    "register-clients" =>(new ClientsUserControllers)->registerClients(),
    "logout-clients" =>(new ClientsUserControllers)->logoutClients(),
    // Phần admin page
    "login-admin" =>(new AdminUserControllers)->login(),
    "view-logout-admin" =>(new AdminUserControllers)->viewLogout(),
    "logout-admin" =>(new AdminUserControllers)->logout(),
    // 1. CRUD danh mục
    "admin" => (new AdminControllers)->myAdmin(),
    "category" =>(new CategoryControllers)->listCategory(),
    "store-cate" =>(new CategoryControllers)->storeCategory(),
    "update-cate" =>(new CategoryControllers)->updateCategory(),
    "delete-cate" =>(new CategoryControllers)->deleteCategory(),
    // 2. CRUD sản phẩm
    "admin-products" => (new AdminProductsControllers)->listProducts(),
    "add-products" => (new AdminProductsControllers)->addProducts(),
    "store-products" => (new AdminProductsControllers)->storeProducts(),
    "update-products" => (new AdminProductsControllers)->updateProducts(),
    "delete-products" => (new AdminProductsControllers)->deleteProducts(),
    //3. CRUD người dùng
    "admin-user" => (new inforUserAdminControllers()) ->listUser(),
    "add-user" => (new inforUserAdminControllers()) ->addUser(),
    "store-user" => (new inforUserAdminControllers()) ->storeUser(),
    "update-user" => (new inforUserAdminControllers()) ->updateUser(),
    "delete-user" => (new inforUserAdminControllers()) ->deleteUser(),
    //4. CRUD bình luận
    "admin-comment" => (new commentAdminControllers()) ->listComments(),
    "admin-view-comment" => (new commentAdminControllers()) ->viewContentComments(),
    "delete-comment" => (new commentAdminControllers()) ->deleteComment(),
}
?>