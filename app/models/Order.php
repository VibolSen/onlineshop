<?php

require_once __DIR__ . '/../config/config.php';

class Order {
    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getAllOrders() {
        $sql = "SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($id) {
        $stmt = $this->conn->prepare("SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id WHERE o.id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateOrderStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }

    public function countAllOrders() {
        $result = $this->conn->query("SELECT COUNT(*) as count FROM orders");
        return $result->fetch_assoc()['count'];
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>