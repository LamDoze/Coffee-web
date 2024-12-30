<?php
include 'headeradmin.php';
include 'slider.php';
include 'class/order_class.php';

$order = new Order();
$limit = 10; // Số đơn hàng mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$total_orders = $order->getOrderCount();
$total_pages = ceil($total_orders / $limit);
$show_order = $order->getAllOrders($page, $limit);
?>

<div class="admin-content-right">
    <div class="right-category-list">
        <h1>Order List</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Total Price</th>
                <th>Order Date</th>
            </tr>

            <?php
            if ($show_order) {
                $i = ($page - 1) * $limit;
                while ($result = $show_order->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['order_id']; ?></td>
                <td><?php echo $result['user_id']; ?></td>
                <td><?php echo $result['username']; ?></td> 
                <td><?php echo number_format($result['total_price']); ?> VND</td>
                <td><?php echo $result['order_date']; ?></td>
            </tr>
            <?php
                }
            }
            ?>                  
        </table>

        <div class="pagination">
            <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                <a href="?page=<?php echo $p; ?>" <?php if ($p == $page) echo 'class="active"'; ?>>
                    <?php echo $p; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>
</section>
</body>
</html>
