<?php
include 'headeradmin.php';
include 'slider.php';
include 'class/order_class.php';

$order = new Order();
$total_revenue = $order->getTotalRevenue();
$yearly_orders = $order->getYearlyOrders();
$current_year = date('Y');
$monthly_orders = $order->getMonthlyOrders($current_year);
?>

<div class="admin-content-right">
    <div class="right-category-list">
        <h1>Thống kê đơn hàng</h1>

        <!-- Tổng doanh thu -->
        <div class="stat">
            <h2>Tổng doanh thu: <?php echo number_format($total_revenue); ?> VND</h2>
        </div>

        <!-- Số lượng đơn hàng theo năm -->
        <h2>Số lượng đơn hàng theo năm</h2>
        <table>
            <tr>
                <th>Năm</th>
                <th>Tổng đơn hàng</th>
                <th>Doanh thu</th>
            </tr>
            <?php while ($year_data = $yearly_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $year_data['year']; ?></td>
                <td><?php echo $year_data['total_orders']; ?></td>
                <td><?php echo number_format($year_data['yearly_revenue']); ?> VND</td>
            </tr>
            <?php endwhile; ?>
        </table>

        <!-- Số lượng đơn hàng theo tháng của năm hiện tại -->
        <h2>Số lượng đơn hàng theo tháng (<?php echo $current_year; ?>)</h2>
        <table>
            <tr>
                <th>Tháng</th>
                <th>Tổng đơn hàng</th>
                <th>Doanh thu</th>
            </tr>
            <?php while ($month_data = $monthly_orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo $month_data['month']; ?></td>
                <td><?php echo $month_data['total_orders']; ?></td>
                <td><?php echo number_format($month_data['monthly_revenue']); ?> VND</td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>
</section>
</body>
</html>
