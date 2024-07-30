<?php 
class ModelProductsClients{
    public $conn = null;
    public function __construct(){
        $this->conn = pdo_get_connection();
    }

    public function getProductsByCate($id_cate,$excludeProductId = null){
    if ($excludeProductId !== null) {
        $sql = "SELECT * FROM products WHERE id_cate = $id_cate AND id != $excludeProductId ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM products WHERE id_cate = $id_cate ORDER BY id DESC";
    }
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOneProducts($id){
        $sql = "SELECT * FROM products WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchProducts($keyword){
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProductsClients(){
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

       public function increaseViewCount($id) {
       $sql = "UPDATE products SET view = view + 1 WHERE id = :id";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([
           ':id' => $id
        ]);
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>