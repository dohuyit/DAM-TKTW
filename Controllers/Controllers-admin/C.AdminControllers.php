<?php 
class AdminControllers{
   
    public function __construct()
    {
        if(!isset($_SESSION['name_user'])){
            header("location: index.php?action=login");
            die;
        }
    }


    public function myAdmin(){
        $name_user = $_SESSION['name_user'] ?? '';
        $listProductsChart = (new ModelAdmin) ->countProductsByCategory();
        viewAdmin('admin',[
            'name_user'=>$name_user,
            'listProductsChart' => $listProductsChart
        ]);
    }
}
?>