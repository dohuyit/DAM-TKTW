<?php 
class AdminControllers {
   
    public function __construct() {
        if (!isset($_SESSION['name_user'])) {
            header("location: index.php?action=login");
            die();
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
        $name_user = $_SESSION['name_user'] ?? '';
        $listProductsChart = (new ModelAdmin)->countProductsByCategory();
        viewAdmin('admin', [
            'name_user' => $name_user,
            'listProductsChart' => $listProductsChart
        ]);
    }
}
?>
