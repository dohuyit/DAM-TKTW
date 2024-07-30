<?php 
class ModelsInforUserClients{
    public $conn = null;
    public function __construct(){
        $this->conn = pdo_get_connection();
    }

    public function update($data_update){
        $sql = "UPDATE user SET image_user=:image_user, name_user=:name_user, email_user=:email_user, gender_user=:gender_user, address_user=:address_user WHERE id_user=:id_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data_update);
    }
    
    
    public function getOneUser($id_user){
        $sql = "SELECT * FROM user WHERE id_user=$id_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function countAllInforUserClients($email_user, $id_user){
        $sql = "SELECT COUNT(*) FROM user WHERE  email_user = :email_user AND id_user != :id_user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(
            [
                ':email_user' => $email_user,
                ':id_user' => $id_user,
            ]
        );
        return $stmt->fetchColumn() > 0;
      }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>