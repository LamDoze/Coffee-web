<?php
include_once 'database.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Tạo order
    public function createOrder($user_id, $cart_id, $total_price) {
        if (is_null($cart_id)) {
            return false;
        }
        
        // Lấy thời gian hiện tại
        $order_date = date('Y-m-d H:i:s');
    
        // Query to insert a new order into tbl_order
        $query = "INSERT INTO tbl_order (user_id, cart_id, total_price, order_date) 
                  VALUES ('$user_id', '$cart_id', '$total_price', '$order_date')";
        $order_id = $this->db->insert($query);
    
        if ($order_id) {
            // Delete cart after the order is created
            $delete_cart_query = "DELETE FROM tbl_cart WHERE cart_id = '$cart_id'";
            $this->db->delete($delete_cart_query);
            return $order_id;
        } else {
            return false;
        }
    }

    // Get the details of a specific order
    public function getOrderDetails($order_id) {
        $query = "SELECT o.order_id, o.total_price, o.cart_id, o.user_id, o.order_date, 
                         u.username, u.email
                  FROM tbl_order AS o
                  INNER JOIN tbl_user AS u ON o.user_id = u.user_id
                  WHERE o.order_id = '$order_id'";
        return $this->db->select($query);
    }

    // Get the list of orders for a specific user
    public function getOrdersByUser($user_id) {
        $query = "SELECT * FROM tbl_order WHERE user_id = '$user_id' ORDER BY order_date DESC";
        return $this->db->select($query);
    }

    // Update the status of an order
    public function updateOrderStatus($order_id, $status) {
        $query = "UPDATE tbl_order SET status = '$status' WHERE order_id = '$order_id'";
        return $this->db->update($query);
    }

    // Show order 
    public function getAllOrders($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $query = "SELECT o.*, u.username 
                FROM tbl_order AS o 
                INNER JOIN tbl_user AS u ON o.user_id = u.user_id 
                ORDER BY o.order_date DESC 
                LIMIT $limit OFFSET $offset";
        return $this->db->select($query);
    }

    public function getOrderCount() {
        $query = "SELECT COUNT(*) as total FROM tbl_order";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getTotalRevenue() {
        $query = "SELECT SUM(total_price) as revenue FROM tbl_order";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['revenue'];
    }

    public function getMonthlyOrders($year) {
        $query = "SELECT MONTH(order_date) AS month, COUNT(*) AS total_orders, SUM(total_price) AS monthly_revenue 
                FROM tbl_order 
                WHERE YEAR(order_date) = '$year'
                GROUP BY MONTH(order_date)";
        return $this->db->select($query);
    }

    public function getYearlyOrders() {
        $query = "SELECT YEAR(order_date) AS year, COUNT(*) AS total_orders, SUM(total_price) AS yearly_revenue 
                FROM tbl_order 
                GROUP BY YEAR(order_date)";
        return $this->db->select($query);
    }

}
?>
