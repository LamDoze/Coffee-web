<?php
session_start();
include 'class/cart_class.php';
include 'class/order_class.php';

$cart = new Cart();
$order = new Order();
$user_id = $_SESSION['user_id']; // Giả sử user_id được lưu trữ trong session

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $cart->addToCart($user_id, $product_id, $quantity);
    header("Location: cart.php");
}

// Xử lý cập nhật số lượng sản phẩm trong giỏ hàng
if (isset($_POST['update_quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];
    $cart->updateCartQuantity($cart_id, $quantity);
    header("Location: cart.php");
}

// Xử lý xóa sản phẩm khỏi giỏ hàng
if (isset($_GET['remove'])) {
    $cart_id = $_GET['remove'];
    $cart->removeFromCart($cart_id);
    header("Location: cart.php");
}

// Xử lý thanh toán
if (isset($_POST['checkout'])) {
    $total_price = 0;
    $cart_id = null; // Khởi tạo giá trị mặc định cho $cart_id

    // Lấy danh sách giỏ hàng của người dùng
    $cart_items = $cart->getCartByUser($user_id);

    // Tính tổng giá của giỏ hàng
    if ($cart_items) {
        while ($item = $cart_items->fetch_assoc()) {
            $total_price += $item['total_price'];
            $cart_id = $item['cart_id']; 
        }
    } else {
        echo "<tr><td colspan='5'>Giỏ hàng trống</td></tr>";
    }

    // Kiểm tra có sản phẩm trong giỏ hàng
    if ($total_price > 0 && $cart_id !== null) {
        $order_id = $order->createOrder($user_id, $cart_id, $total_price);

        if ($order_id) {
            $_SESSION['message'] = "Thanh toán thành công! Đơn hàng của bạn đã được tạo.";
        } else {
            $_SESSION['message'] = "Có lỗi xảy ra khi tạo đơn hàng.";
        }
    } else {
        $_SESSION['message'] = "Giỏ hàng trống. Không thể tạo đơn hàng.";
    }
    
    header("Location: cart.php");
    exit;
}



$cart_items = $cart->getCartByUser($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <div class="cart-content">
        <h1>Giỏ hàng của bạn</h1>
        <table>
            <tr>
                <th>Ảnh</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
                <th>Tùy chỉnh</th>
            </tr>

            <?php
            $subtotal = 0;
            $shipping_fee = 0;

            if ($cart_items) {
                while ($item = $cart_items->fetch_assoc()) {
                    $subtotal += $item['total_price'];
            ?>
            <tr>
                <td>
                    <?php if ($item['product_img']): ?>
                        <img src="uploads/<?php echo $item['product_img']; ?>" alt="<?php echo $item['product_name']; ?>" width="80" height="80">
                    <?php else: ?>
                        Không có ảnh
                    <?php endif; ?>
                </td>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo number_format($item['product_price']); ?> VND</td>
                <td>
                    <form action="cart.php" method="POST" class="quantity-form">
                        <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                        <button type="submit" name="update_quantity" title="Cập nhật">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </form>
                </td>
                <td><?php echo number_format($item['total_price']); ?> VND</td>
                <td>
                    <a href="cart.php?remove=<?php echo $item['cart_id']; ?>" class="remove-btn" title="Xóa">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'>Giỏ hàng trống</td></tr>";
            }
            ?>
        </table>

        <!-- Order Summary Section -->
        <div class="order-summary">
            <h2>Order</h2>
            <?php 
            $total = $subtotal + $shipping_fee;
            ?>
            <p>Thành tiền: <span><?php echo number_format($subtotal); ?> VND</span></p>
            <p>Phí vận chuyển: <span><?php echo ($shipping_fee == 0) ? "Miễn phí" : number_format($shipping_fee) . " VND"; ?></span></p>
            <p>Tổng cộng: <span><?php echo number_format($total); ?> VND</span></p>
        </div>

        <!-- Cart Actions -->
        <div class="cart-actions">
            <form action="../thucdon.php" method="GET">
                <button type="submit" class="order-more-btn">Order Thêm</button>
            </form>
            <form action="cart.php" method="POST">
                <button type="submit" name="checkout" class="checkout-btn">Thanh toán</button>
            </form>
        </div>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="message">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

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

    