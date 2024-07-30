<?php 
class AdminControllers {
   
    public function __construct() {
        if(!isset($_SESSION['name_account'])){
            header("location: index.php?action=login");
            die;
        }
    }

    private function checkUserRole() {
        if ($_SESSION['role'] !== 'admin') {
            echo "<script>alert('Bạn không có quyền truy cập trang này!');window.location.href='index.php';</script>";
            exit();
        }
    }

    public function myAdmin() {
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $listProductsChart = (new ModelAdmin)->countProductsByCategory();
        $listNewUsers = (new ModelAdmin)->showUser();
        viewAdmin('admin', [
            'name_account' => $name_account,
            'listProductsChart' => $listProductsChart,
            'listNewUsers' => $listNewUsers
        ]);
    }
}
?>
