<?php 
class commentAdminControllers{

    public function __construct()
    {
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
    public function listComments(){
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $data_comments = (new ModelCommentAdmin)->getAllComment();
        viewAdmin('a.comment',[
            'name_account' => $name_account,
            'data_comments' => $data_comments
        ]);
    }

    public function viewContentComments(){
        $this->checkUserRole();
        $name_account = $_SESSION['name_account'] ?? '';
        $id = $_GET['id'];
        $data_views = (new ModelCommentAdmin)->getCommentsByProductId($id);
        viewAdmin('a.view-comment',[
            'name_account' => $name_account,
            'data_views' => $data_views,
        ]);
    }

    public function deleteComment(){
        $id = $_GET['id_delete'];
        
        (new ModelCommentAdmin)->delete($id);
        echo '<script>alert("Xóa dữ liệu thành công"); window.location.href = "index.php?action=admin-comment";</script>';
        die;
    }

}
?>