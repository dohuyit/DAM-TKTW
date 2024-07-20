<?php 
// include_once "Common/PDO.php";

class CategoryModel {
    public $conn;
    public function __construct() {
        $this->conn = pdo_get_connection();
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($data_add){
        $sql = "INSERT INTO category (name_cate,img_cate) VALUES (:name_cate,:img_cate)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data_add);
    }

    public function update($data_update){
        $sql = "UPDATE category SET name_cate=:name_cate,img_cate=:img_cate WHERE id_cate=:id_cate";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data_update);
    }

    public function getOneCategories($id){
        $sql = "SELECT * FROM category WHERE id_cate=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($data_delete){
       $sql = "DELETE FROM category WHERE id_cate=$data_delete";
       $stmt=$this->conn->prepare($sql);
       $stmt->execute();
    }

    public function __destruct() {
        $this->conn = null;
    }
}
?>
