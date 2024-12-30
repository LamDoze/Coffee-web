<?php
include_once 'database.php';

class Cart {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($user_id, $product_id, $quantity = 1) {
        $query = "SELECT * FROM tbl_cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $result = $this->db->select($query);
    
        if ($result) {
            $existing_cart = $result->fetch_assoc();
            $new_quantity = $existing_cart['quantity'] + $quantity;
    
            // Lấy giá của sản phẩm từ bảng tbl_product
            $price_query = "SELECT product_price FROM tbl_product WHERE product_id = '$product_id'";
            $price_result = $this->db->select($price_query);
            $product_price = $price_result->fetch_assoc()['product_price'];
    
            // Tính tổng giá
            $total_price = $new_quantity * $product_price;
    
            // Cập nhật số lượng và tổng giá
            $update_query = "UPDATE tbl_cart SET quantity = '$new_quantity', total_price = '$total_price' WHERE cart_id = '{$existing_cart['cart_id']}'";
            return $this->db->update($update_query);
        } else {
            // Nếu chưa có trong giỏ hàng, thêm mới với tổng giá ban đầu
            $price_query = "SELECT product_price FROM tbl_product WHERE product_id = '$product_id'";
            $price_result = $this->db->select($price_query);
            $product_price = $price_result->fetch_assoc()['product_price'];
            $total_price = $quantity * $product_price;
    
            $insert_query = "INSERT INTO tbl_cart (user_id, product_id, quantity, total_price) VALUES ('$user_id', '$product_id', '$quantity', '$total_price')";
            return $this->db->insert($insert_query);
        }
    }
    

    // Lấy danh sách giỏ hàng của người dùng
    public function getCartByUser($user_id) {
        $query = "SELECT c.*, p.product_name, p.product_price, (c.quantity * p.product_price) AS total_price, p.product_img
          FROM tbl_cart AS c
          INNER JOIN tbl_product AS p ON c.product_id = p.product_id
          WHERE c.user_id = '$user_id'";
        return $this->db->select($query);
    }

    public function updateCartQuantity($cart_id, $quantity) {
        // Lấy giá của sản phẩm từ bảng tbl_product
        $query = "SELECT p.product_price FROM tbl_cart AS c INNER JOIN tbl_product AS p ON c.product_id = p.product_id WHERE c.cart_id = '$cart_id'";
        $result = $this->db->select($query);
        $product_price = $result->fetch_assoc()['product_price'];
    
        // Tính tổng giá mới
        $total_price = $quantity * $product_price;
    
        // Cập nhật số lượng và tổng giá trong giỏ hàng
        $update_query = "UPDATE tbl_cart SET quantity = '$quantity', total_price = '$total_price' WHERE cart_id = '$cart_id'";
        return $this->db->update($update_query);
    }
    

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($cart_id) {
        $query = "DELETE FROM tbl_cart WHERE cart_id = '$cart_id'";
        return $this->db->delete($query);
    }

    // Xóa toàn bộ giỏ hàng của người dùng (khi đặt hàng)
    public function clearCart($user_id) {
        $query = "DELETE FROM tbl_cart WHERE user_id = '$user_id'";
        return $this->db->delete($query);
    }
}
?>
