<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cà Phê và Văn Hóa Toàn Cầu</title>
    <link rel="stylesheet" href="stylesblog.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>

<?php
    session_start();
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
                <div class="user-info">
                    <a href="admin/profile.php" class="user-link">Xin chào, <?php echo $_SESSION['username']; ?></a>
                    <a href="admin/logout.php" class="logout-btn">
                        <img src="image/logout.png" alt="Đăng xuất" class="logout-icon">
                    </a>
                </div>
            <?php else: ?>
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

    <main class="blog-content">
        <section>
            <article class="blog-post">
                <p class="post-date">Cà Phê và Văn Hóa Toàn Cầu | 20/10/2024</p>
                
                <p><strong>Cà phê không chỉ là thức uống quen thuộc mà còn là một phần quan trọng của văn hóa tại nhiều quốc gia. Từ những quán cà phê truyền thống đến những tiệm cà phê hiện đại, cà phê đã tạo dựng được một nền tảng vững chắc trong các xã hội, ảnh hưởng sâu sắc đến đời sống tinh thần của con người.</strong> Hãy cùng tìm hiểu về tác động của cà phê trong các nền văn hóa khác nhau trên thế giới.</p>
                <img src="image/bl3.jpg" alt="Cà phê Thổ Nhĩ Kỳ" class="blog-image">
                <h2>1. Cà Phê ở Thổ Nhĩ Kỳ: Một Nét Văn Hóa Đặc Trưng</h2>
                <p>Cà phê Thổ Nhĩ Kỳ được biết đến với cách pha chế đặc biệt và phương pháp thưởng thức truyền thống. Mỗi tách cà phê được pha từ bột cà phê mịn, nấu trên một chiếc ấm nhỏ gọi là *cezve* và thưởng thức cùng những câu chuyện và trò chuyện. Thức uống này đã được UNESCO công nhận là di sản văn hóa phi vật thể vào năm 2013.</p>
                
                <h2>2. Cà Phê ở Ý: Một Phong Cách Sống</h2>
                <p>Cà phê ở Ý không chỉ là thức uống mà là một phần không thể thiếu trong văn hóa hằng ngày. Những quán cà phê Ý, đặc biệt là những quán espresso, đã trở thành một phần của phong cách sống Ý. Thức uống nổi bật nhất là espresso, được thưởng thức nhanh chóng, ngay tại quầy bar, trong những phút giây thư giãn hoặc trò chuyện.</p>

                <h2>3. Cà Phê ở Việt Nam: Sự Sáng Tạo và Đặc Sản</h2>
                <p>Cà phê Việt Nam cũng mang một đặc trưng văn hóa riêng biệt. Với những loại cà phê đặc sản như cà phê sữa đá hay cà phê trứng, người Việt Nam đã tạo ra một phong cách thưởng thức cà phê đầy sáng tạo. Cà phê Việt Nam thường được uống kèm với sữa đặc, tạo nên một vị ngọt ngào đặc trưng, làm hài lòng những ai yêu thích hương vị đậm đà và ngọt ngào.</p>

                <h2>4. Cà Phê ở Mỹ và Các Quốc Gia Phương Tây: Một Lối Sống Độc Đáo</h2>
                <p>Tại các quốc gia phương Tây, đặc biệt là Mỹ, cà phê đã trở thành một phần không thể thiếu trong cuộc sống hằng ngày của nhiều người. Từ những quán cà phê lớn như Starbucks đến những quán cà phê nhỏ ở các góc phố, cà phê không chỉ là thức uống, mà còn là không gian giao lưu, làm việc, hoặc thư giãn. Cà phê tại đây thường đi kèm với những lựa chọn như latte, cappuccino, hoặc macchiato, phản ánh sự đa dạng trong cách thưởng thức.</p>

                <h2>5. Cà Phê và Sự Giao Lưu Văn Hóa</h2>
                <p>Cà phê không chỉ đơn giản là một thức uống mà còn là cầu nối giữa các nền văn hóa. Nó mang đến cơ hội giao lưu, trao đổi và kết nối giữa mọi người. Các quán cà phê đã trở thành nơi lý tưởng để mọi người gặp gỡ, chia sẻ những câu chuyện và ý tưởng, đặc biệt là trong những thành phố lớn. Cà phê tạo ra không gian mở để mọi người từ các nền văn hóa khác nhau có thể giao tiếp và thấu hiểu nhau.</p>

                <p>Một ví dụ điển hình là các cuộc họp công việc hay hội thảo thường được tổ chức tại các quán cà phê, nơi mọi người có thể vừa làm việc, vừa thưởng thức một tách cà phê. Đây không chỉ là nơi để uống cà phê, mà còn là không gian khơi gợi sáng tạo và giúp gắn kết cộng đồng.</p>

                <h2>6. Cà Phê và Nghệ Thuật</h2>
                <p>Cà phê cũng gắn liền với nghệ thuật, đặc biệt là trong các không gian văn hóa. Tại nhiều quán cà phê trên thế giới, bạn có thể tìm thấy nghệ thuật vẽ trên bề mặt cà phê (*latte art*), nơi những người pha chế tạo ra những hình vẽ độc đáo với sữa và cà phê. Những nghệ sĩ và nhà văn cũng thường tìm đến quán cà phê như một không gian sáng tạo, để tìm kiếm cảm hứng hoặc giao lưu với đồng nghiệp.</p>
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
            <div class="footer-section contact">
                <h2>Liên hệ</h2>
                <ul>
                    <li>Email: info@cafeserenade.com</li>
                    <li>Điện thoại: +84 901 234 567</li>
                    <li>Địa chỉ: 123 Đường Cà Phê, TP. Hà Nội</li>
                </ul>
            </div>
    
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
