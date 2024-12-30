<?php
include 'class/user_class.php';
session_start();

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $loggedInUser = $user->login_user($username, $password);
    if ($loggedInUser) {
        $_SESSION['user_id'] = $loggedInUser['user_id'];
        $_SESSION['username'] = $loggedInUser['username'];
        $_SESSION['role'] = $loggedInUser['role'];

        // Điều hướng dựa trên vai trò
        if ($loggedInUser['role'] === 'admin') {
            header("Location: userlist.php");
        } else {
            header("Location: ../index.php");
        }
        exit();
    } else {
        $error_message = "Sai tên hoặc mật khẩu. Vui lòng thử lại.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
            <h1>Đăng nhập</h1>
            <p>Chào mừng trở lại <span>Cafe Serenade</span></p>
        </div>
    </div>

    <div class="login-container">
        <div class="signup-prompt">
            <p>Chưa có tài khoản?</p>
            <button onclick="window.location.href='register.php'" class="signup-button">Đăng kí</button>
        </div>

        <h2>Đăng nhập với email</h2>

        <form action="login.php" method="POST" class="login-form">
            <div class="input-group">
                <label for="username">Tên người dùng hoặc Email</label>
                <input type="text" id="username" name="username" placeholder="Nhập tên người dùng hoặc email của bạn" required>
            </div>

            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Chỉ bạn biết! Hãy giữ bí mật nhé" required>
                </div>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ghi nhớ tôi</label>
            </div>

            <button type="submit" class="login-button">Đăng nhập</button>

            <!-- Hiển thị thông báo lỗi nếu đăng nhập thất bại -->
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
        </form>
    </div>

    
</body>
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
</html>
