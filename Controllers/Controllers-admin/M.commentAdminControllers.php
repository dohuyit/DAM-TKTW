<?php 
class commentAdminControllers{

    public function __construct()
    {
        if(!isset($_SESSION['name_user'])){
            header("location: index.php?action=login-admin");
            die;
        }
    }
    public function listComments(){
        $name_user = $_SESSION['name_user'] ?? '';
        $data_comments = (new ModelCommentAdmin)->getAllComment();
        viewAdmin('a.comment',[
            'name_user' => $name_user,
            'data_comments' => $data_comments
        ]);
    }

    public function viewContentComments(){
        $name_user = $_SESSION['name_user'] ?? '';
        $id = $_GET['id'];
        $data_views = (new ModelCommentAdmin)->getCommentsByProductId($id);
        viewAdmin('a.view-comment',[
            'name_user' => $name_user,
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