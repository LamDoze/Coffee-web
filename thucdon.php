<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thuc don</title>
    <link rel="stylesheet" href="stylesthucdon.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>

<?php
    session_start();
?>

<script src="script.js"></script>

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

    <!-- Banner chính -->
    <section class="fade-in">
        <section class="hero-banner">
            <div class="banner-content">
                <h1>Khám phá thế giới cà phê hảo hạng</h1>
            </div>
        </section>
    </section>

    <section class="shop container">
        <h2 class="section-title">Cửa Hàng Cà Phê</h2>
    
        <!-- Thức uống -->
        <h3 class="category-title">Thức uống</h3>
        <section class="fade-in">
            <div class="shop-content">
                <!-- Sản phẩm 1 -->
                <a href="product2.php" class="product-link">
                    <div class="product-box">
                        <img src="image/iced-americano.png" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Iced Americano</h2>
                        <div class="price-container">
                            <span class="price">30.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
        
                <!-- Sản phẩm 2 -->
                <a href="product3.php" class="product-link">
                    <div class="product-box">
                        <img src="image/mocha-latte.jpg" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Mocha Latte</h2>
                        <div class="price-container">
                            <span class="price">30.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product4.php" class="product-link">
                    <div class="product-box">
                        <img src="image/iced-matcha-latte.png" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Iced Matcha Latte</h2>
                        <div class="price-container">
                            <span class="price">30.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product5.php" class="product-link">
                    <div class="product-box">
                        <img src="image/affogato.png" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Affogato</h2>
                        <div class="price-container">
                            <span class="price">30.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
                
            </div>
        </section>

        <!-- Danh mục Cà Phê Lạnh -->
        <h3 class="category-title">Cà Phê Lon</h3>
        <section class="fade-in">
            <div class="shop-content">
                <!-- Sản phẩm 3 -->
                <a href="product6.php" class="product-link">
                    <div class="product-box">
                        <img src="image/can1.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê sữa đá TCH</h2>
                        <div class="price-container">
                            <span class="price">10.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product7.php" class="product-link">
                    <div class="product-box">
                        <img src="image/can2.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê lon Birdy</h2>
                        <div class="price-container">
                            <span class="price">10.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product8.php" class="product-link">
                    <div class="product-box">
                        <img src="image/can3.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê đen Nescafe</h2>
                        <div class="price-container">
                            <span class="price">10.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
        
                <!-- Sản phẩm 4 -->
                <a href="product9.php" class="product-link">
                    <div class="product-box">
                        <img src="image/can4.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Max Coffee</h2>
                        <div class="price-container">
                            <span class="price">20.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!-----Cà phê hòa tan----->
        <h3 class="category-title">Cà Phê Hòa Tan</h3>
        <section class="fade-in">
            <div class="shop-content">
                <!-- Sản phẩm 1 -->
                <a href="product10.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-1.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê trung nguyên</h2>
                        <div class="price-container">
                            <span class="price">25.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
        
                <!-- Sản phẩm 2 -->
                <a href="product11.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-2.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê hòa tan G7 (30g)</h2>
                        <div class="price-container">
                            <span class="price">20.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product12.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-3.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê sữa hòa tan Hightlands</h2>
                        <div class="price-container">
                            <span class="price">35.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product13.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-4.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê hòa tan MacCoffee</h2>
                        <div class="price-container">
                            <span class="price">25.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <!-- Sản phẩm 1 -->
                <a href="product14.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-5.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Lion CaFé</h2>
                        <div class="price-container">
                            <span class="price">200.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
        
                <!-- Sản phẩm 2 -->
                <a href="product15.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-6.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Latte Almond</h2>
                        <div class="price-container">
                            <span class="price">50.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product16.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-7.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Cà phê đen đá TCH</h2>
                        <div class="price-container">
                            <span class="price">40.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product17.php" class="product-link">
                    <div class="product-box">
                        <img src="image/hoa-tan-8.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">NesCafé Red Cup</h2>
                        <div class="price-container">
                            <span class="price">70.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <!----- cà phê rang xay ----->
        <h3 class="category-title">Cà Phê Rang Xay</h3>
        <section class="fade-in">
            <div class="shop-content">
                <!-- Sản phẩm 1 -->
                <a href="product18.php" class="product-link">
                    <div class="product-box">
                        <img src="image/rang-xay-1.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Passion Coffee Phương Vy</h2>
                        <div class="price-container">
                            <span class="price">100.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>
        
                <!-- Sản phẩm 2 -->
                <a href="product19.php" class="product-link">
                    <div class="product-box">
                        <img src="image/rang-xay-2.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Trung Nguyên chế phin</h2>
                        <div class="price-container">
                            <span class="price">60.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product20.php" class="product-link">
                    <div class="product-box">
                        <img src="image/rang-xay-3.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">Moka Buôn Mê Thuột</h2>
                        <div class="price-container">
                            <span class="price">180.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>

                <a href="product21.php" class="product-link">
                    <div class="product-box">
                        <img src="image/rang-xay-4.webp" alt="Cà phê" class="product-img">
                        <h2 class="product-title">H'ren RobustaRobusta</h2>
                        <div class="price-container">
                            <span class="price">100.000 VNĐ</span>
                            <img src="image/shopping-bag.png" alt="Add to cart" class="cart-icon-small">
                        </div>
                    </div>
                </a>               
            </div>
        </section>
    </section>      

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
