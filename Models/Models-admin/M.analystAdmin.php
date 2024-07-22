<?php 
class ModelAnalystAdmin{
    public $conn = null;
    public function __construct(){
        $this->conn = pdo_get_connection();
    }

    public function analystProductsByCategory(){
        $sql = "SELECT c.name_cate, COUNT(p.id) AS product_count FROM category c INNER JOIN products p ON c.id_cate = p.id_cate GROUP BY c.name_cate";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function analystUserByRole(){
        $sql = "SELECT r.name_role, COUNT(u.id_user) AS count_accounts FROM user u JOIN roles r ON u.id_role = r.id_role GROUP BY r.name_role";
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