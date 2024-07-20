<?php 
class ModelProductsAdmin{
    public $conn = null;
    public function __construct(){
     $this->conn = pdo_get_connection();
    }

public function getAllProducts(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function add($data_add){
    $sql = "INSERT INTO products (name,original_price,discount_number,discount_price,flash_sale,image,id_cate,`desc`) VALUES (:name,:original_price,:discount_number,:discount_price,:flash_sale,:image,:id_cate,:desc)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($data_add);
}

public function update($data_update){
    $sql = "UPDATE products SET name=:name,original_price=:original_price,discount_number=:discount_number,discount_price=:discount_price,flash_sale=:flash_sale,image=:image,id_cate=:id_cate,`desc`=:desc WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($data_update);
}

public function getOneProducts($id){
    $sql = "SELECT * FROM products WHERE id=$id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function delete($data_delete){
    $sql = "DELETE FROM products WHERE id=$data_delete";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
}

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>