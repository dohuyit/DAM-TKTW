<?php 
class userAdminModels{
    public $conn = null;
    public function __construct() {
        $this->conn = pdo_get_connection();
    }

    public function getAllUser($name_user){
        $sql = "SELECT * FROM user WHERE name_user = :name_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':name_user' => $name_user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>