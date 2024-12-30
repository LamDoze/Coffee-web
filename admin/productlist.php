<?php
include 'headeradmin.php';
include 'slider.php';
include 'class/product_class.php';

$product = new Product();
$limit = 5; // Số sản phẩm mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$total_products = $product->get_product_count();
$total_pages = ceil($total_products / $limit);
$show_product = $product->show_product($page, $limit);
?>

<div class="admin-content-right">
    <div class="right-category-list">
        <h1>Danh sách sản phẩm</h1>
        <table>
            <tr>
                <th>Stt</th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
                <th>Tùy biến</th>
            </tr>

            <?php
            if ($show_product) {
                $i = ($page - 1) * $limit;
                while ($result = $show_product->fetch_assoc()) {
                    $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['product_id']; ?></td>
                <td><?php echo $result['product_name']; ?></td>
                <td><?php echo $result['category_name']; ?></td> 
                <td><?php echo $result['product_price']; ?></td>
                <td><?php echo $result['product_description']; ?></td>
                <td>
                    <?php if ($result['product_img']): ?>
                        <img src="uploads/<?php echo $result['product_img']; ?>" alt="<?php echo $result['product_name']; ?>" width="80" height="80">
                    <?php else: ?>
                        Không có ảnh
                    <?php endif; ?>
                </td>
                <td>
                    <a href="productedit.php?product_id=<?php echo $result['product_id']; ?>">Sửa</a> |
                    <a href="productdelete.php?product_id=<?php echo $result['product_id']; ?>">Xóa</a>
                </td>
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
