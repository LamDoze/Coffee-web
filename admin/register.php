<?php
include 'class/user_class.php';
session_start();

$user = new User();
$errorMessage = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_nb = $_POST['phone_nb'];
    $address = $_POST['address'];

    if ($password === $confirm_password) {
        if (!$user->check_user_exists($username, $email)) {
            $registerUser = $user->register_user($username, $email, $password, $phone_nb, $address);

            if ($registerUser) {
                $userInfo = $user->get_user_by_email($email);

                $_SESSION['user_id'] = $userInfo['user_id'];
                $_SESSION['username'] = $userInfo['username'];

                header("Location: ../index.php");
                exit();
            } else {
                $errorMessage = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        } else {
            $errorMessage = "Tên đăng nhập hoặc Email đã được sử dụng."; // Thông báo khi tên đăng nhập hoặc email đã tồn tại
        }
    } else {
        $errorMessage = "Mật khẩu không khớp.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="dndk_styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <a href="#"><img src="../image/logo.png" alt="Logo"></a>
        </div>          
        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="menu-icon">☰</label>
        <nav class="nav-links">
            <a href="../index.php">Trang chủ</a>
            <a href="../index.php#features">Giới thiệu</a>
            <a href="../thucdon.php">Thực đơn</a>    
            <a href="../blog.php">Blog</a>        
            <a href="../index.php#review">Review</a>
            <a href="#footer">Liên hệ</a>
        </nav>

        <div class="header-icons">
            <a href="cart.php" class="cart-icon">
                <img src="../image/cart.png" alt="Giỏ hàng" class="cart-logo">
            </a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Hiển thị tên người dùng sau khi đăng nhập -->
                <div class="user-info">
                    <a href="profile.php" class="user-link">Xin chào, <?php echo $_SESSION['username']; ?></a>
                    <a href="logout.php" class="logout-btn">
                        <img src="../image/logout.png" alt="Đăng xuất" class="logout-icon">
                    </a>
                </div>
            <?php else: ?>

            <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
            <div class="auth-buttons">
                <a href="login.php" class="login-btn">
                    <span>Đăng nhập</span>
                </a>
                <a href="register.php" class="register-btn">
                    <span>Đăng ký</span>
                </a>
                <a href="login.php" class="auth-icon">
                    <img src="../image/login.png" alt="Đăng nhập/Đăng ký" width="42" height="42">
                </a>
            </div>
            <?php endif; ?>
        </div>  
    </header>

    <div class="hero">
        <div class="hero-content">
            <h1>Đăng ký</h1>
            <p>Chào mừng đến với <span>Cafe Serenade</span></p>
        </div>
    </div>

    <div class="login-container">
        <div class="header">
            <p>Đã có sẵn tài khoản?</p>
            <a href="login.php" class="login-link-button">Đăng nhập</a>
        </div>
        <h2>Đăng ký với email</h2>

        <!-- Vùng hiển thị thông báo lỗi -->
        <?php if (!empty($errorMessage)) : ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="login-form">
            <div class="input-group">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <label for="phone_nb">Số điện thoại</label>
                <input type="tel" name="phone_nb" id="phone_nb" placeholder="Số điện thoại" required>
            </div>

            <div class="input-group">
                <label for="address">Địa chỉ</label>
                <input type="text" name="address" id="address" placeholder="Địa chỉ" required>
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Chỉ bạn biết! Hãy giữ bí mật nhé" required>
            </div>

            <div class="input-group">
                <label for="confirm_password">Xác nhận mật khẩu</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">Tôi đồng ý với <a href="#">Điều khoản và điều kiện</a></label>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" name="privacy" id="privacy" required>
                <label for="privacy">Tôi đã đọc, hiểu và đồng ý với <a href="#">Chính sách quyền riêng tư</a> của chúng tôi.</label>
            </div>
            <button type="submit" class="btn-register">Đăng ký</button>
        </form>
    </div>

    <footer id="footer" class="footer">
        <div class="footer-content">   
            <!-- Thông tin liên hệ -->
            <div class="footer-section contact">
                <h2>Liên hệ</h2>
                <ul>
                    <li>Email: info@cafeserenade.com</li>
                    <li>Điện thoại: +84 901 234 567</li>
                    <li>Địa chỉ: 123 Đường Cà Phê, TP. Hà Nội</li>
                </ul>
            </div>
    
            <!-- Liên kết mạng xã hội -->
            <div class="footer-section social">
                <h2>Kết nối với chúng tôi</h2>
                <div class="social-links">
                    <a href="#">Facebook</a><br>
                    <a href="#">Instagram</a><br>
                    <a href="#">Twitter</a><br>
                </div>
            </div>
        </div>
    
        <div class="footer-bottom">
            &copy; 2024 Cafe Serenade | Thiết kế bởi Nhom 10
        </div>
    </footer>
</body>
</html>
