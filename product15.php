<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>
    <link rel="stylesheet" href="stylesproduct.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>

<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: admin/login.php");
        exit();
    }
?>

<body>
<header>
        <div class="logo">
            <a href="#"><img src="image/logo.png" alt="Logo"></a>
        </div>          
        <input type="checkbox" id="nav-toggle">
        <label for="nav-toggle" class="menu-icon">☰</label>
        <nav class="nav-links">
            <a href="index.php">Trang chủ</a>
            <a href="index.php#features">Giới thiệu</a>
            <a href="thucdon.php">Thực đơn</a>    
            <a href="blog.php">Blog</a>        
            <a href="index.php#review">Review</a>
            <a href="#footer">Liên hệ</a>
        </nav>

        <div class="header-icons">
            <a href="admin/cart.php" class="cart-icon">
                <img src="image/cart.png" alt="Giỏ hàng" class="cart-logo">
            </a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Hiển thị tên người dùng sau khi đăng nhập -->
                <div class="user-info">
                    <a href="admin/profile.php" class="user-link">Xin chào, <?php echo $_SESSION['username']; ?></a>
                    <a href="admin/logout.php" class="logout-btn">
                        <img src="image/logout.png" alt="Đăng xuất" class="logout-icon">
                    </a>
                </div>
            <?php else: ?>

            <!-- Hiển thị nút đăng nhập và đăng ký nếu chưa đăng nhập -->
            <div class="auth-buttons">
                <a href="admin/login.php" class="login-btn">
                    <span>Đăng nhập</span>
                </a>
                <a href="admin/register.php" class="register-btn">
                    <span>Đăng ký</span>
                </a>
                <a href="admin/login.php" class="auth-icon">
                    <img src="image/login.png" alt="Đăng nhập/Đăng ký" width="42" height="42">
                </a>
            </div>
            <?php endif; ?>
        </div>  
    </header>

    <div class="product-container">
        <!-- Product Image Section -->
        <div class="product-gallery">
            <div class="main-image">
                <img src="image/hoa-tan-6.webp" alt="Product Image">
            </div>
        </div>
    
        <!-- Product Details Section -->
        <div class="product-details">
            <p class="brand-name">Cà Phê của nhóm 10</p>
            <h1 class="product-title">Latte Almond</h1>
            <div class="product-rating">
                <span>★★★★★</span>
                <a href="#">Viết đánh giá</a>
            </div>
            <p class="product-description">
            Latte Almond mang đến sự kết hợp nhẹ nhàng giữa vị cà phê espresso mịn màng, béo nhẹ và chút ngọt của sữa hạnh nhân
            </p>
    
            <!-- Pricing and Action -->
            <div class="product-price">
                <span>50.000 VNĐ</span>
            </div>
            <div class="product-actions">
                <form action="admin/cart.php" method="POST">
                    <input type="hidden" name="product_id" value="16"> <!-- Thay 1 bằng ID thực của sản phẩm -->
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">Thêm vào giỏ hàng</button>
                </form>
                <a href="#" class="wishlist-btn">♥ Thêm vào mục yêu thích</a>
            </div>
        </div>
    </div>

    <div class="related-products">
        <h2>Sản phẩm bạn có thể thích</h2>
        <div class="related-product-grid">
            <div class="related-product-item">
                <img src="image/hoa-tan-2.webp" alt="Sản phẩm 1">
                <p class="product-name">Cà Phê Hòa Tan G7</p>
                <p class="product-price">20.000 VNĐ</p>
            </div>
            <div class="related-product-item">
                <img src="image/hoa-tan-3.webp" alt="Sản phẩm 2">
                <p class="product-name">Cà Phê Sữa Hòa Tan HIGHTLANDS</p>
                <p class="product-price">35.000 VNĐ</p>
            </div>
            <div class="related-product-item">
                <img src="image/hoa-tan-4.webp" alt="Sản phẩm 3">
                <p class="product-name">Cà Phê Hòa Tan MACCOFFEE</p>
                <p class="product-price">25.000 VNĐ</p>
            </div>
        </div>
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
            &copy; 2024 Cafe Serenade | Thiết kế bởi Lam Do
        </div>
    </footer>
</body>
</html>
