<?php
session_start();
// Common folder
require_once "Common/env.php";
require_once "Common/PDO.php";
// MODELS
require_once "Models/M.category.php";
require_once "Models/M.user.php";
// === Phần Admin ===//
require_once "Models/Models-admin/M.Admin.php";
require_once "Models/Models-admin/M.productsAdmin.php";
require_once "Models/Models-admin/M.inforUserAdmin.php";
require_once "Models/Models-admin/M.commentAdmin.php";
require_once "Models/Models-admin/M.analystAdmin.php";
// === Phần Clients ===//
require_once "Models/Models-clients/M.Clients.php";
require_once "Models/Models-clients/M.productsClients.php";
require_once "Models/Models-clients/M.commentClients.php";
require_once "Models/Models-clients/M.inforUserClients.php";
// CONTROLERS
require_once "Controllers/categoryControllers.php";
require_once "Controllers/userControllers.php";
// === Phần Admin ===//
require_once "Controllers/Controllers-admin/C.AdminControllers.php";
require_once "Controllers/Controllers-admin/C.productsAdminControllers.php";
require_once "Controllers/Controllers-admin/C.inforUserAdminControllers.php";
require_once "Controllers/Controllers-admin/C.commentAdminControllers.php";
require_once "Controllers/Controllers-admin/C.analystAdminControllers.php";
// === Phần Clients ===//
require_once "Controllers/Controllers-clients/C.ClientsControllers.php";
require_once "Controllers/Controllers-clients/C.productsClientsControllers.php";
require_once "Controllers/Controllers-clients/C.inforUserClientsControllers.php";
$action = $_GET["action"] ?? "";
pdo_get_connection();
showAlert();
match ($action) {
    // Phần clients page
    "" => (new ClientsControllers)->myClients(),
    "productsByCate" => (new ProductsClientController)->ProductsByCate(),
    "productContent" => (new ProductsClientController)->ProductsContent(),
    "add-comment" => (new ProductsClientController)->addComment(),
    "search-products" => (new ProductsClientController)->searchProducts(),
    "inforUser" => (new inforUserClientsControllers)->listInfor(),
    "login" => (new UserControllers)->loginUser(),
    "register" => (new UserControllers)->registerUser(),
    "view-logout" => (new UserControllers)->viewLogout(),
    "logout" => (new UserControllers)->logoutUser(),
    // Phần admin page
    // 1. CRUD danh mục
    "admin" => (new AdminControllers)->myAdmin(),
    "category" => (new CategoryControllers)->listCategory(),
    "store-cate" => (new CategoryControllers)->storeCategory(),
    "update-cate" => (new CategoryControllers)->updateCategory(),
    "delete-cate" => (new CategoryControllers)->deleteCategory(),
    // 2. CRUD sản phẩm
    "admin-products" => (new AdminProductsControllers)->listProducts(),
    "add-products" => (new AdminProductsControllers)->addProducts(),
    "store-products" => (new AdminProductsControllers)->storeProducts(),
    "update-products" => (new AdminProductsControllers)->updateProducts(),
    "delete-products" => (new AdminProductsControllers)->deleteProducts(),
    //3. CRUD người dùng
    "admin-user" => (new inforUserAdminControllers())->listUser(),
    "add-user" => (new inforUserAdminControllers())->addUser(),
    "store-user" => (new inforUserAdminControllers())->storeUser(),
    "update-user" => (new inforUserAdminControllers())->updateUser(),
    "delete-user" => (new inforUserAdminControllers())->deleteUser(),
    //4. CRUD bình luận
    "admin-comment" => (new commentAdminControllers())->listComments(),
    "admin-view-comment" => (new commentAdminControllers())->viewContentComments(),
    "delete-comment" => (new commentAdminControllers())->deleteComment(),
    // 5. Quản lí thống kê
    "admin-analyst" => (new analystAdminControllers())->listChart(),
    default =>  "Không tìm thấy trang này!",
};
