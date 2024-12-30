<?php
    include 'database.php';

    class product {
        private $db;

        public function __construct() {
            $this->db = new Database();
        }

        public function show_category() {
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_product() {
            // Kiểm tra sự tồn tại của các giá trị trong mảng $_POST và $_FILES
            $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : null;
            $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
            $product_price = isset($_POST['product_price']) ? $_POST['product_price'] : null;
            $product_description = isset($_POST['product_description']) ? $_POST['product_description'] : null;
            
            // Kiểm tra nếu tệp ảnh được tải lên
            $product_img = isset($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : null;
            
            // Di chuyển ảnh nếu có
            if ($product_img) {
                move_uploaded_file($_FILES['product_img']['tmp_name'], "uploads/".$product_img);
            }
    

            // Câu truy vấn SQL
            $query = "INSERT INTO tbl_product (
                product_name,
                category_id,
                product_price,
                product_description,
                product_img
            ) VALUES (
                '$product_name',
                '$category_id',
                '$product_price',
                '$product_description',
                '$product_img'
            )";

            // Thực hiện câu truy vấn
            $result = $this->db->insert($query);

            if ($result) {
                header("Location: productlist.php");
                exit();
            } else {
                echo "Đã xảy ra lỗi khi thêm sản phẩm.";
            }
        }

        public function show_product($page = 1, $limit = 10) {
            $offset = ($page - 1) * $limit;
            $query = "SELECT p.*, c.category_name 
                      FROM tbl_product AS p 
                      LEFT JOIN tbl_category AS c ON p.category_id = c.category_id 
                      ORDER BY p.product_id DESC 
                      LIMIT $limit OFFSET $offset";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function get_product_count() {
            $query = "SELECT COUNT(*) as total FROM tbl_product";
            $result = $this->db->select($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        public function get_product_by_id($product_id) {
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($product_id, $data, $files) {
            $product_name = $data['product_name'];
            $category_id = $data['category_id'];
            $product_price = $data['product_price'];
            $product_description = $data['product_description'];
            $product_img = $files['product_img']['name'];

            // Move image if a new one is uploaded
            if ($product_img) {
                move_uploaded_file($files['product_img']['tmp_name'], "uploads/" . $product_img);
            } else {
                // Get existing image if no new image is uploaded
                $product_data = $this->get_product_by_id($product_id)->fetch_assoc();
                $product_img = $product_data['product_img'];
            }

            $query = "UPDATE tbl_product SET 
                        product_name = '$product_name', 
                        category_id = '$category_id', 
                        product_price = '$product_price', 
                        product_description = '$product_description', 
                        product_img = '$product_img' 
                    WHERE product_id = '$product_id'";

            $result = $this->db->update($query);
            return $result;
        }

        public function delete_product($product_id) {
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this -> db -> delete($query);
            header("Location: productlist.php");
            return $result;
        }
    }
?>
