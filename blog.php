<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Những Câu Chuyện Thú Vị Về Cà Phê: Lịch Sử, Văn Hóa và Những Điều Ít Ai Biết</title>
    <link rel="stylesheet" href="stylesblog.css">
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

    <section class="fade-in">
        <div class="hero">
            <div class="hero-content">
                <h1>Những Câu Chuyện Thú Vị Về Cà Phê</h1>
            </div>
        </div>
    </section>

    <main class="blog-container">        
        <section class="blog-posts">
            <!-- Blog Post 1 -->
            <article class="post">
                <div class="post-image">
                    <img src="image/anh1.jpg" alt="Quote Image 1">
                </div>
                <div class="post-content">
                    <h2>Lịch sử cà phê: Một hành trình dài từ Ethiopia đến toàn cầu</h2>
                    <p class="post-date">Cà Phê Triết Đạo | 27/08/2024</p>
                    <p>Cà phê bắt đầu từ Ethiopia và đã có một hành trình dài để trở thành thức uống toàn cầu mà chúng ta yêu thích ngày nay...</p>
                    <a href="blog1.php" class="read-more">Xem thêm</a>
                </div>
            </article>

            <!-- Blog Post 2 -->
            <article class="post">
                <div class="post-image">
                    <img src="image/anh2.png" alt="Quote Image 2">
                </div>
                <div class="post-content">
                    <h2>Cà phê và những tác động văn hóa</h2>
                    <p class="post-date">Cà Phê Triết Đạo | 18/06/2024</p>
                    <p>Cà phê không chỉ là thức uống mà còn là một phần quan trọng trong các nền văn hóa trên thế giới...</p>
                    <a href="blog2.php" class="read-more">Xem thêm</a>
                </div>
            </article>

            <!-- Blog Post 3 -->
            <article class="post">
                <div class="post-image">
                    <img src="image/anh3.jpg" alt="Quote Image 3">
                </div>
                <div class="post-content">
                    <h2>Những điều ít ai biết về cà phê</h2>
                    <p class="post-date">Cà Phê Triết Đạo | 21/05/2024</p>
                    <p>Cà phê có thể giúp bảo vệ gan và còn rất nhiều điều thú vị mà không phải ai cũng biết về thức uống này...</p>
                    <a href="blog3.php" class="read-more">Xem thêm</a>
                </div>
            </article>

            <!-- Blog Post 4 -->
            <article class="post">
                <div class="post-image">
                    <img src="image/anh4.jpg" alt="Quote Image 4">
                </div>
                <div class="post-content">
                    <h2>Cà phê và những câu chuyện lạ lùng</h2>
                    <p class="post-date">Cà Phê Triết Đạo | 15/04/2024</p>
                    <p>Cà phê Jamaican Blue Mountain, cà phê từ phân động vật – những câu chuyện lạ lùng nhưng thật sự hấp dẫn...</p>
                    <a href="#" class="read-more">Xem thêm</a>
                </div>
            </article>

            <!-- Blog Post 5 -->
            <article class="post">
                <div class="post-image">
                    <img src="image/anh5.jpg" alt="Quote Image 5">
                </div>
                <div class="post-content">
                    <h2>Cà phê trong thế kỷ 21: Từ cà phê truyền thống đến cà phê đặc sản</h2>
                    <p class="post-date">Cà Phê Triết Đạo | 10/03/2024</p>
                    <p>Cà phê đặc sản đang dần trở thành xu hướng toàn cầu, khi mọi người tìm kiếm những trải nghiệm hương vị mới mẻ...</p>
                    <a href="#" class="read-more">Xem thêm</a>
                </div>
            </article>
        </section>

        <aside class="latest-news">
            <h2>Latest News</h2>    

            <div class="news-item">
                <img src="image/anh1.jpg" alt="News Image 1" class="news-image">
                <div class="news-info">
                    <div class="news-date">                        27/08/2024
                    </div>
                    <a href="blog1.php">Lịch sử cà phê: Một hành trình dài từ Ethiopia đến toàn cầu</a>
                </div>
            </div>
            
            <div class="news-item">
                <img src="image/anh2.png" alt="News Image 2" class="news-image">
                <div class="news-info">
                    <div class="news-date">
                        18/06/2024
                    </div>
                    <a href="blog2.php">Cà phê và những tác động văn hóa</a>
                </div>
            </div>
        
            <div class="news-item">
                <img src="image/anh3.jpg" alt="News Image 3" class="news-image">
                <div class="news-info">
                    <div class="news-date">                        
                        21/05/2024
                    </div>
                    <a href="blog3.php">Những điều ít ai biết về cà phê</a>
                </div>
            </div>
        </aside>               
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
            &copy; 2024 Cafe Serenade | Thiết kế bởi Lam Do
        </div>
    </footer>
</body>
</html>
