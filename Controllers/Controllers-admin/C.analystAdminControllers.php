<?php 
class analystAdminControllers{
    public function listChart(){
        $name_user = $_SESSION['name_user'] ?? '';
        $dataProducts = (new ModelAnalystAdmin)->analystProductsByCategory();
        $dataUsers = (new ModelAnalystAdmin)->analystUserByRole();
        viewAdmin('a.analyst',[
            'name_user' => $name_user,
            'dataProducts' => $dataProducts,
            'dataUsers' => $dataUsers,
        ]);
    }
}
?>