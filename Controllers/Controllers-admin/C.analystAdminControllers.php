<?php 
class analystAdminControllers{
    public function listChart(){
        $name_account = $_SESSION['name_account'] ?? '';
        $dataProducts = (new ModelAnalystAdmin)->analystProductsByCategory();
        $dataUsers = (new ModelAnalystAdmin)->analystUserByRole();
        viewAdmin('a.analyst',[
            'name_account' => $name_account,
            'dataProducts' => $dataProducts,
            'dataUsers' => $dataUsers,
        ]);
    }
}
?>