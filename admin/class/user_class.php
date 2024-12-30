<?php
include 'database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register_user($username, $email, $password, $phone_nb, $address, $role = 'user') {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO tbl_user (username, email, password, phone_nb, address, role) 
                  VALUES ('$username', '$email', '$passwordHash', '$phone_nb', '$address', '$role')";
        return $this->db->insert($query);
    }
    
    public function check_user_exists($username, $email) {
        $query = "SELECT * FROM tbl_user WHERE username = '$username' OR email = '$email'";
        $result = $this->db->select($query);
        return ($result && $result->num_rows > 0);
    }

    public function login_user($usernameOrEmail, $password) {
        $query = "SELECT * FROM tbl_user WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";
        $result = $this->db->select($query);
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    } 

    // Trong class User
    public function show_users($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $query = "SELECT * FROM tbl_user ORDER BY user_id DESC LIMIT $limit OFFSET $offset";
        return $this->db->select($query);
    }

    public function get_user_count() {
        $query = "SELECT COUNT(*) as total FROM tbl_user";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function delete_user($user_id) {
        $query = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
        return $this->db->delete($query);
    }

    public function get_user($user_id) {
        $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
        return $this->db->select($query);
    } 

    public function get_user_by_email($email) {
        $query = "SELECT * FROM tbl_user WHERE email = '$email'";
        return $this->db->select($query)->fetch_assoc();
    }

    public function update_user($user_id, $username, $email, $phone_nb, $address, $role) {
        $query = "UPDATE tbl_user 
                  SET username = '$username', email = '$email', phone_nb = '$phone_nb', address = '$address', role = '$role' 
                  WHERE user_id = '$user_id'";
        return $this->db->update($query);
    }
}
?>
