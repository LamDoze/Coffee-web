<?php
include 'headeradmin.php';
include 'slider.php';
include 'class/category_class.php';
?>

<?php /*------- them ----------*/
    $category = new category();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $category_name = $_POST['category_name'];
        $insert_category = $category -> insert_category($category_name);
    }
?>


<div class="admin-content-right">
            <div class="right-add-category">
                <h1>Thêm Danh Mục</h1>
                <form action="" method="POST">
                    <input name="category_name" type="text" placeholder="Nhập tên danh mục">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
        </section>

</body>
</html>