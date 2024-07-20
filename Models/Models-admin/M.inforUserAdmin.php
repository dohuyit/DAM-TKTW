<?php 
class inforUserModel{
  public $conn = null;
  public function __construct(){
    $this->conn = pdo_get_connection();
  }

  public function getAllUser(){
    $sql = "SELECT user.*,roles.name_role FROM user INNER JOIN roles ON user.id_role = roles.id_role";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllRole(){
    $sql = "SELECT * FROM roles";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function add($data_add){
    $sql = "INSERT INTO user (image_user,name_user,email_user,gender_user,password,birday_user,address_user,id_role,option_user) VALUES (:image_user,:name_user,:email_user,:gender_user,:password,:birday_user,:address_user,:id_role,:option_user)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($data_add);
}

public function update($data_update){
    $sql = "UPDATE user SET image_user=:image_user,name_user=:name_user,email_user=:email_user,gender_user=:gender_user,password=:password,birday_user=:birday_user,address_user=:address_user,id_role=:id_role,option_user=:option_user WHERE id_user=:id_user";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute($data_update);
}

public function getOneUser($id_user){
    $sql = "SELECT * FROM user WHERE id_user=$id_user";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function delete($data_delete){
    $sql = "DELETE FROM user WHERE id_user=$data_delete";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
}

  public function __destruct()
  {
    $this->conn = null;
  }
}
?>