<?php
class ModelAdmin
{
    public $conn = null;
    public function __construct()
    {
        $this->conn = pdo_get_connection();
    }

    public function countProductsByCategory()
    {
        $sql = "SELECT c.name_cate, COUNT(p.id) AS product_count FROM category c INNER JOIN products p ON c.id_cate = p.id_cate GROUP BY c.name_cate";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function showUser()
    {
        $sql = "SELECT user.id_user,user.name_account FROM user ORDER BY id_user LIMIT 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function __destruct()
    {
        $this->conn = null;
    }
}
