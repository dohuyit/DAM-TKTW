<?php 
class ModelClients{
    public $conn = null;
    public function __construct(){
        $this->conn = pdo_get_connection();
    }

   public function getProductsSales(){
    $sql = "SELECT * FROM products WHERE flash_sale = 1 ORDER BY id DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
 
   public function getProductsFavourite(){
    $sql = "SELECT * FROM products WHERE view > 0 ORDER BY view DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getDiamond(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate WHERE name_cate = 'Trang sức kim cương' AND flash_sale = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getGold(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate WHERE name_cate = 'Trang sức vàng kim' AND flash_sale = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getPearl(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate WHERE name_cate = 'Trang sức ngọc trai' AND flash_sale = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getValentine(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate WHERE name_cate = 'Trang sức đá màu' AND flash_sale = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getWatch(){
    $sql = "SELECT * FROM products INNER JOIN category ON products.id_cate = category.id_cate WHERE name_cate = 'Đồng hồ thời trang' AND flash_sale = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>