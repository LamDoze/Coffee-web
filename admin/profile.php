<?php
include 'class/user_class.php';
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = new User();
$user_id = $_SESSION['user_id'];
$userData = $user->get_user($user_id)->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Cá Nhân</title>
    <link rel="stylesheet" href="../styles.css">
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
    
    <div class="profile">
        <h2>THÔNG TIN CÁ NHÂN</h2>
        <div class="profile-info">
            <p><span>Tên người dùng</span>: <?php echo $userData['username']; ?></p>
            <p><span>Email</span>: <?php echo $userData['email']; ?></p>
            <p><span>Địa chỉ</span>: <?php echo $userData['address']; ?></p>
            <p><span>Số điện thoại</span>: <?php echo $userData['phone_nb']; ?></p>
        </div>
    </div>

</body>
</html>
