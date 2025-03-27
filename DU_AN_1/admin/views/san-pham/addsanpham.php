<link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/addsanpham.css">
<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="main-content">
    <div class="form-container">
        <h2>Thêm sản phẩm</h2>
        <form action="index.php?page=product&action=addsanpham" method="POST" enctype="multipart/form-data">
            <!-- Product Name -->
            <div class="form-group">
                <label for="productName">Tên Sản phẩm</label>
                <input type="text" id="productName" name="productName" placeholder="Nhập tên sản phẩm" required>
            </div>

            <!-- Product Price -->
            <div class="form-group">
                <label for="productPrice">Giá</label>
                <input type="number" id="productPrice" name="productPrice" placeholder="Nhập Giá Sản Phẩm" required>
            </div>
            <div class="form-group">
                <label for="productQuantity">Số Lượng</label>
                <input type="number" id="productQuantity" name="productQuantity" placeholder="Nhập Số Lượng"  min="1" required>
            </div>
            <!-- Product Category -->
            <div class="form-group">
                <label for="productCategory">Danh Mục</label>
                <select id="productCategory" name="productCategory" required>
                    <?php
                    
                    foreach ($category as $item) {
                        extract($item);
                        echo '<option value="'.$category_id.'">'.$name_cate.'</option>';
                    }
                    ?>
                    
                </select>
            </div>

            <!-- Product Image -->
            <div class="form-group">
                <label for="productImage">Hình ảnh</label>
                <input type="file" id="productImage" name="productImage" accept="image/*">
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="productDescription">Mô Tả</label>
                <textarea id="productDescription" name="productDescription" placeholder="Nhập Mô Tả Sản Phẩm..." rows="4"
                    required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn" name="themsp">Thêm sản phẩm</button>
            <button type="reset" class="btn btn-danger" onclick="location.href='index.php?page=<?= $_GET['page']?>'">Hủy</button>
        </form>
    </div>
</div>
</div>
</body>

</html>