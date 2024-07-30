<?php 
class commentModelClients {
    public $conn = null;
    public function __construct() {
        $this->conn = pdo_get_connection();
    }
    
    public function addComment($id, $id_user, $content_comments) {
        $sql = "INSERT INTO comments (id, id_user, content_comments) VALUES (:id, :id_user, :content_comments)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':id_user' => $id_user,
            ':content_comments' => $content_comments,
        ]);
    }

    public function getCommentsByProduct($id) {
        $sql = "SELECT comments.*, user.name_account FROM comments JOIN user ON comments.id_user = user.id_user WHERE id = :id ORDER BY day_comments DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct() {
        $this->conn = null;
    }
}
?>
