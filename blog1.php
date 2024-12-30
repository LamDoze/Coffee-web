<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>
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
            <a href="z.php">Thực đơn</a>    
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
                <p class="post-date">Lịch sử cà phê: Một hành trình dài từ Ethiopia đến toàn cầu | 20/10/2024</p>
                
                <p><strong>Cà phê, một trong những thức uống phổ biến nhất trên thế giới, không chỉ đơn giản là một thức uống giúp thức tỉnh, mà còn là một phần quan trọng trong nền văn hóa toàn cầu. Nhưng ít ai biết rằng hành trình của cà phê từ những hạt cà phê đầu tiên ở Ethiopia cho đến khi trở thành một sản phẩm toàn cầu có một câu chuyện dài và thú vị.</strong> Hãy cùng khám phá lịch sử của loại "hạt đen thần kỳ" này.</p>
                <img src="image/bl1.jpg" alt="Cà phê Thổ Nhĩ Kỳ" class="blog-image">
                <h2>1. Khởi nguồn từ Ethiopia – Sự phát hiện của Khaldi</h2>
                <p>Câu chuyện về cà phê bắt đầu từ khoảng thế kỷ thứ 9 tại Ethiopia, nơi được cho là nơi xuất xứ của cây cà phê. Một huyền thoại nổi tiếng kể rằng, một người chăn dê tên là Khaldi tình cờ phát hiện ra cà phê sau khi nhận thấy rằng đàn dê của ông trở nên đặc biệt năng động và linh hoạt sau khi ăn trái cây đỏ từ một loại cây lạ. Khaldi, sau khi thử ăn những quả mọng đỏ đó, cũng cảm thấy tràn đầy năng lượng.</p>
                
                <p>Khaldi đã chia sẻ phát hiện này với một tu sĩ trong tu viện gần đó, và người tu sĩ này đã thử nghiền nát quả cà phê và pha nước từ những hạt đã nghiền. Nhờ đó, tu sĩ đã phát hiện ra rằng thức uống này giúp tỉnh táo và giúp các tu sĩ có thể thức suốt đêm cầu nguyện.</p>

                <p>Tuy nhiên, câu chuyện này vẫn chỉ là một phần của huyền thoại, nhưng nó phản ánh tầm quan trọng của cà phê trong đời sống của người dân Ethiopia và các khu vực xung quanh.</p>

                <h2>2. Cà phê lan rộng ở Trung Đông và thế giới Hồi giáo</h2>
                <p>Sau khi cà phê được phát hiện ở Ethiopia, nó đã dần lan ra các quốc gia xung quanh, đặc biệt là Yemen, nơi người dân đã phát triển kỹ thuật rang và chế biến cà phê. Các nhà sư ở Yemen đã bắt đầu trồng cà phê vào thế kỷ 15, và thức uống này nhanh chóng trở thành một phần không thể thiếu trong các nghi lễ tôn giáo và đời sống xã hội.</p>

                <p>Vào thế kỷ 16, cà phê trở thành một phần quan trọng trong nền văn hóa Hồi giáo. Những quán cà phê đầu tiên xuất hiện ở khu vực Trung Đông, nơi mọi người gặp gỡ, trao đổi ý tưởng và thảo luận về các vấn đề chính trị, tôn giáo, và triết học. Cà phê trở thành một loại thức uống "hội họp trí thức", đặc biệt ở các thành phố như Istanbul, Cairo, và Mecca.</p>

                <h2>3. Sự du nhập vào châu Âu</h2>
                <p>Cà phê bắt đầu du nhập vào châu Âu vào cuối thế kỷ 17 thông qua các thương nhân và các nhà du hành đến từ Trung Đông và Bắc Phi. Quá trình du nhập này không hề suôn sẻ. Vào năm 1669, một sứ giả Thổ Nhĩ Kỳ đã mang cà phê đến Pháp, và thức uống này bắt đầu được biết đến ở Paris. Tuy nhiên, khi cà phê lần đầu tiên xuất hiện tại Pháp, nó không được chào đón nồng nhiệt như ở các nước Hồi giáo.</p>

                <p>Nhưng sau một vài thập kỷ, các quán cà phê bắt đầu phát triển ở các thành phố lớn của châu Âu như Paris, London, và Amsterdam. Quán cà phê trở thành những trung tâm văn hóa, nơi những trí thức, nhà văn, và nghệ sĩ tụ tập để bàn luận về các vấn đề xã hội, chính trị và văn hóa. Những quán cà phê này đã có ảnh hưởng mạnh mẽ đến sự phát triển của nghệ thuật và khoa học trong thế kỷ 17 và 18.</p>

                <h2>4. Quá trình trồng cà phê trên toàn cầu</h2>
                <p>Trong khi cà phê bắt đầu có mặt ở châu Âu, người châu Âu cũng bắt đầu nghiên cứu cách trồng cà phê tại các khu vực thuộc địa của mình. Vào thế kỷ 17, Hà Lan đã mang cà phê đến Java, Indonesia. Sau đó, các quốc gia như Pháp, Anh, và Bồ Đào Nha đã đưa cây cà phê đến các khu vực như Brazil, Việt Nam, và các đảo Caribbean.</p>

                <p>Brazil, đặc biệt, đã trở thành quốc gia sản xuất cà phê lớn nhất thế giới vào thế kỷ 19, một danh hiệu mà họ vẫn giữ cho đến ngày nay. Các vùng đất trồng cà phê ở Brazil, Colombia, và Việt Nam tiếp tục chiếm tỷ lệ sản xuất cà phê toàn cầu, đóng góp lớn vào nền kinh tế của các quốc gia này.</p>

                <h2>5. Cà phê và các quán cà phê</h2>
                <p>Cà phê đã trở thành một phần không thể thiếu trong đời sống hàng ngày của nhiều quốc gia, từ những quán cà phê truyền thống ở các thành phố lớn đến những cửa hàng cà phê hiện đại, nơi người ta tìm thấy sự kết hợp giữa nghệ thuật và khoa học trong từng tách cà phê.</p>

                <p>Ở Ý, cà phê espresso trở thành biểu tượng của văn hóa cà phê. Người Ý có thói quen uống espresso vào buổi sáng, và việc thưởng thức một ly espresso tại một quán cà phê nhỏ là một phần quan trọng trong thói quen hàng ngày của họ. Trong khi đó, ở Thổ Nhĩ Kỳ, cà phê được chế biến theo cách đặc biệt và thường được dùng trong các buổi lễ trọng đại, chẳng hạn như đám cưới.</p>

                <p>Tại Mỹ, cà phê được ưa chuộng dưới nhiều hình thức khác nhau, từ cà phê pha phin truyền thống cho đến những loại cà phê đặc sản với các hương vị sáng tạo như caramel macchiato hay vanilla latte. Những quán cà phê hiện đại, như Starbucks, đã giúp đẩy mạnh xu hướng uống cà phê đặc sản và tạo ra một ngành công nghiệp cà phê toàn cầu trị giá hàng trăm tỷ đô la.</p>

                <h2>6. Cà phê ngày nay</h2>
                <p>Ngày nay, cà phê không chỉ là thức uống mà còn là một ngành công nghiệp toàn cầu. Mỗi năm, hàng triệu tấn cà phê được sản xuất và tiêu thụ trên toàn thế giới. Cà phê trở thành mặt hàng thương mại lớn thứ hai trên thế giới, chỉ sau dầu mỏ.</p>

                <p>Cà phê hiện nay được sản xuất ở hơn 70 quốc gia, và mỗi vùng trồng cà phê lại có những đặc điểm riêng biệt về hương vị và chất lượng. Các loại cà phê đặc sản (specialty coffee) đang ngày càng được ưa chuộng, với những tín đồ cà phê tìm kiếm những trải nghiệm hương vị mới lạ từ những hạt cà phê được trồng và chế biến bằng phương pháp thủ công.</p>

                <p>Cà phê cũng trở thành một phần quan trọng trong văn hóa của các quốc gia, từ những quán cà phê truyền thống đến những quán cà phê đặc sản hiện đại, nơi người ta không chỉ thưởng thức cà phê mà còn thưởng thức nghệ thuật pha chế và tìm hiểu thêm về nguồn gốc của từng hạt cà phê.</p>
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
