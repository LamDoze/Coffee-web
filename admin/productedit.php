<?php
include 'headeradmin.php';
include 'slider.php';

include 'class/product_class.php';
$product = new product();

// Check if product_id is provided in the URL
if (!isset($_GET['product_id']) || $_GET['product_id'] == NULL) {
    echo "<script>window.location = 'productlist.php'</script>";
} else {
    $product_id = $_GET['product_id'];
}

// Get product details
$product_details = $product->get_product_by_id($product_id)->fetch_assoc();

// Update product if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update_product = $product->update_product($product_id, $_POST, $_FILES);
    if ($update_product) {
        echo "<script>window.location = 'productlist.php'</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi khi cập nhật sản phẩm');</script>";
    }
}
?>

    <div class="admin-content-right">
        <div class="right-add-product">
            <h1>Chỉnh sửa sản phẩm</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" name="product_name" value="<?php echo $product_details['product_name']; ?>" required>

                <label for="category_id">Danh mục</label>
                <select name="category_id" required>
                    <option value="#">--Chọn danh mục--</option>
                    <?php
                        $show_category = $product->show_category();
                        if ($show_category) {
                            while ($result = $show_category->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $result['category_id']; ?>" <?php echo $result['category_id'] == $product_details['category_id'] ? 'selected' : ''; ?>>
                        <?php echo $result['category_name']; ?>
                    </option>
                    <?php 
                            }
                        }
                    ?>
                </select>

                <label for="product_price">Giá sản phẩm</label>
                <input type="text" name="product_price" value="<?php echo $product_details['product_price']; ?>" required>

                <label for="product_description">Mô tả sản phẩm</label>
                <textarea name="product_description" required><?php echo $product_details['product_description']; ?></textarea>

                <label for="product_img">Ảnh sản phẩm <span>*</span></label>
                <input type="file" name="product_img">
                <?php if ($product_details['product_img']): ?>
                    <img src="uploads/<?php echo $product_details['product_img']; ?>" width="100" height="100" alt="Current Image">
                <?php endif; ?>

                <button type="submit">Cập nhật</button>
            </form>
        </div>
    </div>
</body>
</html>
