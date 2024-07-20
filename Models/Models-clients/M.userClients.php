<?php 
class userClientsModels{
    public $conn = null;
    public function __construct() {
        $this->conn = pdo_get_connection();
    }

    public function getAllUserClients($name_user){
        // $sql = "SELECT * FROM user WHERE name_user = :name_user";
        $sql = "SELECT user.*,roles.name_role FROM user INNER JOIN roles ON user.id_role = roles.id_role WHERE name_user = :name_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':name_user' => $name_user]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    public function registerUserClients($name_user,$email_user,$password,$id_role){
        $sql = "INSERT INTO user (name_user, email_user, `password`,id_role) VALUES (:name_user, :email_user, :password,:id_role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':name_user' => $name_user,
            ':email_user' => $email_user,
            ':password' => $password,
            ':id_role' => $id_role,
        ]);
    }

    public function countAllEmailUser($name_user,$email_user){
        $sql = "SELECT COUNT(*) FROM user WHERE name_user = :name_user OR email_user = :email_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            [
                ':name_user' => $name_user,
                ':email_user' => $email_user,
            ]
        );
        // return $stmt->fetchColumn() > 0;
        return $stmt->fetchColumn() > 0;
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>