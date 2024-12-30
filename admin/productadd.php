<?php
include 'headeradmin.php';
include 'slider.php';
include 'class/product_class.php';
?>

<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $insert_product = $product -> insert_product($_POST,$_FILES);
    }
?>


        <div class="admin-content-right">
            <div class="right-add-product">
                <h1>Thêm Sản Phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">

                    <input name="product_name" type="text" placeholder="Nhập tên sản phẩm" required>

                    <select name="category_id" id="">
                    <option value="#">--Chọn danh mục--</option>
                        <?php
                            $show_category = $product -> show_category();
                            if ($show_category) {
                                while($result = $show_category -> fetch_assoc()){
                        ?>
                        <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php 
                                }
                            }
                        ?>
                    </select>

                    <input name="product_price" type="text" placeholder="Giá sản phẩm" required>

                    <textarea name="product_description" id="" placeholder="Mô tả sản phẩm"></textarea>

                    <label for="">Ảnh sản phẩm <span>*</span></label>
                    <input name="product_img" type="file">

                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>

</body>
</html>