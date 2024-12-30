<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>
    <link rel="stylesheet" href="styles.css">
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
            <a href="#">Trang chủ</a>
            <a href="#features">Giới thiệu</a>
            <a href="thucdon.php">Thực đơn</a>    
            <a href="blog.php">Blog</a>        
            <a href="#review">Review</a>
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
 
    <main>
        <section class="fade-in">
            <section id="hero">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Cafe Serenade</h1>
                        <p>Một Tách Cà Phê, Một Lần Tận Hưởng</p>
                    </div>
            </section>
        </section>

        <section class="fade-in">
            <section class="explore-coffee-world">
                <div class="products-image" style="background-image: url('image/kn.jpg');"></div>
                <div class="explore-content">
                    <h2>Tận hưởng hương vị cà phê tuyệt vời mỗi ngày</h2>
                    <p>Trải nghiệm cà phê chất lượng, đúng gu yêu thích của bạn</p>
                    <a href="thucdon.php" class="explore-btn">Khám phá các sản phẩm</a>
                </div>
            </section>
        </section>
                       
        <section id="features">
            <h2>Khám Phá <span>Cafe Serenade</span></h2>
            <section class="fade-in">
                <div class="feature feature-left">    
                    <div class="content">
                        <h3>Nguồn gốc</h3>
                        <p><span>Cafe Serenade </span> được thành lập bởi những người yêu cà phê,  với niềm đam mê khám phá và chia sẻ hương vị cà phê đặc trưng từ khắp nơi trên thế giới.</p>
                        <p>Cà phê tại <span>Serenade </span> được tuyển chọn từ các nông trại trên khắp thế giới, và được rang xay thủ công để giữ trọn hương vị tinh tế.</p>
                    </div>
                    <div class="image" style="background-image: url('image/hacf.jpg');"></div>
                </div>
            </section> 
            <section class="fade-in">
                <div class="feature feature-right">
                    <div class="image" style="background-image: url('image/scf.jpg');"></div>
                    <div class="content">
                        <h3>Dịch vụ</h3>
                        <p>Chúng tôi cung cấp một thực đơn phong phú từ espresso, cappuccino đến các loại cà phê đặc sản.</p>
                        <p>Với dịch vụ tận tâm, <span>Serenade </span> luôn nỗ lực mang lại trải nghiệm thưởng thức cà phê tuyệt vời cho khách hàng, từ việc tư vấn, lựa chọn sản phẩm đến giao hàng nhanh chóng.</p>
                    </div>
                </div>
            </section>
        </section>   

        <section class="fade-in">
            <section class="did-you-know">
                <h2><span>Bạn Có Biết</span></h2>
                <div class="did-you-know-content">
                    <div class="image" style="background-image: url('image/cb.jpg');"></div>
                    <div class="content">
                        <p>Những câu chuyện và thông tin thú vị về cà phê, từ lịch sử, văn hóa đến những điều ít ai biết.</p>
                        <a href="blog.php" class="discover-btn">Khám phá thêm</a>
                    </div>
                </div>
            </section>
        </section>
        

        <section class="review" id="review">
            <h2>Khách Hàng Nói Gì Về Chúng Tôi</h2>
            <div class="reviews-container">
                <div class="box">
                    <p>“Không gian tuyệt vời và cà phê rất thơm ngon. Nhân viên phục vụ nhiệt tình.”</p>
                    <img src="image/kh1.jpg" alt="Khách hàng 1" class="user">
                    <h3>Nguyễn Anh Tuấn</h3>
                    <div class="stars">
                        <img src="image/5sao.png" alt="5 Stars">
                    </div>
                </div>
                <div class="box">
                    <p>“Quán cà phê lý tưởng cho những buổi gặp gỡ bạn bè hay làm việc.”</p>
                    <img src="image/kh2.jpg" alt="Khách hàng 2" class="user">
                    <h3>Anh Mười</h3>
                    <div class="stars">
                        <img src="image/4sao.png" alt="4 Stars">
                    </div>
                </div>
                <div class="box">
                    <p>“Đã đặt cà phê nhiều lần ở đây, và lần nào cũng hài lòng.”</p>
                    <img src="image/kh3.jpg" alt="Khách hàng 3" class="user">
                    <h3>Anh Bảy</h3>
                    <div class="stars">
                        <img src="image/5sao.png" alt="5 Stars">
                    </div>
                </div>
            </div>
        </section>      
    </main>

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
            &copy; 2024 Cafe Serenade | Thiết kế bởi Nhóm 10
        </div>
    </footer>
    
</body>
</html>