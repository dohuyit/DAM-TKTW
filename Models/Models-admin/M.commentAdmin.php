<?php 
class ModelCommentAdmin{
    public $conn = null;
    public function __construct(){
      $this->conn = pdo_get_connection();
    }

    public function getAllComment(){
    $sql = "SELECT p.id, p.image, p.name, MIN(c.day_comments) as day_comments FROM comments c INNER JOIN products p ON c.id = p.id GROUP BY p.id, p.image, p.name";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommentsByProductId($product_id) {
      $sql = "SELECT user.name_account,comments.id_comments, comments.content_comments, comments.day_comments
              FROM comments
              INNER JOIN user ON comments.id_user = user.id_user
              WHERE comments.id = :product_id";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['product_id' => $product_id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($data_delete){
    $sql = "DELETE FROM comments WHERE id_comments=$data_delete";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
}
    public function __destruct()
  {
    $this->conn = null;
  }
}
?>