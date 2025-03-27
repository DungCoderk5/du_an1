
            <!-- Main Content -->
            <link rel="stylesheet" href="../../DU_AN_1/admin/views/assets/css/adddanhmuc.css">
        <div class="main-content">
            <div class="form-container">
                <h2>Thêm Danh Mục</h2>
                <form action="index.php?page=category&action=adddanhmuc" method="POST" enctype="multipart/form-data">
                    <!-- Product Name -->
                    <div class="form-group">
                        <label for="categoryName">Tên Danh Mục</label>
                        <input type="text" id="categoryName" name="categoryName" value="Product A" required>
                    </div>
                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="categoryImage">Hình ảnh</label>
                        <input type="file" id="categoryImage" name="categoryImage" accept="image/*">
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn" name="themdanhmuc">Thêm Danh Mục</button>
                    <button type="submit" class="btn"><a href="/danhmuc.php">Danh Sách</a></button>
                </form>
            </div>
        </div>
    </div>
</html>
